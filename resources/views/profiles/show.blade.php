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

@if ($user->role->id == 5 )
	@php
	$access_level   = 'Cliente';
	$access_class 	= 'mdl-color--green-200 mdl-color-text--white';
	$access_icon	= 'lock';
	@endphp
	@elseif ($user->role->id == 2 )
	@php
	$access_level   = 'Logística';
	$access_class 	= 'mdl-color--green-400 mdl-color-text--white';
	$access_icon	= 'lock_outline';
	@endphp
	@elseif ($user->role->id == 1 )
	@php
	$access_level   = 'Administrador';
	$access_class 	= 'mdl-color--green-600 mdl-color-text--white';
	$access_icon	= 'verified_user';
	@endphp
	@elseif ($user->role->id == 3 )
	@php
	$access_level   = 'Ventas';
	$access_class 	= 'mdl-color--green-400 mdl-color-text--white';
	$access_icon	= 'verified_user';
	@endphp
	@elseif ($user->role->id == 4 )
	@php
	$access_level   = 'Coordinación';
	$access_class 	= 'mdl-color--green-400 mdl-color-text--white';
	$access_icon	= 'verified_user';
	@endphp
@endif

@section('breadcrumbs')

<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	<a itemprop="item" href="{{url('/app/')}}">
		<span itemprop="name">
			{{ Lang::get('titles.app') }}
		</span>
	</a>
	<i class="material-icons">chevron_right</i>
	<meta itemprop="position" content="1" />
</li>
@if(\Auth::user()->hasRole('administrador'))
<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	<a itemprop="item" href="{{ url('/app/users') }}">
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


@endsection