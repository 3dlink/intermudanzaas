<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\User;
use App\Models\Role;
use App\Models\Room;
use App\Models\Object;
use App\Models\Box;
use App\Models\Estimacion;
use App\Models\Pais;
use App\Models\Especiales;
use App\Models\Fotos;
use App\Models\Estados;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Validator;
use Input;
use Image;
use File;
use Storage;
use Excel;

class EstimacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        if ($user->hasRole('administrador') || $user->hasRole('coordinacion')){
            $estimaciones = Estimacion::all();
        } elseif ($user->hasRole('ventas')){
            $estimaciones = $user->a_cargo;
        } elseif ($user->hasRole('logistica')){
            $estimaciones = $user->logistics;
        } elseif ($user->hasRole('cliente')){
            $estimaciones = $user->estimaciones;
        }
        
        $total_estimaciones = count($estimaciones);

        return View('estimacion.index', [
            'estimaciones'          => $estimaciones, 
            'total_estimaciones'    => $total_estimaciones
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $rooms = Room::all();
        // $paises = Pais::all();
        // $paises_array = array();
        // $paises_array[''] = '';

        // foreach ($paises as $value) {
        //     $paises_array[$value->id] = $value->name;
        // }

        // return view('estimacion.create', [
        //     'rooms'     => $rooms,
        //     'paises'    => $paises_array
        //     ]);
        $est = new Estimacion();
        $user = \Auth::user();
        $est->cliente = $user->id;
        $est->estado = 2;
        $est->save();

        return redirect('app/estimaciones')->with('status', 'Estimación creada éxitosamente, por favor proceda a llenar el formulario!');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'telf_origen'               => 'required',
            'p_origen'                  => 'required',
            'c_origen'                  => 'required',
            'telf_destino'              => 'required',
            'p_destino'                 => 'required',
            'c_destino'                 => 'required',
            'dir_origen'                => 'required',
            'dir_destino'               => 'required',
            'tipo_mudanza'              => 'required',
            'fecha_estimada'            => 'required'
            ], [
            'telf_destino.required'     => 'Debe ingresar un número telefónico del país de destino',
            'telf_origen.required'      => 'Debe ingresar un número telefónico del país de origen',
            'p_origen.required'         => 'Debe seleccionar un país de origen',
            'p_destino.required'        => 'Debe seleccionar un país de destino',
            'c_origen.required'         => 'Debe ingresar una ciudad de origen',
            'c_destino.required'        => 'Debe ingresar una ciudad de destino',
            'dir_origen.required'       => 'Debe ingresar una dirección de origen',
            'dir_destino.required'      => 'Debe ingresar una dirección de destino',
            'tipo_mudanza'              => 'Debe seleccionar un tipo de mudanza',
            'fecha_estimada.required'   => 'Debe ingresar una fecha aproximada para la mudanza'
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estimacion = Estimacion::find($id);
        $especiales = $estimacion->especiales;
        $rooms = Room::all();
        $paises = Pais::all();
        $paises_array = array();
        $paises_array[''] = '';

        if (\Auth::user()->id == $estimacion->a_cargo) {
            $estimacion->cambio = 0;
            $estimacion->save();
        }

        foreach ($paises as $value) {
            $paises_array[$value->id] = ucwords($value->name);
        }

        return view('estimacion.show', [
            'rooms'         => $rooms,
            'paises'        => $paises_array,
            'estimacion'    => $estimacion,
            'especiales'    => $especiales
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estimacion = Estimacion::find($id);
        $especiales = $estimacion->especiales;
        $rooms = Room::all();
        $paises = Pais::all();
        $paises_array = array();
        $paises_array[''] = '';

        foreach ($paises as $value) {
            $paises_array[$value->id] = ucwords($value->name);
        }

        return view('estimacion.edit', [
            'rooms'         => $rooms,
            'paises'        => $paises_array,
            'estimacion'    => $estimacion,
            'especiales'    => $especiales
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
            $user = \Auth::user();

            $obj_box_esp = $request->except([
                'telf_origen',
                'p_origen',
                'c_origen',
                'telf_destino',
                'p_destino',
                'c_destino',
                'dir_origen',
                'dir_destino',
                '_token',
                'fecha_estimada',
                'tipo_mudanza',
                'ingreso_por',
                'comentario'
                ]);


            $est = Estimacion::find($id);
            $est->telf_origen       = $request->input('telf_origen');
            $est->p_origen          = $request->input('p_origen');
            $est->c_origen          = $request->input('c_origen');
            $est->telf_destino      = $request->input('telf_destino');
            $est->p_destino         = $request->input('p_destino');
            $est->c_destino         = $request->input('c_destino');
            $est->dir_destino       = $request->input('dir_destino');
            $est->dir_origen        = $request->input('dir_origen');
            $est->fecha_estimada    = $request->input('fecha_estimada');
            $est->tipo_mudanza      = $request->input('tipo_mudanza');
            $est->comentario        = $request->input('comentario');
            $est->estado            = 3;
            $est->cambio            = 1;

            if ($est->p_destino == $est->p_origen) {
                $est->alcance = 1;
            } else {
                $est->alcance = 2;
            }

            $est->save();

            $est->objects()->detach();
            $est->boxes()->detach();


            foreach ($est->especiales as $a_esp) {
                if (!$request->has('esp_name_'.$a_esp->id)) {
                    if ($a_esp->image) {
                        $this->removeEspImg($a_esp->image);
                    }
                    $a_esp->delete();
                }
            }

            foreach ($obj_box_esp as $key => $value) {
                $aux = explode('_', $key);

                if ($aux[0] == 'box') {
                    $est->boxes()->attach((int)$aux[1], [
                        'room_id' => (int)$aux[2],
                        'cantidad' => $value
                        ]);
                } elseif ($aux[0] == 'obj'){
                    $est->objects()->attach((int)$aux[1], [
                        'room_id' => (int)$aux[2],
                        'cantidad' => $value
                        ]);
                } elseif ($aux[0] == 'esp'){
                    if ($aux[1] == 'name') {
                        $esp = Especiales::find($aux[2]);

                        if ($esp == null) {
                            $esp = new Especiales;
                        }

                        $esp->name = $value;

                        if ($request->has('esp_desc_'.$aux[2])) {
                            $esp->description = $request->input('esp_desc_'.$aux[2]);
                        }

                        if (Input::file('esp_foto_'.$aux[2]) != NULL) {

                            $img = Input::file('esp_foto_'.$aux[2]);

                            $p = $this->uploadEspImg($img, $aux[2], $est->id, $user);

                            if ($esp->image) {
                                $this->removeEspImg($esp->image);
                            }

                            $esp->image = $p;
                            $esp->img_orig_name = $img->getClientOriginalName();
                        }

                        $esp->estimacion_id = $est->id;
                        $esp->save();
                    }
                }
            }

            return redirect('app/estimaciones')->with('status', 'Estimación enviada éxitosamente!');
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
        $est = Estimacion::find($id);

        foreach ($est->fotos as $foto) {
            $foto = Fotos::find($foto->id);
            Storage::delete('/users/uploads'.$foto->image);
            $foto->delete();
        }
        foreach ($est->especiales as $esp) {
            $esp = Especiales::find($esp->id);
            Storage::delete('/users/uploads'.$esp->image);
            $esp->delete();
        }
        $est->objects()->detach();
        $est->boxes()->detach();
        $est->delete();

        return redirect('app/estimaciones')->with('status', 'Estimación eliminada éxitosamente!');
    }

    public function upload(Request $request)
    {
        $user = \Auth::user();
        foreach (Input::file() as $key => $img) {
            $aux = explode('_', $key);

            foreach ($img as $a_img) {
                $foto = new Fotos;
                $foto->image = $this->uploadRegularImg($a_img,$aux[2], $user);
                $foto->img_orig_name = $a_img->getClientOriginalName();
                $foto->estimacion_id = $aux[2];
                $foto->save();
            }
        }

        return 1;
    }

    private function uploadEspImg($img, $n, $est_id, $user){

        $filename           = 'img_'.$est_id.'_'.$n.'_'.$this->__randomStr(3).'.' . $img->getClientOriginalExtension();
        $save_path          = storage_path() . '/users/uploads/images/'.$user->id.'/especiales/';

        // MAKE USER FOLDER AND UPDATE PERMISSIONS
        File::makeDirectory($save_path, $mode = 0755, true, true);

        // SAVE FILE TO SERVER
        Image::make($img)->save($save_path . $filename);

        // SAVE ROUTED PATH TO IMAGE TO DATABASE
        $pic = '/images/'. $user->id .'/especiales/' . $filename;

        return $pic;
    }

    private function uploadRegularImg($img, $est_id, $user){
        $filename           = 'img_'.$est_id.'_'.$this->__randomStr(3).'.' . $img->getClientOriginalExtension();
        $save_path          = storage_path() . '/users/uploads/images/'.$user->id.'/';

        // MAKE USER FOLDER AND UPDATE PERMISSIONS
        File::makeDirectory($save_path, $mode = 0755, true, true);

        // SAVE FILE TO SERVER
        Image::make($img)->save($save_path . $filename);

        // SAVE ROUTED PATH TO IMAGE TO DATABASE
        $pic = '/images/'. $user->id .'/' . $filename;

        return $pic;     
    }

    // FUNCTON TO RETURN A USER ESPECIAL IMAGE
    public function getEspImg($id, $image)
    {
        return Image::make(storage_path() . '/users/uploads/images/'.$id.'/especiales/'. $image)->response();
    }
    public function getRegularImg($id, $image)
    {
        return Image::make(storage_path() . '/users/uploads/images/'.$id.'/'. $image)->response();
    }

    public function getFotos($id)
    {
        $est = Estimacion::find($id);
        $fotos = $est->fotos;

        $arr = [];
        foreach ($fotos as $f) {
            $obj = [];
            $obj['id'] = $f->id;
            $obj['name'] = $f->img_orig_name;

            array_push($arr, $obj);
        }

        return $arr;
    }

    public function deleteFoto($id)
    {
        $foto = Fotos::find($id);
        $image = $foto->image;
        Storage::delete('/users/uploads'.$image);
        $foto->delete();
        return 1;
    }


    private function removeEspImg($image)
    {
        Storage::delete('/users/uploads'.$image);
    }

    public  function __randomStr($length) {
        $str = '';
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        $size = strlen ( $chars );
        for($i = 0; $i < $length; $i ++) {
            $str .= $chars [rand ( 0, $size - 1 )];
        }

        return $str;
    }

    public function four2five($id)
    {
        $est = Estimacion::find($id);
        $est->estado = 5;
        $est->cambio = 1;
        $est->save();

        return ['id' => $id, 'name' => 'Aprobado', 'styles' => ['background-color' => 'black', 'color' => 'white']];
    }

    public function four2two($id)
    {
        $est = Estimacion::find($id);
        $est->estado = 2;
        $est->cambio = 1;
        $est->save();

        return ['id' => $id, 'name' => 'Estimación', 'styles' => ['background-color' => 'black', 'color' => 'white']];
    }

    public function getEstadosV($id)
    {
        $est = Estimacion::find($id);
        $estados = Estados::all();

        $est_arr = [];
        foreach ($estados as $a_est) {
            if ($est->alcance == 1) {
                if (!in_array($a_est->id, [11,12])) {
                    $est_arr[$a_est->id] = $a_est->name;
                } 
            } else {
                $est_arr[$a_est->id] = $a_est->name;
            }
        }

        return view('estimacion.estados', [
            'est'           => $est,
            'estado'        => $est_arr
            ]);
    }

    public function getOperativoV($id)
    {
        $est = Estimacion::find($id);
        $operativo = User::where('role_id', '=', '3')->get();

        $opv_arr = [];
        $opv_arr[''] = '';
        foreach ($operativo as $a_opv) {
            $opv_arr[$a_opv->id] = $a_opv->first_name.' '.$a_opv->last_name;
        }

        return view('estimacion.operativo', [
            'est'           => $est,
            'a_cargo'       => $opv_arr
            ]);
    }

    public function getLogisticaV($id)
    {
        $est = Estimacion::find($id);
        $logistica = User::where('role_id', '=', '2')->get();

        $log_arr = [];
        $log_arr[''] = '';
        foreach ($logistica as $a_log) {
            $log_arr[$a_log->id] = $a_log->first_name.' '.$a_log->last_name;
        }

        return view('estimacion.logistica', [
            'est'           => $est,
            'logistica'     => $log_arr
            ]);
    }

    public function updateEstado(Request $request, $id)
    {
        $est = Estimacion::find($id);
        $est->estado = $request->input('estado');
        $est->save();

        return redirect('app/estimaciones')->with('status', 'Cambio de estado éxitoso!');
    }

    public function updateOperativo(Request $request, $id)
    {
        $est = Estimacion::find($id);
        $est->a_cargo = $request->input('a_cargo');
        $est->save();

        return redirect('app/estimaciones')->with('status', 'Asignación éxitosa!');
    }

    public function updateLogistica(Request $request, $id)
    {
        $est = Estimacion::find($id);
        $est->logistica = $request->input('logistica');
        $est->save();

        return redirect('app/estimaciones')->with('status', 'Asignación éxitosa!');
    }

    public function getUploadView($id)
    {
        $est = Estimacion::find($id);
        return view('estimacion.upload', ['est' => $est]);
    }

    public function uploadPDF(Request $request){
        $validator = $this->uploadValidator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
                );
        } else {
            $est = Estimacion::find($request->input('est'));

            $file = Input::file('archivo');
            $direccion = base_path().'/public/uploads/';
            $name = "cotizacion_".$this->__randomStr(5)."_".$est->id.".".$file->getClientOriginalExtension();
            $file->move($direccion,  $name);

            $archivo = $direccion.$name;

            $est->archivo = $archivo;
            $est->save();

            return redirect('app/estimaciones')->with('status', 'Cotización subida éxitosamente');
        }
    }

    public function uploadValidator(array $data)
    {
        return Validator::make($data, [
            'archivo'                     => 'required|mimes:docx,doc,pdf'
            ], [
            'archivo.required'            => 'Seleccione un archivo',
            'archivo.mimes'               => 'Debe seleccionar un archivo válido'
            ]);
    }

    public function getPDF($id)
    {
        $est = Estimacion::find($id);
        $file_url = $est->archivo;
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: inline; filename=\"" . basename($file_url) . "\"");
        header('Content-Length: ' . filesize($file_url));
        header('Accept-Ranges: bytes');
        readfile($file_url);
    }
}
