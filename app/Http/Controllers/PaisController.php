<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Pais;

use Illuminate\Support\Facades;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Validator;

class PaisController extends Controller
{
	public function index()
	{
		$paises = Pais::all();
		$total_paises = count($paises);

		return view('paises.index', [
			'paises' 		=> $paises,
			'total_paises' 	=> $total_paises
			]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('paises.create');
	}

	public function validator(array $data)
	{
		return Validator::make($data, [
			'name'                     	=> 'required',
		], [
			'name.required'            	=> 'Ingrese un nombre para este objeto',
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
            $pais = new Pais;
            $pais->name         = $request->input('name');

            $pais->save();

            return redirect('app/paises')->with('status', 'Objeto creado éxitosamente!');
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
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$pais = Pais::find($id);

		return view('paises.edit', [
			'pais'		=> $pais
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
            $pais = Pais::find($id);
            $pais->name         = $request->input('name');

	        $pais->save();

            return redirect('app/paises')->with('status', 'Objeto actualizado éxitosamente!');
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
        $pais = Pais::find($id);
        $pais->delete();

        return redirect('app/paises')->with('status', 'Objeto eliminado éxitosamente!');
	}
}
