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

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        $total_rooms = count($rooms);

        return view('rooms.index', [
            'rooms' => $rooms,
            'total_rooms' => $total_rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name'                      => 'required',
            'description'               => 'max:255',
        ], [
            'name.required'             => 'Ingrese un nombre para este cuarto',
            'description.max'           => 'La descripción no debe pasar los 255 carácteres'
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
            $this->throwValidationException(
                $request, $validator
                );
        }else{
            $room = new Room;
            $room->name         = $request->input('name');
            $room->description  = $request->input('description');
            $room->save();

            return redirect('rooms')->with('status', 'Cuarto creado éxitosamente!');
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
        $room = Room::find($id);
        return view('rooms.edit', ['room' => $room]);
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
            $this->throwValidationException(
                $request, $validator
                );
        }else{
            $room = Room::find($id);
            $room->name         = $request->input('name');
            $room->description  = $request->input('description');
            $room->save();

            return redirect('rooms')->with('status', 'Cuarto actualizado éxitosamente!');
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
        $room = Room::find($id);
        $room->objects()->detach();
        $room->boxes()->detach();
        $room->delete();

        return redirect('rooms')->with('status', 'Cuarto eliminado éxitosamente!');
    }

    public function test()
    {
        $rooms = Room::all();
        return view('cotizacion.create', [
            'rooms' => $rooms
        ]);
    }
}
