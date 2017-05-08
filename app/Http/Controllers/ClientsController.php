<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Logic\User\UserRepository;
use App\Logic\User\CaptureIp;
use App\Models\Profile;
use App\Http\Requests;
use App\Models\User;
use App\Models\Role;
use App\Models\Pais;
use App\Models\Estimacion;
use App\Models\Fotos;
use App\Models\Especiales;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Validator;
use Gravatar;
use Input;
use Image;
use File;
use Storage;
use Excel;

class ClientsController extends Controller
{
	public function index()
	{
		$user                   = \Auth::user();
		$clients 			    = User::where('role_id', '=','5')->get();
		$total_clients 	        = count($clients);

		// $total_users_confirmed  = \DB::table('users')->count();
		// $total_users_confirmed  = \DB::table('users')->where('active', '1')->count();
		// $total_users_locked     = \DB::table('users')->where('resent', '>', 3)->count();

		// $total_users_new        = \DB::table('users')->where('active', '0')->count();

		return view('clients.index', [
			'user' 			        => $user,
			'clients'                   => $clients,
			'total_clients'             => $total_clients
			]
			);
	}

	public function validator(array $data)
	{
		return Validator::make($data, [
			'email'                 => 'required|email|max:255|unique:users,email',
			'first_name'            => 'required|max:255',
			'last_name'             => 'required|max:255',
			'phone'                 => '',
			'documento_id'			=> 'required|unique:users,documento_id',
			'ingreso_por'			=> 'required',
			'moneda'				=> 'required'
			], [
			'first_name.required'               => 'Ingrese un nombre',
			'last_name.required'                => 'Ingrese un apellido',
			'email.required'                    => 'Ingrese un correo electrónico',
			'email.email'						=> 'Debe ingresar un correo electrónico válido',
			'email.unique'						=> 'Ya existe un usuario con este correo electrónico',
			'documento_id.unique'				=> 'Ya existe un usuario con este documento de identidad',
			'documento_id.required'             => 'Ingrese un documento de identidad',
			'ingreso_por.required'              => 'Seleccione la forma en que se comunicó el cliente',
			'moneda.required'             	    => 'Seleccione una moneda'
			]);
	}

	public function editValidator(array $data)
	{
		return Validator::make($data, [
			'first_name'            => 'required|max:255',
			'last_name'             => 'required|max:255',
			'phone'                 => '',
			'documento_id'			=> 'required',
			'ingreso_por'			=> 'required',
			], [
			'first_name.required'               => 'Ingrese un nombre',
			'last_name.required'                => 'Ingrese un apellido',
			'documento_id.required'             => 'Ingrese un documento de identidad',
			'ingreso_por.required'              => 'Seleccione la forma en que se comunicó el cliente',
			]);
	}

	public function create()
	{
		$paises = Pais::all();
		$paises_array = array();
		$paises_array[''] = '';

		foreach ($paises as $value) {
			$paises_array[$value->id] = $value->name;
		}
		return view('clients.create', ['paises' => $paises_array]);
	}

	public function store(Request $request)
	{
		$validator = $this->validator($request->all());

		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
				);
		}else{
			$user = new User;
			$user->email 			= $request->input('email');
			$user->documento_id 	= $request->input('documento_id');
			$user->first_name 		= $request->input('first_name');
			$user->last_name 		= $request->input('last_name');
			$user->ingreso_por 		= $request->input('ingreso_por');
			$pwd 					= str_random(8);
			$user->password 		= bcrypt($pwd);
			$user->defaultPwd		= $pwd;
			$user->activation_code	= str_random(60) . $request->input('email');
			$user->role_id 			= 5;
			$user->active 			= 0;
			$user->save();

			$user->profile()->create(['phone'=>$request->input('phone')]);

			$est = new Estimacion;
			$est->cliente 				= $user->id;
			$est->fecha_estimada 		= $request->input('fecha_estimada');
			$est->tipo_mudanza 			= $request->input('tipo_mudanza');
			$est->telf_origen 			= $request->input('telf_origen');
			$est->telf_destino 			= $request->input('telf_destino');
			$est->p_origen 				= $request->input('p_origen');
			$est->p_destino 			= $request->input('p_destino');
			$est->c_origen 				= $request->input('c_origen');
			$est->c_destino				= $request->input('c_destino');
			$est->moneda				= $request->input('moneda');
			$est->alcance				= $request->input('alcance');
			$est->estado				= 1;
			$est->comentario			= $request->input('comentario');
			$est->save();

			// THE SUCCESSFUL RETURN
			return redirect('app/clientes')->with('status', 'Cliente creado éxitosamente!');
		}
	}

	public function edit($id)
	{
		$client = User::find($id);
		$paises = Pais::all();
		$paises_array = array();
		$paises_array[''] = '';

		foreach ($paises as $value) {
			$paises_array[$value->id] = $value->name;
		}
		return view('clients.edit', [
			'client' => $client,
			'paises' => $paises_array
			]);
	}

	public function update(Request $request, $id)
	{
		$validator = $this->editValidator($request->all());

		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
				);
		}else{
			$user = User::find($id);
			$user->documento_id 	= $request->input('documento_id');
			$user->first_name 		= $request->input('first_name');
			$user->last_name 		= $request->input('last_name');
			$user->ingreso_por 		= $request->input('ingreso_por');
			$user->save();

			$profile = Profile::find($user->profile->id);
			$profile->phone 		= $request->input('phone');
			$profile->save();

			// THE SUCCESSFUL RETURN
			return redirect('app/clientes')->with('status', 'Cliente actualizado éxitosamente!');
		}
	}

	public function destroy($id)
	{
		// DELETE USER
		$user = User::find($id);

		foreach ($user->estimaciones as $est) {
			$est = Estimacion::find($est->id);
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
		}

		$user->delete();

		return redirect('app/clientes')->with('status', 'Cliente eliminado éxitosamente!');
	}

	public  function __randomStr($length) {
		$str = '';
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";

		$size = strlen ( $chars );
		for($i = 0; $i < $length; $i ++) {
			$str .= $chars [rand ( 0, $size - 1 )];
		}

		return $str;
	}

	public function sendEmail($id)
	{
		$client = User::find($id);
		$data = array(
			'name' 	=> ucfirst($client->first_name).' '.ucfirst($client->last_name),
			'email'	=> $client->email,
			'code' 	=> $client->activation_code,
			'pwd'  	=> $client->defaultPwd
			);

		\Mail::queue('emails.activateClient', $data, function($message) use ($client) {
			$message->subject( \Lang::get('auth.pleaseActivate') );
			$message->to($client->email);
		});

		return 1;
	}

	public function excelExport()
	{
		$estimaciones = Estimacion::all();

		$exl_arr = [];
		$obj = [
		'Fecha' 					=> '',
		'Ingresó por' 				=> '',
		'Código'					=> '',
		'Fecha promedio'			=> '',
		'Nombre'					=> '',
		'Apellido'					=> '',
		'Correo electrónico'		=> '',
		'Telf. origen'				=> '',
		'Comentario o solicitud'	=> '',
		'Tipo de mudanza'			=> '',
		'País origen'				=> '',
		'Ciudad origen'				=> '',
		'País destino'				=> '',
		'Ciudad destino'			=> '',
		'Estado del servicio'		=> '',
		'A cargo'					=> '',
		'Mtrs3'						=> '',
		'Moneda'					=> '',
		'Valor USD $'				=> '',
		'Telf. destino'				=> '',
		'Dirección origen'			=> '',
		'Dirección destino'			=> ''
		];

		$date_arr = [];
		$date_obj = [
		'fecha'					=> '',
		'i'						=> ''
		];

		$meses = [
		'01'				=> 'Enero',
		'02'				=> 'Febrero',
		'03'				=> 'Marzo',
		'04'				=> 'Abril',
		'05'				=> 'Mayo',
		'06'				=> 'Junio',
		'07'				=> 'Julio',
		'08'				=> 'Agosto',
		'09'				=> 'Septiembre',
		'10'				=> 'Octubre',
		'11'				=> 'Noviembre',
		'12'				=> 'Diciembre'
		];

		$i = 0;
		$date_arr = [];
		foreach ($estimaciones as $est) {
			$aux = $obj;
			$aux['Fecha'] 					= date('d/m/Y', date_timestamp_get($est->created_at));
			$aux['Ingresó por'] 			= $est->client->ingreso_por;
			$aux['Código']					= $est->client->id;
			$aux['Fecha promedio']			= $est->fecha_estimada;
			$aux['Nombre']					= ucfirst($est->client->first_name);
			$aux['Apellido']				= ucfirst($est->client->last_name);
			$aux['Correo electrónico']		= $est->client->email;
			$aux['Telf. origen']			= $est->telf_origen;
			$aux['Comentario o solicitud']	= $est->comentario;
			$aux['Tipo de mudanza']			= $est->tipo_mudanza;
			if (isset($est->origen)) {
				$aux['País origen']			= ucfirst($est->origen->name);
			}
			$aux['Ciudad origen']			= $est->c_origen;
			if (isset($est->destino)) {
				$aux['País destino']		= ucfirst($est->destino->name);
			}
			$aux['País destino']			= $est->c_destino;
			$aux['Estado del servicio']		= $est->estado;
			if (isset($est->operativo)) {
				$aux['A cargo']	= ucfirst($est->operativo->first_name).' '.ucfirst($est->operativo->last_name);
			}
			$aux['Mtrs3']					= $est->mtrs3;
			$aux['Moneda']					= $est->moneda;
			$aux['Valor USD $']				= $est->valor_total;
			$aux['Telf. destino']			= $est->telf_destino;
			$aux['Dirección origen']		= $est->dir_origen;
			$aux['Dirección destino']		= $est->dir_destino;

			array_push($exl_arr, $aux);


			$m = date("m", date_timestamp_get($est->created_at));
			$y = date("Y", date_timestamp_get($est->created_at));

			if (!isset($date_arr[$y])) {
				$date_arr[$y] = [];
			}

			if (!isset($date_arr[$y][$m])) {
				$date_arr[$y][$m] = [];
			}

			array_push($date_arr[$y][$m], $i);

			$i++;
		}

		Excel::create('Actual cotizaciones y mudanzas '.date("d/m/Y", strtotime('now')), function ($excel) use ($exl_arr, $date_arr, $meses)
		{
			foreach ($date_arr as $y => $m_arr) {
				foreach ($m_arr as $m => $indices) {
					$excel->sheet($meses[$m]." $y", function($sheet) use ($exl_arr, $indices)
					{
						$aux = [];
						foreach ($indices as $key => $value) {
							array_push($aux, $exl_arr[$value]);
						}
						$sheet->fromArray($aux);
					});
				}
			}

		})->export('xlsx');
	}

	public function excelImport(Request $request)
	{
		$validator = $this->importValidator($request->all());

		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
				);
		}else{
			$file = Input::file('excel');
			$direccion = base_path().'/public/excel/';

			$file->move($direccion,  $file->getClientOriginalName());

			Excel::load($direccion.$file->getClientOriginalName(), function ($reader){

				$reader->each(function($sheet) {
					$sheet->each(function($row) {
						if ($row->direccion_electronica_cliente_correo != null) {

							$user = User::where('email', '=', $row->direccion_electronica_cliente_correo)->first();

							if ($user == null){
								$user = new User;
								$user->id 				= (int)$row->codigo;
								$user->email 			= $row->direccion_electronica_cliente_correo;
								$user->role_id 			= 5;
								$user->first_name		= $row->nombres;
								$user->last_name		= $row->apellido;
								$user->defaultPwd		= str_random(8);
								$user->password 		= bcrypt($user->defaultPwd);
								$user->activation_code	= str_random(60) . $row->direccion_electronica_cliente_correo;
								$user->active 			= 0;
								$user->save();

								$user->profile()->create(['phone'=>(int)$row->tel_origen]);
							}

							$est = new Estimacion;
							$est->cliente 				= $user->id;
							$est->fecha_estimada 		= $row->fecha_promedio;
							$est->tipo_mudanza 			= $this->getTipoId($row->tipo_de_mudanza);
							$est->telf_origen 			= (int)$row->tel_origen;
							$est->telf_destino 			= $row->n0_telef_destino;
							$est->p_origen 				= $this->getPaisId($row->pais_origen);
							$est->p_destino 			= $this->getPaisId($row->pais_destino);
							$est->c_origen 				= $row->ciudad_origen;
							$est->c_destino				= $row->ciudad_destino;
							$est->dir_destino			= $row->direcion_de_destino;
							$est->dir_origen			= $row->direcion_de_origen;
							$est->moneda				= $row->tipo_moneda;
							if ($est->p_destino == $est->p_origen) {
								$est->alcance = 1;
							} else {
								$est->alcance = 2;
							}
							$est->estado				= 0;
							$est->comentario			= $row->comentario_o_solicitud;
							$est->mtrs3 				= $row->mtrs3;
							$est->valor_total 			= $row->valor_usd;
							// $est->a_cargo				= 4; //ver como asignar el que ya esta en bd
							$est->created_at			= $row->fecha;
							$est->save();
						}
					});
				});
			});
			return redirect('app/estimaciones')->with('status', 'Archivo importado éxitosamente!');
		}
	}

	private function getPaisId($pais)
	{
		$paises = Pais::all();

		foreach ($paises as $p) {
			if (trim(strtolower($pais)) === strtolower($p->name)) {
				return $p->id;
			}
		}
		
		if ($pais != '' && $pais != null) {
			$p_new = new Pais;
			$p_new->name = strtolower($pais);
			$p_new->save();

			return $p_new->id;
		}

		return '';
	}

	private function getTipoId($mudanza)
	{
		switch (strtolower($mudanza)) {
			case null:
			return '';
			break;

			case 'familiar':
			return 1;
			break;

			case 'personal':
			return 2;
			break;

			case 'comercial':
			return 3;
			break;
			
			default:
			return 4;
			break;
		}
	}

	public function getExcelV()
	{
		return view('estimacion.import');
	}

	public function importValidator(array $data)
	{
		return Validator::make($data, [
			'excel'                 	=> 'required|mimes:xlsx,xls'
			], [
			'excel.required'        	=> 'Seleccione un archivo',
			'excel.mimes'			=> 'Debe seleccionar un archivo válido'
			]);
	}

	public function contactFromWebpage(Request $request)
	{
		$user = User::where("email", "=", $request->input('email'))->get();

		if (!$user) {
			$user = new User;
			$user->email 			= $request->input('email');
			$user->first_name 		= $request->input('nombre');
			$user->last_name 		= $request->input('apellido');
			$user->ingreso_por 		= 1;
			$pwd 					= str_random(8);
			$user->password 		= bcrypt($pwd);
			$user->defaultPwd		= $pwd;
			$user->activation_code	= str_random(60) . $request->input('email');
			$user->role_id 			= 5;
			$user->active 			= 0;
			$user->save();

			$user->profile()->create(['phone'=>$request->input('telefono')]);

			$est = new Estimacion;
			$est->cliente 			= $user->id;
			$est->save();
		} 


		$data = $request->input();

		\Mail::queue('emails.newContact', $data, function($message) {
			$message->subject("Nuevo contacto desde la página web");
			$message->from("contacto@intermudanzas.com");
			$message->to("info@intermudanzas.com");
		});

		return 1;
	}
}
