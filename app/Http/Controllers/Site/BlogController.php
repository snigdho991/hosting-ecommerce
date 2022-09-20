<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Auth;

class BlogController extends Controller
{
    public function frontend_blog()
    {
    	return view('all-blogs')->with('blogs', BlogPost::all())->with('featured_blog', BlogPost::where('is_homepage', 1)->inRandomOrder()->limit(1)->get());
    }

    public function blog_details($slug)
    {
    	$single_blog  = BlogPost::where('slug', $slug)->first();
    	$recent_blogs = BlogPost::orderBy('created_at', 'desc')->limit(3)->get();
    	/*$recent_blogs = BlogPost::orderByRaw('RAND()')->latest()->limit(3)->get();*/
    	$cats = BlogCategory::all();
        $tags = BlogTag::all();

    	return view('blog-details')->with('recent_blogs', $recent_blogs)->with('single_blog', $single_blog)->with('cats', $cats)->with('tags', $tags);
    }
}
