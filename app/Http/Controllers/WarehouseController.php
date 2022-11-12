<?php

namespace App\Http\Controllers;


use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    private  $validationRules=[
        'name'=>['required', 'min:3', 'max:16'],
        'city'=>['required', 'alpha', 'min:3', 'max:16'],
        'address'=>['required', 'min:3', 'max:64']
    ];

    private $validationMessages=[
        'name.required'=>'Pavadinimas yra privalomas ',
        'name.min'=>'<b>Pavadinimas</b> turi būti ne trumpesnis nei 3 simboliai',
        'name.max'=>'Pavadinimas turi būti ne ilgesnis nei 16 simbolių',
        'city.*'=>'Miestą nurodyti yra privaloma, galimos tik raidės, mažiausia 3 simboliai, daugiausia 16 simbolių'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses=Warehouse::all();
        return view("warehouses.index", [
            'warehouses'=>$warehouses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("warehouses.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules,$this->validationMessages);

        $warehouse=new Warehouse();
        $warehouse->name=$request->name;
        $warehouse->city=$request->city;
        $warehouse->address=$request->address;
        $warehouse->save();

        return redirect()->route('warehouses.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        return view("warehouses.edit", [
            "warehouse"=>$warehouse
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        $request->validate($this->validationRules,$this->validationMessages);

        $warehouse->name=$request->name;
        $warehouse->city=$request->city;
        $warehouse->address=$request->address;
        $warehouse->save();
        return redirect()->route('warehouses.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return redirect()->route('warehouses.index');
    }


}
