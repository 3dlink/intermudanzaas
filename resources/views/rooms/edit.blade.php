@extends('dashboard')

@section('template_title')
	Editando {{ ucfirst($room->name) }}
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
	Editando {{ ucfirst($room->name) }}
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
		<a itemprop="item" href="{{ url('/app/rooms') }}">
			<span itemprop="name">
				Cuartos
			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="2" />
	</li>

	<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="/app/rooms/{{ $room->id }}/edit">
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
				<h2 class="mdl-card__title-text">Editando {{ ucfirst($room->name) }}</h2>
			</div>
			{!! Form::model($room, array('action' => array('RoomsController@update', $room->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}

				<div class="mdl-card card-wide" style="width:100%;" itemscope>
					<div class="mdl-card__supporting-text">
						<div class="mdl-grid full-grid padding-0">
							<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

							<div class="mdl-grid ">

								<div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
							        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? 'is-invalid' :'' }}">
							            {!! Form::text('name', $room->name, array('id' => 'name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z, ]*')) !!}
							            {!! Form::label('name', 'Nombre', array('class' => 'mdl-textfield__label')); !!}
							            <span class="mdl-textfield__error">Solo letras</span>
							        </div>
							  	</div>

								<div class="mdl-cell mdl-cell--12-col">
								    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('description') ? 'is-invalid' :'' }}">
								        {!! Form::textarea('description',  $room->description, array('id' => 'description', 'class' => 'mdl-textfield__input')) !!}
								        {!! Form::label('description', 'Descripción', array('class' => 'mdl-textfield__label')); !!}
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

				    <div class="mdl-card__menu">

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
		mdl_dialog('.dialog-button-icon-save');

		var dialog = document.querySelector('#dialog');
		dialogPolyfill.registerDialog(dialog);

		$('.dialog-close').click(function(){
			$('.backdrop').css("z-index", -100001);
		});

		$('.dialog-button-icon-save').click(function(){
			$('.backdrop').css("z-index", 100001);
		});

		$('#submit').click(function(event) {
			$('form').submit();
		});

	</script>

@endsection

@section('dialog_section')
	@include('dialogs.dialog-save')
	<div class="backdrop" style="z-index: -100001;"></div>
@endsection