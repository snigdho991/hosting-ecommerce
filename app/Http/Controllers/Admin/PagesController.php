<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends BaseController
{
    public function index()
    {
    	$this->setPageTitle('Pages', 'List of all pages');
        return view('admin.pages.index')->with('pages', Page::all());
    }

    public function create()
    {
    	$this->setPageTitle('Pages', 'Create a page');
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|max:500',
            'content'     => 'required', 
            'slug'        => 'required|unique:pages',
        ]);

        $post = Page::create([
            'title'           => $request->title,
            'content'         => $request->content,
            'slug'            => $request->slug,
            'footer_position' => $request->footer_position,
        ]);

        return $this->responseRedirect('admin.pages.index', 'Page added successfully !' ,'success', false, false);
    }

    public function edit($id)
    {
        $this->setPageTitle('Pages', 'Update a page');
        $page = Page::where('id', $id)->first();
        
        return view('admin.pages.edit')->with('page', $page);

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|max:500',
            'content'     => 'required', 
            'slug'        => 'required',
        ]);

        $chk_page = Page::where('slug', $request->slug)->first();

        if ($chk_page) {
            $page = Page::where('id', $request->id)->first();
            $page->title           = $request->title;
            $page->content         = $request->content;
            $page->footer_position = $request->footer_position;
            $page->save();
            
            return $this->responseRedirectBack('Page slug/url already exists! But other stuffs updated successfully.', 'info', false, false);
        } else {
            $page = Page::where('id', $request->id)->first();
            $page->title           = $request->title;
            $page->content         = $request->content;
            $page->slug            = $request->slug;
            $page->footer_position = $request->footer_position;
            $page->save();

            return $this->responseRedirectBack('Page updated successfully', 'info', false, false);
        }
    }

    public function delete($id)
    {
        $page = Page::where('id', $id)->first();
    
        $page->delete();
        return $this->responseRedirect('admin.pages.index', 'Page deleted successfully !' ,'error', false, false);
    }
}
