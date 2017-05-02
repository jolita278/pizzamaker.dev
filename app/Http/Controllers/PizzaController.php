<?php
/**
 * Created by PhpStorm.
 * User: Jolita_A
 * Date: 2017.05.02
 * Time: 13:41
 */

namespace App\Http\Controllers;


use App\model\Cheese;
use App\model\Ingridients;
use App\model\Pizza;
use App\model\PizzaType;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /pizza
     *
     * @return Response
     */
    public function index()
    {return view('welcome');

    }
    public function createForm()
    {
        $config = [];
        $config['type'] = PizzaType::pluck('name', 'id')->toArray();
        $config['cheese'] = Cheese::pluck('name', 'id')->toArray();
        $config['ingridient'] = Ingridients::pluck('name', 'id')->toArray();
        return view('makepizza',$config );
    }

    public function pickType()
    {
        $config = [];
        $config['type'] = PizzaType::all();
        return view('makepizza', $config);
    }


    /**
     * Show the form for creating a new resource.
     * GET /pizza/create
     *
     * @return Response
     */
    public function create()
    {
        $data = request()->all();
        $record = Pizza::create(
            [
                'type_id' => $data['type_id'],
                'cheese_id'=>$data['cheese_id'],
            ]
        );
        $record->ingridients()->sync($data['ingridient']);
    }

    /**
     * Store a newly created resource in storage.
     * POST /pizza
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /pizza/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /pizza/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /pizza/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /pizza/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}