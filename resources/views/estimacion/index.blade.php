@extends('dashboard')

@section('template_title')
Estimaciones
@endsection

@section('template_linked_css')
{!! HTML::style(asset('https://cdn.datatables.net/1.10.12/css/dataTables.material.min.css'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
@endsection

@section('template_fastload_css')
dialog + .backdrop {
position: fixed;
top: 0;
right: 0;
bottom: 0;
left: 0;
background: rgba(0,0,0,0.8);
-webkit-background: rgba(0,0,0,0.8);
}
@endsection

@section('header')
Viendo Todas las Estimaciones
@endsection

@section('breadcrumbs')
<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	<a itemprop="item" href="{{url('/app')}}">
		<span itemprop="name">
			{{ Lang::get('titles.app') }}
		</span>
	</a>
	<i class="material-icons">chevron_right</i>
	<meta itemprop="position" content="1" />
</li>
<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	<a itemprop="item" href="app/estimaciones" disabled>
		<span itemprop="name">
			Estimaciones
		</span>
	</a>
	<meta itemprop="position" content="2" />
</li>
@endsection

@section('content')

<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
	<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
		<h2 class="mdl-card__title-text logo-style">
			@if ($total_estimaciones === 1)
			{{ $total_estimaciones }} Estimación
			@elseif ($total_estimaciones > 1)
			{{ $total_estimaciones }} Estimaciones en Total
			@else
			Sin Estimaciones :(
			@endif
		</h2>
	</div>
	<div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0">
		<div class="table-responsive material-table">
			<table id="user_table" class="mdl-data-table mdl-js-data-table data-table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="mdl-data-table__cell--non-numeric">Fecha</th>
						<th class="mdl-data-table__cell--non-numeric">Código</th>
						<th class="mdl-data-table__cell--non-numeric">Nombre</th>
						<th class="mdl-data-table__cell--non-numeric">Apellido</th>
						<th class="mdl-data-table__cell--non-numeric">Teléfono de origen</th>
						<th class="mdl-data-table__cell--non-numeric">País de origen</th>
						<th class="mdl-data-table__cell--non-numeric">País de destino</th>
						<th class="mdl-data-table__cell--non-numeric">Estado del servicio</th>
						<th class="mdl-data-table__cell--non-numeric">A cargo</th>
						<th class="mdl-data-table__cell--non-numeric no-sort no-search">Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($estimaciones as $a_est)
					<tr id="tr_{{$a_est->id}}" @if($a_est->cambio) style="background-color:#3b57f7; color:white;" @endif>
						<td class="mdl-data-table__cell--non-numeric">{{date('d/m/Y', strtotime($a_est->created_at))}}</td>
						<td>{{$a_est->id}}</td>
						<td class="mdl-data-table__cell--non-numeric">{{ucfirst($a_est->client->first_name)}}</td>
						<td class="mdl-data-table__cell--non-numeric">{{ucfirst($a_est->client->last_name)}}</td>
						<td class="mdl-data-table__cell--non-numeric">{{$a_est->telf_origen}}</td>
						<td class="mdl-data-table__cell--non-numeric">@if($a_est->origen){{ucfirst($a_est->origen->name)}}@endif</td>
						<td class="mdl-data-table__cell--non-numeric">@if($a_est->destino){{ucfirst($a_est->destino->name)}}@endif</td>
						<td class="mdl-data-table__cell--non-numeric">
							<span class="badge" style="background-color: {{$a_est->state->bg_color}}; color: {{$a_est->state->lt_color}}">{{$a_est->state->name}}</span></td>
							<td class="mdl-data-table__cell--non-numeric">
								@if($a_est->operativo != null)
								{{ucfirst($a_est->operativo->first_name).' '.ucfirst($a_est->operativo->last_name)}}
								@endif
							</td>
							<td class="mdl-data-table__cell--non-numeric">
								@if(Auth::user()->hasRole('administrador') || Auth::user()->hasRole('ventas') || Auth::user()->hasRole('coordinacion'))
								{{-- UPLOAD FILE ICON BUTTON --}}
								<a href="{{ URL::to('app/estimaciones/upload/' . $a_est->id) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="Subir Cotización"><i class="material-icons i_{{$a_est->id}}" @if($a_est->cambio)style="color:white;" @endif>file_upload</i></a>
								@endif
								@if(!Auth::user()->hasRole('logistica'))
								@if($a_est->archivo)
								<a href="{{ URL::to('app/estimaciones/download/' . $a_est->id) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color-text--white inline-block" title="Descargar Cotización">
									<i class="material-icons i_{{$a_est->id}}">file_download</i>
								</a>
								@endif
								@endif
								@if(Auth::user()->hasRole('administrador') || Auth::user()->hasRole('ventas'))
								{{-- RETURN STATE ICON BUTTON --}}
								<a id="state_{{$a_est->id}}" href="{{ route('estimaciones.estado', $a_est->id) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="Cambiar estado manualmente"><i class="material-icons i_{{$a_est->id}}" @if($a_est->cambio) style="color:white;" @endif>loop</i></a>
								@endif
								@if(Auth::user()->hasRole('coordinacion'))
								{{-- ASSIGN VENTAS/LOGISTICA ICON BUTTONS --}}
								<a id="ventas_{{$a_est->id}}" href="{{ route('app.estimaciones.operativo', $a_est->id) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="Asignar Personal de ventas"><i class="material-icons i_{{$a_est->id}}" @if($a_est->cambio) style="color:white;" @endif>assignment</i></a>
								<a id="log_{{$a_est->id}}" href="{{ route('app.estimaciones.logistica', $a_est->id) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="Asignar Personal de logistica"><i class="material-icons i_{{$a_est->id}}" @if($a_est->cambio) style="color:white;" @endif>local_shipping</i></a>
								@endif
								{{-- SHOW ICON BUTTON --}}
								<a id="show_{{$a_est->id}}" href="{{ route('app.estimaciones.show', $a_est->id) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="Ver detalle"><i class="material-icons i_{{$a_est->id}}" @if($a_est->cambio) style="color:white;" @endif>visibility</i></a>
								{{-- EDIT ICON BUTTON --}}
								@if($a_est->estado < 3 && (\Auth::user()->hasRole('cliente') || \Auth::user()->hasRole('ventas') || \Auth::user()->hasRole('administrador')))
								<a href="{{ URL::to('app/estimaciones/' . $a_est->id . '/edit') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="Editar"><i class="material-icons i_{{$a_est->id}}" @if($a_est->cambio)style="color:white;" @endif>edit</i></a>
								@endif
								@if($a_est->estado == 4 && \Auth::user()->hasRole('cliente'))
								<a href="#" id="accept_{{$a_est->id}}" onclick="aprobarCotizacion(this)" data-id="{{$a_est->id}}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="Aprobar"><i class="material-icons i_{{$a_est->id}} activate" @if($a_est->cambio) style="color:white;" @endif>check</i></a>
								<a href="#" id="reject_{{$a_est->id}}" onclick="rechazarCotizacion(this)" data-id="{{$a_est->id}}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="Rechazar"><i class="material-icons i_{{$a_est->id}} activate" @if($a_est->cambio) style="color:white;" @endif>close</i></a>
								@endif
								{{-- DELETE ICON BUTTON AND FORM CALL --}}
								{!! Form::open(array('url' => 'app/estimaciones/' . $a_est->id, 'class' => 'inline-block', 'id' => 'delete_'.$a_est->id)) !!}
								{!! Form::hidden('_method', 'DELETE') !!}
								<a href="#" class="dialog-button dialog-trigger-delete dialog-trigger{{$a_est->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-userid="{{$a_est->id}}" title="Eliminar"@if($a_est->estado == 3 || \Auth::user()->hasRole('coordinacion') || \Auth::user()->hasRole('logistica')) style="display:none;" @endif>
									<i class="material-icons i_{{$a_est->id}}" @if($a_est->cambio) style="color:white;" @endif>delete_forever</i>
								</a>
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="mdl-card__menu" style="top: -5px;">
			@if(!\Auth::user()->hasRole('cliente'))
			<a href="{{ url('app/import') }}" class="mdl-button mdl-button--icon mdl-inline-expanded mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color-text--white inline-block" title="Importar Excel">
				<i class="material-icons">file_upload</i>
			</a>
			<a href="{{ url('app/excelE') }}" class="mdl-button mdl-button--icon mdl-inline-expanded mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color-text--white inline-block" title="Exportar Excel">
				<i class="material-icons">file_download</i>
			</a>
			@endif

			@if(\Auth::user()->hasRole('cliente') || \Auth::user()->hasRole('administrador'))
			<a href="{{ url('app/estimaciones/create') }}" class="mdl-button mdl-button--icon mdl-inline-expanded mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color-text--white inline-block" title="Crear Estimación">
				<i class="material-icons">add</i>
			</a>
			@endif
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable search-white"  style="vertical-align: middle;padding: 17px 0;">
				<label class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-button--icon" for="search_table">
					<i class="material-icons">search</i>
				</label>
				<div class="mdl-textfield__expandable-holder">
					<input class="mdl-textfield__input" type="search" id="search_table" placeholder="Buscar">
					<label class="mdl-textfield__label" for="search_table">
						Buscar
					</label>
				</div>
			</div>
		</div>
	</div>

	@endsection

	@section('template_scripts')

	@include('scripts.mdl-datatables')

	<script type="text/javascript">
		@foreach ($estimaciones as $a_est)
		mdl_dialog('.dialog-trigger{{$a_est->id}}','','#dialog_delete');
		@endforeach

		var dialog = document.querySelector('#dialog_delete');
		dialogPolyfill.registerDialog(dialog);

		$('.dialog-close').click(function(){
			$('.backdrop').css("z-index", -100001);
		});

		var userid;
		$('.dialog-trigger-delete').click(function(event) {
			event.preventDefault();
			$('.backdrop').css("z-index", 100001);
			userid = $(this).attr('data-userid');
		});
		$('#confirm').click(function(event) {
			$('form#delete_'+userid).submit();
		});

		function aprobarCotizacion(that) {
			let id = that.dataset.id;

			$.ajax({
			url: '{{url("app/estimaciones/aceptar")}}/'+id, //APROBAR COTIZACION
			method: 'POST',
			data: '_token={{csrf_token()}}',
			success: (res) => {
				$(that).remove();
				$("#reject_"+res.id).remove();

				let tr = $("#tr_"+res.id);
				tr.css({
					"background-color"	: res.styles['background-color'],
					"color"				: res.styles['color']
				});
				$(tr.find("td")[7]).text(res.name);
				$(".i_"+res.id).css("color"	, res.styles['color']);
			}
		});
		};
		function rechazarCotizacion(that) {
			let id = that.dataset.id;

			$.ajax({
			url: '{{url("app/estimaciones/rechazar")}}/'+id, //RECHAZAR COTIZACION
			method: 'POST',
			data: '_token={{csrf_token()}}',
			success: (res) => {
				$(that).remove();
				$("#accept_"+res.id).remove();

				let edit_btn = '<a href="';
				edit_btn += '{{ URL::to("app/estimaciones")."/"}}';
				edit_btn += res.id;
				edit_btn += "/edit";
				edit_btn += '" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="Editar"><i class="material-icons i_';
				edit_btn += res.id;
				edit_btn += '">edit</i></a>';

				$("#show_"+res.id).after(edit_btn);
				let tr = $("#tr_"+res.id);
				tr.css({
					"background-color"	: res.styles['background-color'],
					"color"				: res.styles['color']
				});
				$(tr.find("td")[7]).text(res.name);
				$(".i_"+res.id).css("color"	, res.styles['color']);
			}
		});
		};
	</script>

	@endsection

	@section('dialog_section')
	@include('dialogs.dialog-delete')
	<div class="backdrop" style="z-index: -100001;"></div>
	@endsection