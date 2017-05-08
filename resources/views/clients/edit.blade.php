@extends('dashboard')

@section('template_title')
Editando {{$client->first_name.' '.$client->last_name}}
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
.file_upload_container{
position: relative;
width: 100%;
left: 0;
}
#file_upload_text_div{
float: left;
}
@endsection

@section('header')
Editando {{$client->first_name.' '.$client->last_name}}
@endsection

@section('content')

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
<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	<a itemprop="item" href="{{ url('app/clientes') }}">
		<span itemprop="name">
			Clientes
		</span>
	</a>
	<i class="material-icons">chevron_right</i>
	<meta itemprop="position" content="2" />
</li>
<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	<a itemprop="item" href="app/clientes/edit">
		<span itemprop="name">
			Editando
		</span>
	</a>
	<meta itemprop="position" content="3" />
</li>
@endsection

<div class="mdl-grid full-grid margin-top-0 padding-0">
	<div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
		<div class="mdl-card card-new-user" style="width:100%;" itemscope itemtype="http://schema.org/Person">

			<div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
				<h2 class="mdl-card__title-text">Editando {{$client->first_name.' '.$client->last_name}}</h2>
			</div>

			{!! Form::model($client,array('action' => ['ClientsController@update', $client->id], 'method' => 'PUT', 'role' => 'form')) !!}

			<div class="mdl-card__supporting-text">
				<div class="mdl-grid full-grid padding-0">
					<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

						<div class="mdl-grid ">

							<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('documento_id') ? 'is-invalid' :'' }}">
									{!! Form::text('documento_id', NULL, array('id' => 'documento_id', 'class' => 'mdl-textfield__input')) !!}
									{!! Form::label('documento_id', 'Documento de identidad', array('class' => 'mdl-textfield__label')); !!}
									<span class="mdl-textfield__error"></span>
								</div>
							</div>

							<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
									{!! Form::email('email', NULL, array('id' => 'email', 'class' => 'mdl-textfield__input', 'disabled')) !!}
									{!! Form::label('email', Lang::get('auth.email') , array('class' => 'mdl-textfield__label')); !!}
									<span class="mdl-textfield__error"></span>
								</div>
							</div>
							<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('first_name') ? 'is-invalid' :'' }}">
									{!! Form::text('first_name', NULL, array('id' => 'first_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z,á,é,í,ó,ú,]*')) !!}
									{!! Form::label('first_name', 'Nombre', array('class' => 'mdl-textfield__label')); !!}
									<span class="mdl-textfield__error">Solo letras</span>
								</div>
							</div>
							<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('last_name') ? 'is-invalid' :'' }}">
									{!! Form::text('last_name', NULL, array('id' => 'last_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z,á,é,í,ó,ú,]*')) !!}
									{!! Form::label('last_name', 'Apellido', array('class' => 'mdl-textfield__label')); !!}
									<span class="mdl-textfield__error">Solo letras</span>
								</div>
							</div>
							<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('phone') ? 'is-invalid' :'' }}">
									{!! Form::text('phone', $client->profile->phone, array('id' => 'phone', 'class' => 'mdl-textfield__input')) !!}
									{!! Form::label('phone', 'Número telefónico', array('class' => 'mdl-textfield__label')); !!}
								</div>
							</div>

							<div class="mdl-cell mdl-cell--3-col-tablet mdl-cell--3-col-desktop">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('ingreso_por') ? 'is-invalid' :'' }}">
									{!! Form::select('ingreso_por', ['' => '', '1' => 'Website', '2' => 'Referido', '3' => 'Llamada telefónica', '4' => 'Email', '5' => 'Anuncios', '6' => 'Otros'], NULL, array('class' => 'mdl-selectfield__select mdl-textfield__input', 'id' => 'ingreso_por')) !!}
									<label for="ingreso_por">
										<i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
									</label>
									{!! Form::label('ingreso_por', 'Ingresó por', array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
									<span class="mdl-textfield__error"></span>
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
							{!! Form::button('<i class="material-icons">save</i> Guardar cambios', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--green mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')) !!}
						</span>

					</div>
				</div>
			</div>

			<div class="mdl-card__menu mdl-color-text--white">

				{{-- SAVE ICON --}}
				<span class="save-actions">
					{!! Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'Guardar cambios')) !!}
				</span>
			</div>


			{!! Form::close() !!}

		</div>
	</div>
</div>

@endsection

@section('template_scripts')

@include('scripts.mdl-required-input-fix')
@include('scripts.mdl-file-upload')
@include('scripts.html5-password-match-check')

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