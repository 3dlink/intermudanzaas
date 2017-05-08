<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (\Auth::user()->hasRole('cliente') && \Auth::user()->defaultPwd != '') {
			return view('admin.changepwd')->with('status', 'Debe modificar su contraseña');
		}else{
			if (\Auth::user()->hasRole('cliente')) {
				return redirect('app/estimaciones');
			} else {
				return view('pages.home');
			}
			
		}
	}

	public function getHome()
	{
		return view('pages.home');
	}

}
