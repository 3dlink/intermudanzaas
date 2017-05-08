@extends('dashboard')

@section('template_title')
Editando {{ $user->first_name.' '.$user->last_name }}
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
Editando {{ $user->first_name.' '.$user->last_name }}
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
<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	<a itemprop="item" href="{{ url('app/users') }}">
		<span itemprop="name">
			Usuarios
		</span>
	</a>
	<i class="material-icons">chevron_right</i>
	<meta itemprop="position" content="2" />
</li>

	<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="app/users/{{ $user->id }}/edit">
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
				<h2 class="mdl-card__title-text">Editando {{ $user->first_name.' '.$user->last_name }}</h2>
			</div>
			{!! Form::model($user, array('action' => array('UsersManagementController@update', $user->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}

			<div class="mdl-card card-wide" style="width:100%;" itemscope itemtype="http://schema.org/Person">
				<div class="mdl-user-avatar">
					@if($user->profile->profile_pic != NULL)
					<img src="{{ url($user->profile->profile_pic) }}" alt="{{ $user->first_name }}">
					@else
					<img src="{{ Gravatar::get($user->email) }}" alt="{{ $user->first_name }}">
					@endif
					<span itemprop="image" style="display:none;">{{ Gravatar::get($user->email) }}</span>
				</div>

				<div class="mdl-card__title" @if ($user->profile->user_profile_bg != NULL) style="background: url('{{$user->profile->user_profile_bg}}') center/cover;" @endif>

					<h3 class="mdl-card__title-text mdl-title-username">
						{{ $user->first_name.' '.$user->last_name }}
					</h3>
				</div>
				<div class="mdl-card__supporting-text">
					<div class="mdl-grid full-grid padding-0">
						<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

							<div class="mdl-grid ">
								<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
										{!! Form::email('email', NULL, array('id' => 'email', 'class' => 'mdl-textfield__input')) !!}
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
										{!! Form::text('last_name', NULL, array('id' => 'last_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z]*')) !!}
										{!! Form::label('last_name', 'Apellido', array('class' => 'mdl-textfield__label')); !!}
										<span class="mdl-textfield__error">Solo letras</span>
									</div>
								</div>
								<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('phone') ? 'is-invalid' :'' }}">
										{!! Form::text('phone', $user->profile->phone, array('id' => 'phone', 'class' => 'mdl-textfield__input')) !!}
										{!! Form::label('phone', 'Número telefónico', array('class' => 'mdl-textfield__label')); !!}
									</div>
								</div>
								<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('skype_user') ? 'is-invalid' :'' }}">
										{!! Form::text('skype_user', $user->profile->skype_user, array('id' => 'skype_user', 'class' => 'mdl-textfield__input')) !!}
										{!! Form::label('skype_user', 'Usuario de skype', array('class' => 'mdl-textfield__label')); !!} 
									</div>
								</div>

								<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('user_level') ? 'is-invalid' :'' }}">
										{!! Form::select('user_level', array('4' => 'Coordinación', '3' => 'Ventas', '2' => 'Logística', '1' => 'Administrador'), $user->role->id, array('class' => 'mdl-selectfield__select mdl-textfield__input', 'id' => 'user_level')) !!}
										<label for="user_level">
											<i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
										</label>
										{!! Form::label('user_level', Lang::get('forms.label-userrole_id'), array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
										<span class="mdl-textfield__error"></span>
									</div>
								</div>

								<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password') ? 'is-invalid' :'' }}">
										{!! Form::password('password', array('id' => 'password', 'class' => 'mdl-textfield__input')) !!}
										{!! Form::label('password', 'Contraseña', array('class' => 'mdl-textfield__label')); !!}
										<span class="mdl-textfield__error"></span>
									</div>
								</div>

								<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password_confirmation') ? 'is-invalid' :'' }}">
										{!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'mdl-textfield__input')) !!}
										{!! Form::label('password_confirmation', 'Confirmar contraseña', array('class' => 'mdl-textfield__label')); !!}
										<span class="mdl-textfield__error"></span>
									</div>
								</div>

								<div class="mdl-cell mdl-cell--12-col">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('bio') ? 'is-invalid' :'' }}">
										{!! Form::textarea('bio',  $user->profile->bio, array('id' => 'bio', 'class' => 'mdl-textfield__input')) !!}
										{!! Form::label('bio', 'Biografía', array('class' => 'mdl-textfield__label')); !!}
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