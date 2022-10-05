<?php

namespace App\Http\Controllers\admin\infoblocks;

use App\Http\Controllers\Controller;
use App\Models\Infoblock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class InfoblockValuesController extends Controller
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
    public function create($infoblock_id)
    {

        $infoblock_info = Infoblock::FindOrFail($infoblock_id);
        $component_id = $infoblock_info->component_id;
        //$Model = 'App\Models\components\Component_' . $component_id;
        $attr = Schema::getColumnListing('component_' . $component_id);

        return view('layouts.admin.infoblock.values.create', compact('infoblock_id', 'component_id', 'attr'));
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
            'infoblock_id' => 'required',
            'component_id' => 'required',
        ]);

        $component_id = $request->component_id;
        $Model = 'App\Models\components\Component_' . $component_id;


        $component = new $Model;
        $attr = Schema::getColumnListing('component_' . $component_id);
        foreach ($attr as $key => $item){
            $component[$item] = $request->$item;
        }
        $component->save();


        if($component){

            return redirect('/admin/pages')->with('status', 'component add!');

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
    public function edit(Request $request, $id, $sub_id)
    {
        dd($sub_id);
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
