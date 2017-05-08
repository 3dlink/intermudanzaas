@extends('dashboard')

@section('template_title')
	Países
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
	Viendo Todos los Países
@endsection

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
	<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="/app/paises" disabled>
			<span itemprop="name">
				Países
			</span>
		</a>
		<meta itemprop="position" content="2" />
	</li>
@endsection

@section('content')

<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
	<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
		<h2 class="mdl-card__title-text logo-style">
			@if ($total_paises === 1)
			    {{ $total_paises }} País
			@elseif ($total_paises > 1)
			    {{ $total_paises }} Países en Total
			@else
			    Sin Países :(
			@endif
		</h2>
	</div>
	<div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0">
		<div class="table-responsive material-table">
			<table id="user_table" class="mdl-data-table mdl-js-data-table data-table" cellspacing="0" width="100%">
			  <thead>
			    <tr>
					<th class="mdl-data-table__cell--non-numeric">Nombre</th>
					<th class="mdl-data-table__cell--non-numeric no-sort no-search">Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			        @foreach ($paises as $a_p)
						<tr>
							<td class="mdl-data-table__cell--non-numeric">{{ucfirst($a_p->name)}}</td>
							<td class="mdl-data-table__cell--non-numeric">
								{{-- EDIT USER ICON BUTTON --}}
								<a href="{{ URL::to('app/paises/' . $a_p->id . '/edit') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="Editar">
									<i class="material-icons">edit</i>
								</a>
								{{-- DELETE ICON BUTTON AND FORM CALL --}}
								{!! Form::open(array('url' => 'app/paises/' . $a_p->id, 'class' => 'inline-block', 'id' => 'delete_'.$a_p->id)) !!}
									{!! Form::hidden('_method', 'DELETE') !!}
									<a href="#" class="dialog-button dialog-trigger-delete dialog-trigger{{$a_p->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-userid="{{$a_p->id}}" title="Eliminar">
										<i class="material-icons">delete_forever</i>
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
		<a href="{{ url('/app/paises/create') }}" class="mdl-button mdl-button--icon mdl-inline-expanded mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color-text--white inline-block" title="Crear País">
			<i class="material-icons">add</i>
		</a>
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
		@foreach ($paises as $a_p)
			mdl_dialog('.dialog-trigger{{$a_p->id}}','','#dialog_delete');
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
	</script>

@endsection

@section('dialog_section')
	@include('dialogs.dialog-delete')
	<div class="backdrop" style="z-index: -100001;"></div>
@endsection