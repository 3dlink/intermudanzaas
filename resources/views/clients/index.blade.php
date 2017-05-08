@extends('dashboard')

@section('template_title')
Clientes
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
}
@endsection

@section('header')
Viendo Todos los Clientes
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
	<a itemprop="item" href="/app/clientes" disabled>
		<span itemprop="name">
			Clientes
		</span>
	</a>
	<meta itemprop="position" content="2" />
</li>
@endsection

@section('content')

<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
	<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
		<h2 class="mdl-card__title-text logo-style">
			@if ($total_clients === 1)
			{{ $total_clients }} Cliente
			@elseif ($total_clients > 1)
			{{ $total_clients }} Clientes en Total
			@else
			Sin Clientes :(
			@endif
		</h2>
	</div>
	<div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0">
		<div class="table-responsive material-table">
			<table id="user_table" class="mdl-data-table mdl-js-data-table data-table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="mdl-data-table__cell--non-numeric">ID</th>
						<th class="mdl-data-table__cell--non-numeric">Nombre</th>
						<th class="mdl-data-table__cell--non-numeric">Apellido</th>
						<th class="mdl-data-table__cell--non-numeric">Correo Electrónico</th>
						<th class="mdl-data-table__cell--non-numeric">Teléfono</th>
						<th class="mdl-data-table__cell--non-numeric no-sort no-search">Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($clients as $a_client)
					<tr>
						<td class="mdl-data-table__cell--non-numeric">{{$a_client->documento_id}}</td>
						<td class="mdl-data-table__cell--non-numeric">{{$a_client->first_name}}</td>
						<td class="mdl-data-table__cell--non-numeric">{{$a_client->last_name}}</td>
						<td class="mdl-data-table__cell--non-numeric">{{$a_client->email}}</td>
						<td class="mdl-data-table__cell--non-numeric">{{$a_client->profile->phone}}</td>
						<td class="mdl-data-table__cell--non-numeric">
							

							{{-- VIEW USER PROFILE ICON BUTTON --}}
							<a href="{{ route('app.profile.show', $a_client->id) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="Ver perfil">
								<i class="material-icons">person_outline</i>
							</a>
							@if(!$user->hasRole('logistica'))
							{{-- EDIT USER ICON BUTTON --}}
							<a href="{{ URL::to('app/clientes/' . $a_client->id . '/edit') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="Editar">
								<i class="material-icons">edit</i>
							</a>
							@if(!$a_client->active)
							<a href="#" onclick="sendMail(this)" data-id="{{$a_client->id}}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="Activar"><i class="material-icons activate">check_box_outline_blank</i></a>
							@else
							<a href="#" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect active" title="Activada"><i class="material-icons activate">check_box</i></a>
							@endif

							{{-- DELETE ICON BUTTON AND FORM CALL --}}
							{!! Form::open(array('url' => 'app/clientes/' . $a_client->id, 'class' => 'inline-block', 'id' => 'delete_'.$a_client->id)) !!}
							{!! Form::hidden('_method', 'DELETE') !!}
							<a href="#" class="dialog-button dialog-trigger-delete dialog-trigger{{$a_client->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-userid="{{$a_client->id}}" title="Eliminar">
								<i class="material-icons">delete_forever</i>
							</a>
							{!! Form::close() !!}
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="mdl-card__menu" style="top: -5px;">
		@if(!$user->hasRole('logistica'))
		<a href="{{ url('app/clientes/create') }}" class="mdl-button mdl-button--icon mdl-inline-expanded mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color-text--white inline-block" title="Crear cliente">
			<i class="material-icons">person_add</i>
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
	@foreach ($clients as $a_client)
	mdl_dialog('.dialog-trigger{{$a_client->id}}','','#dialog_delete');
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

	function sendMail(that) {
		let id = that.dataset.id;

		$.ajax({
			url: '{{url("app/clientes/activate")}}/'+id, 
			method: 'POST',
			data: '_token={{csrf_token()}}',
			success: (res) => {
				console.log(res);
				that.getElementsByTagName('i')[0].innerHTML='check_box';
			}
		});
	}

	$('.activate').click((event) => {
		event.preventDefault();
	});
	$('.active').click((event) => {
		event.preventDefault();
	});
</script>

@endsection

@section('dialog_section')
@include('dialogs.dialog-delete')
<div class="backdrop" style="z-index: -100001;"></div>
@endsection