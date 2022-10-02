<?php

namespace App\Http\Controllers\admin\pages;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Page;
use App\Models\Infoblock;
use Illuminate\Http\Request;
//use App\Models;

class pageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_pages = Page::all();
        return view('layouts.admin.pages.index', compact('all_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_pages = Page::all();
        return view('layouts.admin.pages.create', compact('all_pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        if($request->)

        $validated = $request->validate([
            'name' => 'required|unique:pages',
            'slug' => 'required',
        ]);

        $page = new Page;

        foreach ($validated as $key => $item){
            $page[$key] = $item;
        }

        $page->save();


        if($page){

            return redirect('/admin/pages')->with('status', 'Page add!');

        }else{

            return redirect('/admin/pages')->with('status', 'Error');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this_page_components = Infoblock::where('page_id', $id)->get();
        $all_components = Component::all();
        $all_pages = Page::all();
        $page = Page::FindOrFail($id);
        $page_id = $id;


        return view('layouts.admin.pages.edit',
            compact('page', 'all_pages', 'this_page_components', 'all_components', 'page_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
