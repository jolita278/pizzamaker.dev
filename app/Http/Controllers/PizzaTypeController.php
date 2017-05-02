<?php namespace App\Http\Controllers;

use App\model\PizzaType;
use Illuminate\Routing\Controller;

class PizzaTypeController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /pizzatype
	 *
	 * @return Response
	 */
	public function index()
	{
        return PizzaType::select('name')->get();
	}

    public function pickType()
    {
        $config = [];
        $config['type'] = PizzaType::all();
        return view('makepizza', $config);
    }


	/**
	 * Show the form for creating a new resource.
	 * GET /pizzatype/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $data = request()->all();
        $record = PizzaType::create(
            [
                'name' => $data['name'],
                'calories'=>$data['calories'],
            ]
        );
        return view('makepizza', $record->toArray());
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pizzatype
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /pizzatype/{id}
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
	 * GET /pizzatype/{id}/edit
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
	 * PUT /pizzatype/{id}
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
	 * DELETE /pizzatype/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}