<?php

namespace App\Http\Controllers\admin\components;

use App\Http\Controllers\Controller;
use App\Models\Component;
//use App\Models\Component_5 as Component_5;
use Illuminate\Http\Request;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class componentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $components = Component::all();
        return view('layouts.admin.components.index', compact('components'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $components = Component::all();
        return view('layouts.admin.components.create', compact('components'));
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
            'slug' => 'required',
        ]);

        $component = new Component();

        foreach ($validated as $key => $item){
            $component[$key] = $item;
        }

        $component->save();

        Schema::create('component_' .  $component->id, function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedBigInteger('infoblock_id');
            $table->timestamps();
        });

        creacte_model($component->id);


        return redirect('/admin/components')->with('status', 'component add!');
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
        $table_name = 'component_' . $id;

        if (Schema::hasTable($table_name)){

            $columns = Schema::getColumnListing($table_name);

            return view('layouts.admin.components.edit', compact('columns', 'id'));

        }else{
            echo 'Нету такой таблицы';
        }

        //            Schema::table($table_name, function($table)
        //            {
        //                $table->string('name');
        //            });
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
//        use Illuminate\Database\Schema\Blueprint;
//        use Illuminate\Support\Facades\Schema;
//        $type = $request->type;

//        $request = $request;
//        global $id;
        Schema::table('component_' . $id, function (Blueprint $table) use ($request) {
            $type = $request->type;
            $table->$type($request->name);
        });
        $back = url()->previous();
        return redirect($back)->with('status', 'colum '.$request->name.' id add!');
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

function creacte_model($id){

    $text_php = '<?php ';
    $table = '$table';
    $text_php .= "namespace App\Models\components;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component_$id extends Model
{
    protected $table = 'component_$id';
    use HasFactory;
}
";

    $url = app_path() . '/Models/components/Component_' . $id . '.php';

    $f = fopen($url, 'w');

    # Добавим что-нибудь в файл
    fwrite($f, $text_php);

    # Закроем соединение с файлом
    fclose($f);
}
