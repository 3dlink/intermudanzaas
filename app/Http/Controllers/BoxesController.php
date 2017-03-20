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

class BoxesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boxes = Box::all();
        $total_boxes = count($boxes);

        return view('boxes.index', [
            'boxes' => $boxes,
            'total_boxes' => $total_boxes
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
        return view('boxes.create', ['rooms' => $rooms]);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name'                      => 'required',
            'unit'                      => 'required',
            'tooltip'                   => 'max:100',
            'description'               => 'max:255',
            'vmin'                      => 'min:1|required',
            'vmax'                      => 'required',
            'factor'                    => 'required'
        ], [
            'name.required'             => 'Ingrese un nombre para esta caja',
            'unit.required'             => 'Debe seleccionar una unidad para esta caja',
            'description.max'           => 'La descripción no debe pasar los 255 carácteres',
            'tooltip.max'               => 'El texto de ayuda no debe pasar los 100 carácteres',
            'vmin.required'             => 'Ingrese un valor mínimo para esta caja',
            'vmax.required'             => 'Ingrese un valor máximo para esta caja',
            'factor.required'           => 'Ingrese un factor para esta caja',
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
            $box = new Box;
            $box->name         = $request->input('name');
            $box->vmin         = $request->input('vmin');
            $box->vmax         = $request->input('vmax');
            $box->unit         = $request->input('unit');
            $box->factor       = $request->input('factor');
            $box->tooltip      = $request->input('tooltip');
            $box->description  = $request->input('description');
            $box->save();

            if ($request->input('rooms') != ''){
                $rooms = explode(' ', trim($request->input('rooms')));

                foreach ($rooms as $key => $value) {
                    $rooms[$key] = (int)$value;
                }

                $box->rooms()->attach($rooms);
            }

            return redirect('boxes')->with('status', 'Caja creada éxitosamente!');
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
        $box = Box::find($id);

        return view('boxes.show', ['box' => $box]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $box = Box::find($id);
        $rooms = Room::all();

        return view('boxes.edit', [
            'box'    => $box,
            'rooms'     => $rooms
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
            $box = Box::find($id);
            $box->name         = $request->input('name');
            $box->vmin         = $request->input('vmin');
            $box->vmax         = $request->input('vmax');
            $box->unit         = $request->input('unit');
            $box->factor       = $request->input('factor');
            $box->tooltip      = $request->input('tooltip');
            $box->description  = $request->input('description');


            if ($request->input('rooms') != ''){
                $rooms = explode(' ', trim($request->input('rooms')));

                foreach ($rooms as $key => $value) {
                    $rooms[$key] = (int)$value;
                }

                $box->rooms()->detach();
                $box->rooms()->attach($rooms);
            }

            $box->save();

            return redirect('boxes')->with('status', 'Caja actualizada éxitosamente!');
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
        $object = Box::find($id);
        $object->rooms()->detach();
        $object->delete();

        return redirect('objects')->with('status', 'Caja eliminada éxitosamente!');
    }
}
