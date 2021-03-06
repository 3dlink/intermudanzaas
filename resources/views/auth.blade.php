<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes" name="viewport">
		<title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ Lang::get('titles.app') }}</title>

	    {{-- HTML5 Shim and Respond.js for IE8 support --}}

		{{-- FONTS AND ICONS --}}

		{!! HTML::style('https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,400,100,300,600,700', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
		{!! HTML::style(asset('https://fonts.googleapis.com/icon?family=Material+Icons'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

		@yield('template_linked_fonts')

		{{-- STYLESHEETS --}}
		{!! HTML::style('css/material.indigo-red.min.css', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
		{!! HTML::style(elixir('css/app.css'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

		@yield('template_linked_css')

		<style type="text/css">
			@yield('template_fastload_css')
		</style>

	</head>
	<body class="mdl-color--grey-100">

		@yield('content')

		{{-- SCRIPTS --}}
		{!! HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', array('type' => 'text/javascript')) !!}
		{!! HTML::script('//code.getmdl.io/1.1.3/material.min.js', array('type' => 'text/javascript')) !!}
		{!! HTML::script('//maps.googleapis.com/maps/api/js?key='.env("GOOGLEMAPS_API_KEY").'&libraries=places&dummy=.js', array('type' => 'text/javascript')) !!}

		{!! HTML::script(elixir('js/app.js'), array('type' => 'text/javascript')) !!}

		@yield('template_scripts')

	</body>
</html>