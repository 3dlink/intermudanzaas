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
	{!! HTML::style('css/rome.min.css', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
	{!! HTML::style('css/app.css', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
	{!! HTML::style('css/toastr.css', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
	{!! HTML::style('js/dropzone-4.3.0/dist/dropzone.css', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
	@yield('template_linked_css')

	<style type="text/css">
		@yield('template_fastload_css')
		dialog {
			top: 50%;
		}
		.mdl-textfield__label{
			color: rgba(0,0,0,.54);
		}
		.loader {
			border: 16px solid #f3f3f3;
			border-radius: 50%;
			border-top: 16px solid #3498db;
			width: 120px;
			height: 120px;
			-webkit-animation: spin 1s linear infinite;
			animation: spin 1s linear infinite;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -60px;
			margin-top: -60px;
		}

		@-webkit-keyframes spin {
			0% { -webkit-transform: rotate(0deg); }
			100% { -webkit-transform: rotate(360deg); }
		}

		@keyframes spin {
			0% { transform: rotate(0deg); }
			100% { transform: rotate(360deg); }
		}
	</style>

</head>
<body class="mdl-color--grey-100" >
	<div class="loader"></div>
	<div id="body" style="display: none;">
		<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

			@include('partials.form-status')

			<header class="demo-header mdl-layout__header mdl-color--primary mdl-color-text--white">
				<div class="mdl-layout__header-row">

					<span class="mdl-layout-title">

						@yield('header')

					</span>

					<div class="mdl-layout-spacer"></div>

					@include('partials.header-nav')

				</div>
			</header>

			@include('partials.drawer-nav')

			<main class="mdl-layout__content mdl-color--grey-100">

				<nav class="breadcrumb">
					<ul itemscope itemtype="http://schema.org/BreadcrumbList">
						@yield('breadcrumbs')
					</ul>
				</nav>

				<div class="mdl-grid margin-top-0 padding-top-0">

					@yield('content')

				</div>
			</main>
		</div>


		@yield('dialog_section')
	</div>

	{{-- SCRIPTS --}}
	{!! HTML::script('js/jquery.min.js', array('type' => 'text/javascript')) !!}
	{!! HTML::script('js/material.min.js', array('type' => 'text/javascript')) !!}
	<!-- {!! HTML::script('//maps.googleapis.com/maps/api/js?key='.env("GOOGLEMAPS_API_KEY").'&libraries=places&dummy=.js', array('type' => 'text/javascript')) !!} -->
	{!! HTML::script('js/dialog-polyfill.min.js', array('type' => 'text/javascript')) !!}
	{!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js', array('type' => 'text/javascript')) !!}
	{!! HTML::script('js/rome.standalone.min.js', array('type' => 'text/javascript')) !!}
	{!! HTML::script('/js/dropzone-4.3.0/dist/min/dropzone.min.js') !!}
	{!! HTML::script('/js/toastr.min.js') !!}
	{!! HTML::script(elixir('js/app.js'), array('type' => 'text/javascript')) !!}

	<script type="text/javascript">
		$("*").on('mdl-componentupgraded', () => {
			$('#body').css('display', 'block');
			$('.loader').css('display', 'none');
		});
	</script>
	@yield('template_scripts')

	@include('scripts.fetch')

</body>
</html>