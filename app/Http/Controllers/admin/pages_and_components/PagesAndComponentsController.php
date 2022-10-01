<?php

namespace App\Http\Controllers\admin\pages_and_components;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use App\Models\Component_8;
use App\Models\PageAndComponent;
use Illuminate\Http\Request;

class PagesAndComponentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'page_id' => 'required',
            'component_id' => 'required',
        ]);

        $PageAndComponent = new PageAndComponent();

        foreach ($validated as $key => $item){
            $PageAndComponent[$key] = $item;
        }

        $PageAndComponent->save();
        $back = url()->previous();
        if($PageAndComponent){
            return redirect($back)->with('status', 'colum '.$request->name.' id add!');
        }else{
            return redirect($back)->with('status', 'ОШИБКА');
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

        $page_and_component = PageAndComponent::where('id', $id)->first();

        $class_name = 'App\Models\Component_' . $page_and_component->component_id;
        $data = $class_name::where('id_in_pages_and_components', $id)->get();

        $attr = Schema::getColumnListing('component_8');

        return view('layouts.admin.infoblock.index', compact('data', 'attr', 'id'));
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
