@extends('dashboard')

@section('template_title')
	Perfil de {{$user->first_name.' '.$user->last_name}}
@endsection

@section('template_fastload_css')
@endsection

@section('header')
	<small>
		{{ Lang::get('profile.showProfileTitle',['username' => $user->first_name.' '.$user->last_name]) }}
	</small>
@endsection

@if ($user->hasRole('cliente'))
	@php
        $access_level   = 'Cliente';
        $access_class 	= 'mdl-color--green-200 mdl-color-text--white';
        $access_icon	= 'lock';
	@endphp
@elseif ($user->hasRole('operativo'))
	@php
        $access_level   = 'Personal Operativo';
        $access_class 	= 'mdl-color--green-400 mdl-color-text--white';
        $access_icon	= 'lock_outline';
	@endphp
@elseif ($user->hasRole('administrador'))
	@php
        $access_level   = 'Administrador';
        $access_class 	= 'mdl-color--green-600 mdl-color-text--white';
        $access_icon	= 'verified_user';
	@endphp
@endif

@section('breadcrumbs')

	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="{{url('/')}}">
			<span itemprop="name">
				{{ Lang::get('titles.app') }}
			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="1" />
	</li>
	@if(\Auth::user()->hasRole('administrador'))
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="{{ url('/users') }}">
			<span itemprop="name">
				Usuarios
			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="2" />
	</li>
	@endif
	<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="#" disabled>
			<span itemprop="name">
				Perfil
			</span>
		</a>
		<meta itemprop="position" content="2" />
	</li>

@endsection

@section('content')

	@include('cards.user-profile-card')

@endsection

@section('template_scripts')

	<!-- @include('scripts.google-maps-geocode-and-map') -->

@endsection