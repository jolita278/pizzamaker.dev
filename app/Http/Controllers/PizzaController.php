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
    {
        $config = [];
        $config['list'] = Pizza::with(['type', 'cheese', 'connPizzaIngridients'])->get()->toArray();
        return view('madedPizzas', $config);
    }


    /**
     * Get data to Form for labels
     *
     * @return array
     */
    public function getFormData()
    {
        $config = [];

        $typeList = PizzaType::select('id', 'callories', 'name')->get()->toArray();

        foreach ($typeList as $pizzatype)
            $config['type'][$pizzatype['id']] = $pizzatype['name'] . ', ' . $pizzatype['callories'];

        $cheeseList = Cheese::select('id', 'callories', 'name')->get()->toArray();

        foreach ($cheeseList as $pizzacheese)
            $config['cheese'][$pizzacheese['id']] = $pizzacheese['name'] . ', ' . $pizzacheese['callories'];

        $ingridientsList = Ingridients::select('id', 'callories', 'name')->get()->toArray();

        foreach ($ingridientsList as $pizzaingridient)
            $config['ingridient'][$pizzaingridient['id']] = $pizzaingridient['name'] . ', ' . $pizzaingridient['callories'];

        return $config;
    }

    /**
     * Show the form for creating a new resource.
     * GET /pizza/create
     *
     * @return Response
     */
    public function create()
    {
        $config = $this->getFormData();

        return view('makepizza', $config);
    }

    /**
     * Store a newly created resource in storage.
     * POST /pizza
     *
     * @return Response
     */
    public function store()
    {
        $data = request()->all();

        $contacts = $data['contacts'];

        if (isset($data['ingridient']) && sizeof($data['ingridient']) > 3) {

            $config = $this->getFormData();

            $config['error'] = ['id' => 'Klaida 00001', 'message' => 'Pasirinkta per daug ingridientų!'];

            return view('makepizza', $config);

        } elseif ($contacts == null) {
            $config = $this->getFormData();

            $config['error'] = ['id' => 'Klaida 00002', 'message' => 'Neįrašyti kontaktiniai duomenys!'];

            return view('makepizza', $config);

        } elseif ($data['cheese_id'] == 'default') $data['cheese_id'] = null;

        $record = Pizza::create(
            [
                'type_id' => $data['type_id'],
                'cheese_id' => $data['cheese_id'],
                'contacts' => $data['contacts'],
            ]
        );

        $record->ingridients()->sync($data['ingridient']);

        $config = $this->getFormData();

        $config['success_message'] = ['id' => 'Užsakymas priimtas! ', 'message' => 'Kontaktinė informacija -  ' . $data['contacts']];

        return view('makepizza', $config);
    }

    /**
     * Display the specified resource.
     * GET /pizza/{id}
     *
     * @param  int $id
     * @return mixed
     */
    public function show($id)
    {
        return Pizza::with(['connPizzaIngridients', 'cheese', 'type'])->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     * GET /pizza/{id}/edit
     *
     * @param  int $id
     * @return mixed
     */
    public function edit($id)
    {
        $config = $this->getFormData();
        $config['item'] = Pizza::with(['connPizzaIngridients', 'cheese', 'type'])->find($id);

        $config['ingridientsItems'] = $config['item']->connPizzaIngridients->pluck('ingridients_id')->toArray();
        $config['item'] = $config['item']->toArray();

        return view('editpizza', $config);

    }

    /**
     * Update the specified resource in storage.
     * PUT /pizza/{id}
     *
     * @param  int $id
     * @return mixed
     */
    public function update($id)
    {
        return Pizza::with(['connPizzaIngridients', 'cheese', 'type'])->find($id);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /pizza/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}