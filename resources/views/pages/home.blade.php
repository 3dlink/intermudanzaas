@extends('dashboard')

@section('template_title')
{{ Lang::get('titles.home') }}
@endsection

@section('template_fastload_css')
.card-image.mdl-card {
width: 100%;
height: 50%;
background: center / cover;
}
.card-image > .mdl-card__actions {
height: 52px;
padding: 16px;
background: rgba(0, 0, 0, 0.6);
}
.card-span {
color: #fff;
font-size: 14px;
font-weight: 500;
letter-spacing: 1px;
}
.card-link{
color: transparent;
}
@endsection

@section('header')

{{ Lang::get('auth.loggedIn', ['name' => Auth::user()->first_name.' '.Auth::user()->last_name]) }}

@endsection

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
<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	<a itemprop="item" href="#" disabled>
		<span itemprop="name">
			Inicio
		</span>
	</a>
	<meta itemprop="position" content="2" />
</li>

@endsection

@section('content')

<div class="mdl-grid full-grid margin-top-0-important padding-top-0-important">
	@if(!Auth::guest() && (Auth::user()->hasRole('logistica') || Auth::user()->hasRole('ventas') || Auth::user()->hasRole('administrador') || Auth::user()->hasRole('coordinacion')))
	<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
		<a href="{{url('app/clientes')}}" class="card-link">
			<div class="mdl-card card-image mdl-shadow--6dp" style='background-image: url("images/clientes-card.jpeg")'>
				<div class="mdl-card__title mdl-card--expand"></div>
				<div class="mdl-card__actions">
					<span class="card-span">CLIENTES</span>
				</div>
			</div>
		</a>
	</div>
	@endif
	@if(!Auth::guest())
	<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
		<a href="{{url('app/estimaciones')}}" class="card-link">
			<div class="mdl-card card-image mdl-shadow--6dp" style='background-image: url("images/estimaciones-card.jpeg")'>
				<div class="mdl-card__title mdl-card--expand"></div>
				<div class="mdl-card__actions">
					<span class="card-span">ESTIMACIONES</span>
				</div>
			</div>
		</a>
	</div>
	@endif
	@if (!Auth::guest() && (Auth::user()->hasRole('coordinacion') || Auth::user()->hasRole('administrador')))
	<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
		<a href="{{url('app/rooms')}}" class="card-link">
			<div class="mdl-card card-image mdl-shadow--6dp" style='background-image: url("images/cuartos-card.jpg")'>
				<div class="mdl-card__title mdl-card--expand"></div>
				<div class="mdl-card__actions">
					<span class="card-span">CUARTOS</span>
				</div>
			</div>
		</a>
	</div>
	<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
		<a href="{{url('app/objects')}}" class="card-link">
			<div class="mdl-card card-image mdl-shadow--6dp" style='background-image: url("images/objetos-card.jpeg")'>
				<div class="mdl-card__title mdl-card--expand"></div>
				<div class="mdl-card__actions">
					<span class="card-span">OBJETOS</span>
				</div>
			</div>
		</a>
	</div>
	<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
		<a href="{{url('app/boxes')}}" class="card-link">
			<div class="mdl-card card-image mdl-shadow--6dp" style='background-image: url("images/cajas-card.jpg")'>
				<div class="mdl-card__title mdl-card--expand"></div>
				<div class="mdl-card__actions">
					<span class="card-span">CAJAS</span>
				</div>
			</div>
		</a>
	</div>
	@endif
	@if (!Auth::guest() && Auth::user()->hasRole('administrador'))
	<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
		<a href="{{url('app/paises')}}" class="card-link">
			<div class="mdl-card card-image mdl-shadow--6dp" style='background-image: url("images/paises-card.jpeg")'>
				<div class="mdl-card__title mdl-card--expand"></div>
				<div class="mdl-card__actions">
					<span class="card-span">PAISES</span>
				</div>
			</div>
		</a>
	</div>
	@endif
	@if (!Auth::guest() && Auth::user()->hasRole('administrador'))
	<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
		<a href="{{url('app/users')}}" class="card-link">
			<div class="mdl-card card-image mdl-shadow--6dp" style='background-image: url("images/usuarios-card.jpeg")'>
				<div class="mdl-card__title mdl-card--expand"></div>
				<div class="mdl-card__actions">
					<span class="card-span">USUARIOS</span>
				</div>
			</div>
		</a>
	</div>
	@endif

</div>

@endsection

@section('template_scripts')
@endsection