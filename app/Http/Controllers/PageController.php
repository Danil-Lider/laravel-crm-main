<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($slug){

        $page = Page::where('slug', $slug)->firstOrFail();

        if (\View::exists('layouts.pages.'.$page->slug)) {
            return view('layouts.pages.'.$page->slug,compact('page'));
        }else{
            return view('layouts.pages.index',compact('page'));
        }

    }
}
