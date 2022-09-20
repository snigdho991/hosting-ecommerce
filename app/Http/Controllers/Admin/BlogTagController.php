<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BlogTag;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Str;

class BlogTagController extends BaseController
{
    public function index()
    {
    	$this->setPageTitle('Blog Tags', 'List of all blog tags');
        return view('admin.blog-tags.index')->with('blog_tags', BlogTag::all())->with('blog_tags', BlogTag::all());
    }

    public function create()
    {
    	$this->setPageTitle('Blog Tags', 'Create a blog tag');
        return view('admin.blog-tags.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|unique:blog_tags|max:255',
        ]);

        $tag = new BlogTag;
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();

        return $this->responseRedirect('blog.tag', 'Blog Tag added successfully !' ,'success', false, false);
    }

    public function edit($slug)
    {
    	$this->setPageTitle('Blog Tags', 'Update blog tag');
        $blog_tag = BlogTag::where('slug', $slug)->first();
        
        return view('admin.blog-tags.edit')->with('blog_tag', $blog_tag);

    }

    public function update(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $chk_cat = BlogTag::where('name', $request->name)->first();

        if ($chk_cat) {
            return $this->responseRedirectBack('Tag already exists! Update denied.' ,'error',false, false);
        } else {
            $tag = BlogTag::where('slug', $request->slug)->first();
            $tag->name = $request->name;
            $tag->slug = Str::slug($request->name);
            $tag->save();

            return $this->responseRedirect('blog.tag', 'Blog tag updated successfully !' ,'info', false, false);
        }
    }

    public function destroy($slug)
    {
        $tag = BlogTag::where('slug', $slug)->first();
    
        $tag->delete();
        return $this->responseRedirect('blog.tag', 'Tag deleted successfully !' ,'success',false, false);
    }
}
