@extends('dashboard')

@section('template_title')
Editando {{ ucfirst($object->name) }}
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
Editando {{ ucfirst($object->name) }}
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
<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
<a itemprop="item" href="{{ url('/app/objects') }}">
		<span itemprop="name">
			Objetos
		</span>
	</a>
	<i class="material-icons">chevron_right</i>
	<meta itemprop="position" content="2" />
</li>

<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
<a itemprop="item" href="/app/objects/{{ $object->id }}/edit">
		<span itemprop="name">
			Editando
		</span>
	</a>
	<meta itemprop="position" content="4" />
</li>

@endsection

@section('content')

<div class="mdl-grid full-grid margin-top-0 padding-0">
	<div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
		<div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
		<h2 class="mdl-card__title-text">Editando {{ ucfirst($object->name) }}</h2>
		</div>
		{!! Form::model($object, array('action' => array('ObjectsController@update', $object->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}

		<div class="mdl-card card-wide" style="width:100%;" itemscope>
			<div class="mdl-card__supporting-text">
				<div class="mdl-grid full-grid padding-0">
					<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

						<div class="mdl-grid ">

							<div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? 'is-invalid' :'' }}">
									{!! Form::text('name', $object->name, array('id' => 'name', 'class' => 'mdl-textfield__input', 'pattern' => '[\w,á,é,í,ó,ú, ]*')) !!}
									{!! Form::label('name', 'Nombre', array('class' => 'mdl-textfield__label')); !!}
									<span class="mdl-textfield__error">Solo letras y números</span>
								</div>
							</div>

							<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('unit') ? 'is-invalid' :'' }}">
									{!! Form::select('unit', ['' => '', 'plg' => 'Pulgadas', 'pzas' => 'Piezas', 'm' => 'Metros', 'm2' => 'Metros cuadrados', 'm3' => 'Metros cúbicos'], $object->unit, array('class' => 'mdl-selectfield__select mdl-textfield__input', 'id' => 'unit')) !!}
									<label for="unit">
										<i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
									</label>
									{!! Form::label('unit', 'Unidad', array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
									<span class="mdl-textfield__error"></span>
								</div>
							</div>

							<div class="mdl-cell mdl-cell--3-col-tablet mdl-cell--3-col-desktop">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('vmin') ? 'is-invalid' :'' }}">
									{!! Form::text('vmin', $object->vmin, array('id' => 'vmin', 'class' => 'mdl-textfield__input', 'pattern' => '\d+')) !!}
									{!! Form::label('vmin', 'Valor mínimo', array('class' => 'mdl-textfield__label')); !!}
									<span class="mdl-textfield__error">Solo números</span>
								</div>
							</div>

							<div class="mdl-cell mdl-cell--3-col-tablet mdl-cell--3-col-desktop">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('vmax') ? 'is-invalid' :'' }}">
									{!! Form::text('vmax', $object->vmax, array('id' => 'vmax', 'class' => 'mdl-textfield__input', 'pattern' => '\d+')) !!}
									{!! Form::label('vmax', 'Valor máximo', array('class' => 'mdl-textfield__label')); !!}
									<span class="mdl-textfield__error">Solo números</span>
								</div>
							</div>

							<div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('factor') ? 'is-invalid' :'' }}">
									{!! Form::text('factor', $object->factor, array('id' => 'factor', 'class' => 'mdl-textfield__input', 'pattern' => '\d+(\.\d+)?')) !!}
									{!! Form::label('factor', 'Factor', array('class' => 'mdl-textfield__label')); !!}
									<span class="mdl-textfield__error">Solo números de máximo 5 dígitos con decimales separados por un punto (.) </span>
								</div>
							</div>

							<div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('tooltip') ? 'is-invalid' :'' }}">
									{!! Form::text('tooltip', $object->tooltip, array('id' => 'tooltip', 'class' => 'mdl-textfield__input')) !!}
									{!! Form::label('tooltip', 'Texto de ayuda', array('class' => 'mdl-textfield__label')); !!}
									<span class="mdl-textfield__error">Solo letras</span>
								</div>
							</div>

							<div class="mdl-cell mdl-cell--12-col">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('description') ? 'is-invalid' :'' }}">
									{!! Form::textarea('description',  $object->description, array('id' => 'description', 'class' => 'mdl-textfield__input')) !!}
									{!! Form::label('description', 'Descripción', array('class' => 'mdl-textfield__label')); !!}
								</div>
							</div>

							<div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('rooms') ? 'is-invalid' :'' }}">
									{!! Form::text('rooms', '', array('id' => 'rooms', 'class' => 'mdl-textfield__input', 'hidden')) !!}
									{!! Form::label('rooms', 'Cuartos', array('class' => 'mdl-textfield__label')); !!}
								</div>
								<div class="mdl-grid">
									@foreach($rooms as $a_room)
									<div class="mdl-cell mdl-cell--6-col-phone mdl-cell--3-col-tablet mdl-cell--3-col-desktop">
										<?php 
											$isIn = 'is-checked';
											$checked = 'checked';
											$true = false;
											foreach ($object->rooms as $c_room) {
												if ($c_room->id == $a_room->id) { 
													$true = true;
												}
											}
										?>
										<label class="mdl-checkbox mdl-js-checkbox @if($true){{$isIn}}@endif" for="{{$a_room->id}}">
											<input type="checkbox" id="{{$a_room->id}}" class="mdl-checkbox__input" @if($true){{$checked}}@endif>
											<span class="mdl-checkbox__label">{{ucfirst($a_room->name)}}</span>
										</label>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="mdl-card__actions padding-top-0">
				<div class="mdl-grid padding-top-0">
					<div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0 margin-left-1-1">

						{{-- SAVE BUTTON--}}
						<span class="save-actions">
							{!! Form::button('<i class="material-icons">save</i> <span class="hide-mobile">Guardar</span> <span class="hide-tablet">Cambios</span>', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--green mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')) !!}
						</span>
					</div>
				</div>
			</div>

			<div class="mdl-card__menu mdl-color-text--white">
				{{-- SAVE ICON --}}
				<span class="save-actions">
					{!! Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'Guardar Cambios')) !!}
				</span>
			</div>

		</div>



		{!! Form::close() !!}

	</div>
</div>

@endsection

@section('template_scripts')

@include('scripts.mdl-required-input-fix')
@include('scripts.mdl-select')

<script type="text/javascript">

	mdl_dialog('.dialog-button-save');

	var dialog = document.querySelector('#dialog');
	dialogPolyfill.registerDialog(dialog);

	$('.dialog-close').click(function(){
		$('.backdrop').css("z-index", -100001);
	});

	$('.dialog-button-icon-save').click(function(){
		$('.backdrop').css("z-index", 100001);
	});

	$('#submit').click(function(event) {
		let errors = $('.is-invalid');
		
		if (!errors.length>0) {
			let rooms = $('.is-checked');
			let roomInput = $('#rooms');
			for (let i = 0; i < rooms.length; i++) {
				let val = $(rooms[i]).attr('for');
				let rVal = roomInput.val();
				roomInput.val(rVal+' '+String(val));
			}
			$('form').submit();
		} else {
			event.preventDefault();
		}
	});

</script>

@endsection

@section('dialog_section')
@include('dialogs.dialog-save')
<div class="backdrop" style="z-index: -100001;"></div>
@endsection