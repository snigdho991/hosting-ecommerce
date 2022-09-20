<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Str;

class BlogCategoryController extends BaseController
{
    public function index()
    {
    	$this->setPageTitle('Blog Categories', 'List of all blog categories');
        return view('admin.blog-categories.index')->with('blog_categories', BlogCategory::all())->with('blog_categories', BlogCategory::all());
    }

    public function create()
    {
    	$this->setPageTitle('Blog Categories', 'Create a blog category');
        return view('admin.blog-categories.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|unique:blog_categories|max:255',
        ]);

        $category = new BlogCategory;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return $this->responseRedirect('blog.category', 'Blog Category added successfully !' ,'success', false, false);
    }

    public function edit($slug)
    {
    	$this->setPageTitle('Blog Categories', 'Update blog category');
        $blog_category = BlogCategory::where('slug', $slug)->first();
        
        return view('admin.blog-categories.edit')->with('blog_category', $blog_category);

    }

    public function update(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $chk_cat = BlogCategory::where('name', $request->name)->first();

        if ($chk_cat) {
            return $this->responseRedirectBack('Category already exists! Update denied.' ,'error',false, false);
        } else {
            $category = BlogCategory::where('slug', $request->slug)->first();
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->save();

            return $this->responseRedirect('blog.category', 'Blog Category updated successfully !' ,'info', false, false);
        }
    }

    public function destroy($slug)
    {
        $category = BlogCategory::where('slug', $slug)->first();
    
        $category->delete();
        return $this->responseRedirect('blog.category', 'Category deleted successfully !' ,'success',false, false);
    }
}
