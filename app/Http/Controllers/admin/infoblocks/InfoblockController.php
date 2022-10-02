<?php

namespace App\Http\Controllers\admin\infoblocks;

use App\Http\Controllers\Controller;
use App\Models\Infoblock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class InfoblockController extends Controller
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
            'name' => 'required',
            'page_id' => 'required',
            'component_id' => 'required',
            'sort' => 'required',
        ]);

        $infoblock = new infoblock();

        foreach ($validated as $key => $item){
            $infoblock[$key] = $item;
        }

        $infoblock->save();
        $back = url()->previous();
        if($infoblock){
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
        $page_and_component = infoblock::where('id', $id)->first();

        $class_name = 'App\Models\Component_' . $page_and_component->component_id;
        $data = $class_name::where('infoblock_id', $id)->get();

        $attr = Schema::getColumnListing('component_8');

//        ЗДЕСЬ ДОБАВИТЬ ЗНАЧЕНИЯ

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
