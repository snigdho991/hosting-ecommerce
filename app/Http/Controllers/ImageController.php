<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagem;
use App\Models\Page;

use Illuminate\Pagination\LengthAwarePaginator;

use Session;
use Auth;

class ImageController extends Controller
{
    public function all_images()
    {
        $images = Imagem::all();

        $images_arr = array();
            
        foreach ($images as $find_image) {
            $find_images = explode(', ', $find_image->thumbnail);

            if($find_image != null){
                $images_arr = array_merge($images_arr, $find_images);
            }
        }

        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $itemCollection = collect($images_arr);
 
        // Define how many items we want to be visible in each page
        $perPage = 6;
 
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedItems = new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

        // set url path for generted links
        $paginatedItems->setPath('/gallery'); 
        
        return view('gallery')->with(['images_arr' => $paginatedItems])->with('images', $images);
    }

   public function frontend_page($page)
    {
        $find_page = Page::where('slug', $page)->first();
        return view('frontend-page')->with('find_page', $find_page);
    } 
}
