@extends('dashboard')

@section('template_title')
Nueva Cotización
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
.mdl-checkbox{
width: 0;
}
.mdl-tabs__tab-bar{
border-bottom: 0 !important;
}
.mdl-tabs__tab{
border-bottom: 1px solid #e0e0e0 !important;
}
select{
min-width: 40px;
}
@endsection

@section('header')
Nueva Cotización
@endsection

@section('content')

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
<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	<a itemprop="item" href="{{ url('/users') }}">
		<span itemprop="name">
			Usuarios???
		</span>
	</a>
	<i class="material-icons">chevron_right</i>
	<meta itemprop="position" content="2" />
</li>
<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	<a itemprop="item" href="/users/create">
		<span itemprop="name">
			Nueva Cotización
		</span>
	</a>
	<meta itemprop="position" content="3" />
</li>
@endsection

<div class="mdl-grid full-grid margin-top-0 padding-0">
	<div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
		<div class="mdl-card card-new-user" style="width:100%;" itemscope itemtype="http://schema.org/Person">

			<div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
				<h2 class="mdl-card__title-text">Tabla de inventario detallado para la cotización internacional</h2>
			</div>

			{!! Form::open(array('action' => 'UsersManagementController@store', 'method' => 'POST', 'role' => 'form', 'files' => 'true')) !!}
			<div class="mdl-card__supporting-text">
				<div class="mdl-grid full-grid padding-0">
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('p_origen') ? 'is-invalid' :'' }}">
								{!! Form::select('p_origen', ['' => '', 'vzla' => 'Venezuela', 'ecu' => 'Ecuador', 'col' => 'Colombia', 'bra' => 'Brasil', 'pan' => 'Panamá'], NULL, array('class' => 'mdl-selectfield__select mdl-textfield__input', 'id' => 'p_origen')) !!}
								<label for="p_origen">
									<i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
								</label>
								{!! Form::label('p_origen', 'País de origen', array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
								<span class="mdl-textfield__error"></span>
							</div>
						</div>

						<div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('c_origen') ? 'is-invalid' :'' }}">
								{!! Form::text('c_origen', NULL, array('id' => 'c_origen', 'class' => 'mdl-textfield__input')) !!}
								{!! Form::label('c_origen', 'Ciudad de origen', array('class' => 'mdl-textfield__label')); !!}
								<span class="mdl-textfield__error"></span>
							</div>
						</div>

						<div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('p_destination') ? 'is-invalid' :'' }}">
								{!! Form::select('p_destination', ['' => '', 'vzla' => 'Venezuela', 'ecu' => 'Ecuador', 'col' => 'Colombia', 'bra' => 'Brasil', 'pan' => 'Panamá'], NULL, array('class' => 'mdl-selectfield__select mdl-textfield__input', 'id' => 'p_destination')) !!}
								<label for="p_destination">
									<i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
								</label>
								{!! Form::label('p_destination', 'País de destino', array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
								<span class="mdl-textfield__error"></span>
							</div>
						</div>

						<div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('c_destination') ? 'is-invalid' :'' }}">
								{!! Form::text('c_destination', NULL, array('id' => 'c_destination', 'class' => 'mdl-textfield__input')) !!}
								{!! Form::label('c_destination', 'Ciudad de destino', array('class' => 'mdl-textfield__label')); !!}
								<span class="mdl-textfield__error"></span>
							</div>
						</div>

						<div class="mdl-cell mdl-cell--12-col">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('direction') ? 'is-invalid' :'' }}">
								{!! Form::textarea('direction',  NULL, array('id' => 'direction', 'class' => 'mdl-textfield__input', 'rows' => 3)) !!}
								{!! Form::label('direction', 'Dirección', array('class' => 'mdl-textfield__label')); !!}
							</div>
						</div>
						<div class="mdl-cell mdl-cell--6-col">
							{!! Form::label('vol_est', 'Volumen estimado: '); !!}
							<label id="estimacion"></label>
						</div>
						<div class="mdl-cell mdl-cell--6-col">
							{!! Form::label('box_est', 'Cajas estimadas: '); !!}
							<label id="box_est"></label>
						</div>

					</div>
					<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
						<div class="mdl-tabs mdl-js-tabs">
							<?php $n = count($rooms);
							$cant_tabs = ceil($n/5);
							for ($div=0; $div < $cant_tabs; $div++) { 
								if ($n-5>0) {
									$plus = 5;
									$n -= 5;
								} else {
									$plus = $n;
								}
								?>
								<div class="mdl-tabs__tab-bar">
									<?php for ($i=$div*5; $i < $div*5+$plus; $i++) { ?>
									<a href="#room_{{$rooms[$i]->id}}" class="mdl-tabs__tab @if($i == 0){{'is-active'}}@endif"> {{ ucfirst($rooms[$i]->name) }} </a>
									<?php } ?>
								</div>
								<?php }
								$i = 0; 
								?>
								@foreach($rooms as $a_room)
								<?php $i++; ?>
								<div class="mdl-tabs__panel @if($i == 1){{'is-active'}}@endif" id="room_{{$a_room->id}}">
									<div class="mdl-grid">
										@if(count($a_room->objects)>0)
										<div class="mdl-cell mdl-cell--6-col-phone mdl-cell--6-col-tablet mdl-cell--6-col-desktop">

											<table class="mdl-data-table mdl-js-data-table">
												<thead>
													<tr>
														<th class="mdl-data-table--selectable">¿Lleva?</th>
														<th class="mdl-data-table__cell--non-numeric">Objeto</th>
														<th>Unidad</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													@foreach($a_room->objects as $a_obj)
													<tr>
														<td class="mdl-data-table--selectable"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-obj-{{$a_obj->id.'_'.$a_room->id}}">
															<input type="checkbox" id="checkbox-obj-{{$a_obj->id.'_'.$a_room->id}}" class="mdl-checkbox__input"/>
														</label></td>
														<td class="mdl-data-table__cell--non-numeric">{{ucfirst($a_obj->name)}}</td>
														<td id="obj_{{$a_obj->id}}">{!! Form::selectRange('obj_'.$a_obj->id.'_'.$a_room->id, $a_obj->vmin, $a_obj->vmax, NULL, ['styles' => 'text-align: center; margin-left: 10px;', 'disabled' => 'true', 'id' => 'obj_'.$a_obj->id.'_'.$a_room->id, 'data-factor' => $a_obj->factor, 'class' => 'obj_select']); !!}</td>
														@if(strlen($a_obj->tooltip)>0)
														<div class="mdl-tooltip" for="obj_{{$a_obj->id}}">
															{{$a_obj->tooltip}}
														</div>
														@endif
														<td class="mdl-data-table__cell--non-numeric">{{$a_obj->unit}}</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
										@endif
										@if(count($a_room->boxes)>0)
										<div class="mdl-cell mdl-cell--6-col-phone mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
											<table class="mdl-data-table mdl-js-data-table">
												<thead>
													<tr>
														<th class="mdl-data-table--selectable">¿Lleva?</th>
														<th class="mdl-data-table__cell--non-numeric">Cajas con</th>
														<th>Cantidad</th>
													</tr>
												</thead>
												<tbody>
													@foreach($a_room->boxes as $a_box)
													<tr>
														<td class="mdl-data-table--selectable"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-box-{{$a_box->id.'_'.$a_room->id}}">
															<input type="checkbox" id="checkbox-box-{{$a_box->id.'_'.$a_room->id}}" class="mdl-checkbox__input"/>
														</label></td>
														<td class="mdl-data-table__cell--non-numeric">{{ucfirst($a_box->name)}}</td>
														<td id="box_{{$a_box->id}}">{!! Form::selectRange('box_'.$a_box->id.'_'.$a_room->id, $a_box->vmin, $a_box->vmax, NULL, ['styles' => 'text-align: center; margin-left: 10px;', 'disabled' => 'true', 'data-factor' => $a_box->factor, 'class' => 'box_select']); !!}</td>
														@if(strlen($a_box->tooltip)>0)
														<div class="mdl-tooltip" for="box_{{$a_box->id}}">
															{{$a_box->tooltip}}
														</div>
														@endif
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
										@endif
									</div>
								</div>
								@endforeach 
							</div>
						</div>


						<div class="mdl-card__actions padding-top-0">
							<div class="mdl-grid padding-top-0">
								<div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0 margin-left-1-1">

									{{-- SAVE BUTTON--}}
									<span class="save-actions">
										{!! Form::button('<i class="material-icons">save</i> Pedir Cotización', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--green mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')) !!}
									</span>

								</div>
							</div>
						</div>

						<div class="mdl-card__menu mdl-color-text--white">
							{{-- SAVE ICON --}}
							<span class="save-actions">
								{!! Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'Pedir Cotización')) !!}
							</span>
						</div>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

	@endsection

	@section('template_scripts')

	@include('scripts.mdl-required-input-fix')

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

		$(".mdl-checkbox__input").click((event)=>{
			let obj = event.target.parentElement.parentElement.parentElement.children[2].children[0];
			if (obj.hasAttribute("disabled")) {
				obj.removeAttribute("disabled");
			}else{
				obj.setAttribute("disabled", true);
			}
			calculate_estimation();
		});

		$('.box_select, .obj_select').on('change', calculate_estimation);

		function calculate_estimation() {
			let selects = $('.box_select, .obj_select');
			let volumen_estimado = 0;
			for (let i = 0; i < selects.length; i++){
				if (!selects[i].hasAttribute('disabled')) {
					let val = $(selects[i]).val();
					let factor = $(selects[i]).attr('data-factor');

					volumen_estimado += val * factor;
				}
			}
			$('#estimacion').text(volumen_estimado);

			$('#box_est').text(() => {
				let selects = $('.box_select');
				let box_est = 0;
				
				for (let i = 0; i < selects.length; i++) {
					if (!selects[i].hasAttribute('disabled')) {
						box_est += $(selects[i]).val();
					}
				}
				return parseInt(box_est);
			});
		};
	</script>

	@endsection

	@section('dialog_section')
	@include('dialogs.dialog-save')
	<div class="backdrop" style="z-index: -100001;"></div>
	@endsection