<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Auth;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Str;

class BlogPostController extends BaseController
{
    public function index()
    {
    	$this->setPageTitle('Blog Posts', 'List of all blog posts');
        return view('admin.blog-posts.index')->with('blog_posts', BlogPost::all());
    }

    public function create()
    {
        $blog_categories = BlogCategory::all();
        $blog_tags       = BlogTag::all();

        if($blog_categories->count() == 0){
            return $this->responseRedirect('blog.category', 'Category not found ! Insert a new category to create a post.' ,'warning', false, false);
        } else if($blog_tags->count() == 0){
            return $this->responseRedirect('blog.tag', 'Tag not found ! Insert a new category to create a post.' ,'warning', false, false);
        }

        $this->setPageTitle('Blog Posts', 'Create a blog post');
        return view('admin.blog-posts.create')->with('blog_categories', $blog_categories)->with('blog_tags', $blog_tags);
    }

    public function store(Request $request)
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

        return $this->responseRedirect('blog.post', 'Blog Post added successfully !' ,'success', false, false);
    }

    public function destroy($slug)
    {
        $post = BlogPost::where('slug', $slug)->first();
        $post->delete();

        return $this->responseRedirect('blog.all.trashed.post', 'Blog Post has been trashed !', 'warning', false, false);
    }

    public function trashed()
    {
        $this->setPageTitle('Trashed Blog Posts', 'List of all trashed posts');

        $posts = BlogPost::onlyTrashed()->get();
        return view('admin.blog-posts.trashed')->with('blog_posts', $posts);
    }

    public function restore($slug)
    {
        $posts = BlogPost::withTrashed()->where('slug', $slug)->first();
        $posts->restore();

        return $this->responseRedirect('blog.post', 'Blog Post has been restored !', 'info', false, false);
    }

    public function delete($slug)
    {
        $posts = BlogPost::withTrashed()->where('slug', $slug)->first();
        $posts->forceDelete();

        return $this->responseRedirect('blog.all.trashed.post', 'Blog Post has been deleted !', 'error', false, false);
    }

    
    public function edit($slug)
    {
        $this->setPageTitle('Blog Posts', 'Update blog post');
        $post = BlogPost::where('slug', $slug)->first();
        return view('admin.blog-posts.edit')->with('post', $post)
                                       ->with('blog_categories', BlogCategory::all())
                                       ->with('blog_tags', BlogTag::all()); 
    }


    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'title'       => 'required|max:500',
            'category_id' => 'required',
            'content'     => 'required', 
            'tags'        => 'required',
            'is_homepage' => 'required'
        ]);
        
        $post = BlogPost::where('slug', $slug)->first();
        // Check avaiability
        $post_slug = Str::slug($request->title);
        $check_post = BlogPost::where('slug', $post_slug)->first();
        if($post->slug != $post_slug){
            if ($check_post) {
                return $this->responseRedirectBack('Post already exists! Update denied.' ,'error', false, false);
            } else {
                if($request->hasFile('featured')){
                    $featured = $request->featured;
                    $featured_new_name = time().$featured->getClientOriginalname();
                    $featured->move('uploads/posts', $featured_new_name);
                    $post->featured = 'uploads/posts/'.$featured_new_name;
                }

                $post->title       = $request->title;
                $post->content     = $request->content;
                $post->category_id = $request->category_id;
                $post->slug        = Str::slug($request->title);
                $post->admin_id    = Auth::id();
                $post->is_homepage = $request->is_homepage;

                $post->save();

                $post->tags()->sync($request->tags);

                /*return $this->responseRedirectBack('Post updated successfully.', 'success', false, false);
                return redirect()->route('blog.edit.post', ['slug' => $post->slug])->with(['message', 'Blog post updated successfully.']);
                */
                
                return $this->responseRedirect('blog.post', 'Blog post updated successfully !' ,'info', false, false);
            }
        } else {
            if($request->hasFile('featured')){
                $featured = $request->featured;
                $featured_new_name = time().$featured->getClientOriginalname();
                $featured->move('uploads/posts', $featured_new_name);
                $post->featured = 'uploads/posts/'.$featured_new_name;
            }

            $post->title       = $request->title;
            $post->content     = $request->content;
            $post->category_id = $request->category_id;
            $post->slug        = Str::slug($request->title);
            $post->admin_id    = Auth::id();
            $post->is_homepage = $request->is_homepage;

            $post->save();

            $post->tags()->sync($request->tags);

            return $this->responseRedirectBack('Title unchanged but post updated successfully.', 'success', false, false);
        }

    }
}
