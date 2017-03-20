@extends('dashboard')

@section('template_title')
	{{ Lang::get('titles.home') }}
@endsection

@section('template_fastload_css')


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

	<div class="mdl-grid margin-top-0-important padding-top-0-important">

	</div>

@endsection

@section('template_scripts')
@endsection