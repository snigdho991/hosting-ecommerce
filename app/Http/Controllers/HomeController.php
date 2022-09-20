<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\User;
use App\Models\Message;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\BlogPost;
use App\Models\Imagem;
use Image;


use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function test()
    {
        
        return view('test');
    }
    public function domain()
    {
        
        return view('domain');
    }
    public function inbox()
    {
        return view('inbox');
    }

    public function settings()
    {
        return view('settings');
    }

    public function user_theme_update(Request $request)
    {
        $theme_value = $request->get('user_theme');

        $user = Auth::user();
        $user->theme = $theme_value;
        $user->save();

        Session::flash('noty-success', 'Theme updated successfully !');
        return redirect()->back();
    }
    
    public function search()
    {
        if ($search = \Request::get('q')) {
            $contacts = User::where(function($query) use ($search){
                $query->where('first_name','LIKE',"%$search%")
                      ->orWhere('last_name','LIKE',"%$search%")
                      ->orWhere('email','LIKE',"%$search%");
            })->where('id', '!=', auth()->id())->orderBy('created_at', 'desc')->get();

            $t_contacts = (array)$contacts;

            $t_contacts = array_filter($t_contacts);

            if(empty($t_contacts)){
                return "no";
            }
            
        } else {
            $contacts = User::where('id', '!=', auth()->id())->orderBy('created_at', 'desc')->get();
        }

        // get a collection of items where sender_id is the user who sent us a message
        // and messages_count is the number of unread messages we have from him
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        // add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });

        return $contacts;
    }


    public function publish_blog()
    {
        $blog_categories = BlogCategory::all();
        $blog_tags       = BlogTag::all();

        return view('user.publish-blog')->with('blog_categories', $blog_categories)->with('blog_tags', $blog_tags);
    }

    public function store_user_blog(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|unique:blog_posts|max:500',
            'featured'    => 'required|image',
            'category_id' => 'required',
            'content'     => 'required', 
            'tags'        => 'required',
            'is_homepage' => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $post = BlogPost::create([
            'title'       => $request->title,
            'content'     => $request->content,
            'featured'    => 'uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id,
            'slug'        => Str::slug($request->title),
            'user_id'     => Auth::id(),
            'is_homepage' => $request->is_homepage,
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('noty-success', 'Post added successfully !');
        return redirect()->back();
    }

    public function my_blogs()
    {
        return view('my-blogs')->with('blogs', BlogPost::where('user_id', Auth::id())->get())->with('featured_blog', BlogPost::where('is_homepage', 1)->where('user_id', Auth::id())->inRandomOrder()->limit(1)->get());
    }

    public function publish_gallery()
    {
        $my_images = Imagem::where('user_id', Auth::id())->get();
        return view('user.my-gallery')->with('my_images', $my_images);
    }

    public function store_gallery_images(Request $request) 
    {
        $this->validate($request, [
            'thumbnail' => 'required'
        ]);

        $temp            = 'temp/'; // Temp
        $path            = 'img-gallery/'; // Path General

        $find_gallery_img = Imagem::where('user_id', Auth::id())->first();

        $images = array();
        $find_images = explode(', ', $find_gallery_img->thumbnail);

        foreach ($find_images as $find_image) {
            if($find_image != null){
                array_push($images, $find_image);
            }
        }

        if ($files = $request->file('thumbnail')) {
            foreach ($files as $file) {

                $extension       = $file->getClientOriginalExtension();
                $real_name       = $file->getClientOriginalName();
                $name_without_ex = pathinfo($real_name, PATHINFO_FILENAME);
                $sizeFile        = $file->getSize();
                $file_size_mb    = number_format($sizeFile / 1024, 2);
                $thumbnail       = $name_without_ex.'-'.Str::random(2).'.'.$extension.' ('.$file_size_mb.' KB)';

                if( $file->move($temp, $thumbnail) ) {

                    $image = Image::make($temp.$thumbnail);

                    \File::copy($temp.$thumbnail, $path.$thumbnail);
                    \File::delete($temp.$thumbnail);

                    $images[] = $thumbnail;

                }// End File
            }
        } // HasFile

        else {
            $thumbnail = '';
            $images[] = $thumbnail;
        }

        $update_img_array = implode(', ', $images);
        $find_gallery_img->thumbnail = $update_img_array;
        $find_gallery_img->save();

        Session::flash('noty-success', 'Image(s) added to the gallery successfully !');
        return redirect()->back();

    }

    public function delete_gallery_image($thumbnail) 
    {
        $find_images = Imagem::where('user_id', Auth::id())->first();

        $find_img = explode(', ', $find_images->thumbnail);
        
        if (($key = array_search($thumbnail, $find_img)) !== false) {
            
            $thumbnail_img = public_path().'/img-gallery/'.$find_img[$key]; // Path General
            
            \File::delete($thumbnail_img);
            unset($find_img[$key]);
        }

        $insert_img_array = implode(', ',$find_img);
        $find_images->thumbnail = $insert_img_array;
        $find_images->save();

        Session::flash('noty-error', 'Image(s) deleted successfully !');
        return redirect()->back();
    }
}
