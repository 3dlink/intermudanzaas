<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Object;
use App\Models\Box;
use App\Models\Room;

use Illuminate\Support\Facades;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Validator;

class ObjectsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$objects = Object::all();
		$total_objects = count($objects);

		return view('objects.index', [
			'objects' => $objects,
			'total_objects' => $total_objects
			]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$rooms = Room::all();
		return view('objects.create', ['rooms' => $rooms]);
	}

	public function validator(array $data)
	{
		return Validator::make($data, [
			'name'                     	=> 'required',
			'unit'                     	=> 'required',
			'tooltip'					=> 'max:100',
			'description'              	=> 'max:255',
			'vmin'						=> 'min:1|required',
			'vmax'						=> 'required',
			'factor'					=> 'required'
		], [
			'name.required'            	=> 'Ingrese un nombre para este objeto',
			'unit.required'				=> 'Debe seleccionar una unidad para este objeto',
			'description.max'			=> 'La descripción no debe pasar los 255 carácteres',
			'tooltip.max'				=> 'El texto de ayuda no debe pasar los 100 carácteres',
			'vmin.required'            	=> 'Ingrese un valor mínimo para este objeto',
			'vmax.required'            	=> 'Ingrese un valor máximo para este objeto',
			'factor.required'           => 'Ingrese un factor para este objeto',
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }else{
            $object = new Object;
            $object->name         = $request->input('name');
            $object->vmin         = $request->input('vmin');
            $object->vmax         = $request->input('vmax');
            $object->unit         = $request->input('unit');
            $object->factor       = $request->input('factor');
            $object->tooltip      = $request->input('tooltip');
            $object->description  = $request->input('description');
            $object->save();

			if ($request->input('rooms') != ''){
	            $rooms = explode(' ', trim($request->input('rooms')));

	            foreach ($rooms as $key => $value) {
	            	$rooms[$key] = (int)$value;
	            }

	            $object->rooms()->attach($rooms);
	        }

            return redirect('app/objects')->with('status', 'Objeto creado éxitosamente!');
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
		$object = Object::find($id);

		return view('objects.show', ['object' => $object]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$object = Object::find($id);
		$rooms = Room::all();

		return view('objects.edit', [
			'object'	=> $object,
			'rooms'		=> $rooms
		]);
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
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }else{
            $object = Object::find($id);
            $object->name         = $request->input('name');
            $object->vmin         = $request->input('vmin');
            $object->vmax         = $request->input('vmax');
            $object->unit         = $request->input('unit');
            $object->factor       = $request->input('factor');
            $object->tooltip      = $request->input('tooltip');
            $object->description  = $request->input('description');


            if ($request->input('rooms') != ''){
	            $rooms = explode(' ', trim($request->input('rooms')));

	            foreach ($rooms as $key => $value) {
	            	$rooms[$key] = (int)$value;
	            }

	            $object->rooms()->detach();
	            $object->rooms()->attach($rooms);
	        }

	        $object->save();

            return redirect('app/objects')->with('status', 'Objeto actualizado éxitosamente!');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
        $object = Object::find($id);
        $object->rooms()->detach();
        $object->delete();

        return redirect('app/objects')->with('status', 'Objeto eliminado éxitosamente!');
	}
}
