@extends('dashboard')

@section('template_title')
Cotización
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
.est_div{
border-style:solid;
border-width: 2px;
border-color: rgb(0,188,212) !important;
}
.file_upload_container{
position: relative;
width: 100%;
left: 0;
}
.file_upload_text_div{
float: left;
width: 200px;
margin-top: -8px;
margin-left: 5px;
}

.removeBtn:hover{
cursor: pointer;
}

.mdl-textfield__label{
color: rgb(0,188,212) !important;
}

.mdl-textfield__input{
color: rgba(0,0,0,.54) !important;
}

h4{
color: rgb(0,188,212);
}

@endsection

@section('header')
Cotización
@endsection

@section('content')

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
	<a itemprop="item" href="{{ url('/app/estimaciones') }}">
		<span itemprop="name">
			Estimaciones
		</span>
	</a>
	<i class="material-icons">chevron_right</i>
	<meta itemprop="position" content="2" />
</li>
<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	<a itemprop="item" href="/app/estimaciones/create">
		<span itemprop="name">
			Estimación
		</span>
	</a>
	<meta itemprop="position" content="3" />
</li>
@endsection

<div class="mdl-grid full-grid margin-top-0 padding-0">
	<div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
		<div class="mdl-card card-new-user" style="width:100%;" itemscope itemtype="http://schema.org/Person">

			<div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
				<h2 class="mdl-card__title-text">Inventario detallado para la cotización internacional</h2>
			</div>

			{!! Form::model($estimacion, array('action' => array('EstimacionController@update', $estimacion->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'files' => 'true', 'id' => 'form')) !!}
			<div class="mdl-card__supporting-text">
				<div class="mdl-grid full-grid padding-0">
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('fecha_estimada') ? 'is-invalid' :'' }}">
								{!! Form::text('fecha_estimada', NULL, array('id' => 'fecha_estimada', 'class' => 'mdl-textfield__input', 'disabled')) !!}
								{!! Form::label('fecha_estimada', 'Fecha estimada de mudanza', array('class' => 'mdl-textfield__label')); !!}
								<span class="mdl-textfield__error"></span>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--3-col-tablet mdl-cell--3-col-desktop">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('tipo_mudanza') ? 'is-invalid' :'' }}">
								{!! Form::select('tipo_mudanza', ['' => '', '1' => 'Familiar', '2' => 'Personal', '3' => 'Comercial', '4' => 'Otros'], NULL, array('class' => 'mdl-selectfield__select mdl-textfield__input', 'id' => 'tipo_mudanza', 'disabled')) !!}
								{!! Form::label('tipo_mudanza', 'Tipo de mudanza', array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
								<span class="mdl-textfield__error"></span>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
						</div>
						<div class="mdl-cell mdl-cell--3-col-tablet mdl-cell--3-col-desktop">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('telf_origen') ? 'is-invalid' :'' }}">
								{!! Form::text('telf_origen', NULL, array('id' => 'telf_origen', 'class' => 'mdl-textfield__input', 'disabled')) !!}
								{!! Form::label('telf_origen', 'Teléfono de origen', array('class' => 'mdl-textfield__label')); !!}
								<span class="mdl-textfield__error"></span>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--3-col-tablet mdl-cell--3-col-desktop">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('p_origen') ? 'is-invalid' :'' }}">
								{!! Form::select('p_origen', $paises, NULL, array('class' => 'mdl-selectfield__select mdl-textfield__input', 'id' => 'p_origen', 'disabled')) !!}
								{!! Form::label('p_origen', 'País de origen', array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
								<span class="mdl-textfield__error"></span>
							</div>
						</div>

						<div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('c_origen') ? 'is-invalid' :'' }}">
								{!! Form::text('c_origen', NULL, array('id' => 'c_origen', 'class' => 'mdl-textfield__input', 'disabled')) !!}
								{!! Form::label('c_origen', 'Ciudad de origen', array('class' => 'mdl-textfield__label')); !!}
								<span class="mdl-textfield__error"></span>
							</div>
						</div>

						<div class="mdl-cell mdl-cell--12-col">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('dir_origen') ? 'is-invalid' :'' }}">
								{!! Form::textarea('dir_origen',  NULL, array('id' => 'dir_origen', 'class' => 'mdl-textfield__input', 'rows' => 2, 'disabled')) !!}
								{!! Form::label('dir_origen', 'Dirección de origen', array('class' => 'mdl-textfield__label')); !!}
							</div>
						</div>

						<div class="mdl-cell mdl-cell--3-col-tablet mdl-cell--3-col-desktop">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('telf_destino') ? 'is-invalid' :'' }}">
								{!! Form::text('telf_destino', NULL, array('id' => 'telf_destino', 'class' => 'mdl-textfield__input', 'disabled')) !!}
								{!! Form::label('telf_destino', 'Teléfono de destino', array('class' => 'mdl-textfield__label')); !!}
								<span class="mdl-textfield__error"></span>
							</div>
						</div>

						<div class="mdl-cell mdl-cell--3-col-tablet mdl-cell--3-col-desktop">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('p_destino') ? 'is-invalid' :'' }}">
								{!! Form::select('p_destino', $paises, NULL, array('class' => 'mdl-selectfield__select mdl-textfield__input', 'id' => 'p_destino', 'disabled')) !!}
								{!! Form::label('p_destino', 'País de destino', array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
								<span class="mdl-textfield__error"></span>
							</div>
						</div>

						<div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('c_destino') ? 'is-invalid' :'' }}">
								{!! Form::text('c_destino', NULL, array('id' => 'c_destino', 'class' => 'mdl-textfield__input', 'disabled')) !!}
								{!! Form::label('c_destino', 'Ciudad de destino', array('class' => 'mdl-textfield__label')); !!}
								<span class="mdl-textfield__error"></span>
							</div>
						</div>

						<div class="mdl-cell mdl-cell--12-col">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('dir_destino') ? 'is-invalid' :'' }}">
								{!! Form::textarea('dir_destino',  NULL, array('id' => 'dir_destino', 'class' => 'mdl-textfield__input', 'rows' => 2, 'disabled')) !!}
								{!! Form::label('dir_destino', 'Dirección de destino', array('class' => 'mdl-textfield__label')); !!}
							</div>
						</div>
						<div class="mdl-cell mdl-cell--12-col">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('comentario') ? 'is-invalid' :'' }}">
								{!! Form::textarea('comentario',  NULL, array('id' => 'comentario', 'class' => 'mdl-textfield__input', 'rows' => 1, 'disabled')) !!}
								{!! Form::label('comentario', 'Comentarios o solicitudes adicionales', array('class' => 'mdl-textfield__label')); !!}
							</div>
						</div>
						<div class="mdl-grid full-grid est_div">
							<div class="mdl-cell mdl-cell--6-col">
								{!! Form::label('vol_est', 'Volumen estimado: '); !!}
								<label id="estimacion"></label>
							</div>
							<div class="mdl-cell mdl-cell--6-col">
								{!! Form::label('box_est', 'Cajas estimadas: '); !!}
								<label id="box_est"></label>
							</div>
						</div>
					</div>

					<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
						<div class="mdl-tabs mdl-js-tabs">
							<?php 
							$n = count($rooms);
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
								<?php 
							}
							$i = 0; 
							?>
							@foreach($rooms as $a_room)
							<?php $i++; ?>
							<div class="mdl-tabs__panel @if($i == 1){{'is-active'}}@endif" id="room_{{$a_room->id}}">
								<div class="mdl-grid">
									<div class="mdl-cell mdl-cell--6-col-phone mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
										<center>
											<table class="mdl-data-table mdl-js-data-table">
												<thead>
													<tr>
														<th class="mdl-data-table__cell--non-numeric">Objeto</th>
														<th>Unidad</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													@foreach($a_room->objects as $a_obj)
													<?php 
													$exist = false;
													$qty = NULL; ?>
													@foreach($estimacion->objects as $e_obj)
													@if ($e_obj->pivot->room_id == $a_room->id)
													@if ($e_obj->id == $a_obj->id) 
													<?php 
													$exist = true;
													$qty = $e_obj->pivot->cantidad; 
													?>
													@endif
													@endif
													@endforeach
													@if($exist)
													<tr>
														<td class="mdl-data-table__cell--non-numeric">{{ucfirst($a_obj->name)}}</td>
														<td id="obj_{{$a_room->id}}_{{$a_obj->id}}">    
															{!! Form::selectRange('obj_'.$a_obj->id.'_'.$a_room->id, $a_obj->vmin, $a_obj->vmax, $qty, ['styles' => 'text-align: center; margin-left: 10px;', 'id' => 'obj_'.$a_obj->id.'_'.$a_room->id, 'data-factor' => $a_obj->factor, 'class' => 'obj_select', 'disabled']); !!}
														</td>
														@if(strlen($a_obj->tooltip)>0)
														<div class="mdl-tooltip" for="obj_{{$a_room->id}}_{{$a_obj->id}}">
															{{$a_obj->tooltip}}
														</div>
														@endif
														<td class="mdl-data-table__cell--non-numeric">{{$a_obj->unit}}</td>
													</tr>
													@endif
													@endforeach
												</tbody>
											</table>
										</center>
									</div>

									<div class="mdl-cell mdl-cell--6-col-phone mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
										<center>
											<table class="mdl-data-table mdl-js-data-table">
												<thead>
													<tr>
														<th class="mdl-data-table__cell--non-numeric">Cajas con</th>
														<th>Cantidad</th>
													</tr>
												</thead>
												<tbody>
													@foreach($a_room->boxes as $a_box)
													@php
													$exist = false;
													$qty = NULL;
													@endphp
													@foreach($estimacion->boxes as $e_box)
													@if ($e_box->pivot->room_id == $a_room->id)
													@if ($e_box->id == $a_obj->id) 
													@php 
													$exist = true;
													$qty = $e_box->pivot->cantidad; 
													@endphp
													@endif
													@endif
													@endforeach
													@if($exist)
													<tr>
														<td class="mdl-data-table__cell--non-numeric">{{ucfirst($a_box->name)}}</td>
														<td id="box_{{$a_box->id}}">
															{!! Form::selectRange('box_'.$a_box->id.'_'.$a_room->id, $a_box->vmin, $a_box->vmax, $qty, ['styles' => 'text-align: center; margin-left: 10px;', 'data-factor' => $a_box->factor, 'class' => 'box_select', 'disabled']); !!}
														</td>
														@if(strlen($a_box->tooltip)>0)
														<div class="mdl-tooltip" for="box_{{$a_box->id}}" data-mdl-for="box_{{$a_box->id}}">
															{{$a_box->tooltip}}
														</div>
														@endif
													</tr>
													@endif
													@endforeach
												</tbody>
											</table>
										</center>
									</div>
								</div>
							</div>
							@endforeach 
						</div>
					</div>
					@if(count($especiales)>0)
					<div class="mdl-grid full-grid padding-0">

						<div  class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
							<h4 class="mdl-cell mdl-cell--12-col" style="text-align: center;">Objetos Especiales</h4>
							<div class=" mdl-grid full-grid est_div">
								@foreach($especiales as $a_esp)
								<div id="id1_{{$a_esp->id}}" class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
									<div id="id2_{{$a_esp->id}}" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input id="esp_name_{{$a_esp->id}}" class="mdl-textfield__input esp_name" name="esp_name_{{$a_esp->id}}" type="text" value="{{$a_esp->name}}" disabled>
										<label id="id3_{{$a_esp->id}}" class="mdl-textfield__label" for="esp_name_{{$a_esp->id}}">Nombre</label>
									</div>
								</div>
								<div id="id4_{{$a_esp->id}}" class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
									@if($a_esp->image)
									<div id="id5_{{$a_esp->id}}" class="file_upload_container">
										<div id="file_upload_text_div_esp_{{$a_esp->id}}" class="file_upload_text_div mdl-textfield mdl-js-textfield">
											<input class="file_upload_text mdl-textfield__input mdl-color-text--white mdl-file-input" disabled readonly="" id="file_upload_text_esp_{{$a_esp->id}}" type="text">
											<label id="label_esp_{{$a_esp->id}}" class="mdl-textfield__label" for="file_upload_text" style="color:rgba(0,0,0,.54);">{{$a_esp->img_orig_name}}</label>
										</div>
										
										<div id="id6_{{$a_esp->id}}" class="file_upload_btn">
											<label id="id7_{{$a_esp->id}}" class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-color-text--white mdl-color--primary" onclick="getModalOut(this)" data-image="{{url($a_esp->image)}}">
												<i class="material-icons">photo_camera</i>
											</label>
										</div>
									</div>
									@endif
								</div>
								<div id="id8_{{$a_esp->id}}" class="mdl-cell mdl-cell--9-col">
									<div id="id9_{{$a_esp->id}}" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<textarea id="esp_desc_{{$a_esp->id}}" class="mdl-textfield__input" rows="1" name="esp_desc_{{$a_esp->id}}" cols="50" disabled>{{$a_esp->description}}</textarea>
										<label id="id10_{{$a_esp->id}}" for="esp_desc_{{$a_esp->id}}" class="mdl-textfield__label">Descripción del objeto especial</label>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
					@endif
				</div>
			</div>
			{!! Form::close() !!}
			@if(count($estimacion->fotos)>0)
			<div class="mdl-card__supporting-text">
				<div class="mdl-grid full-grid padding-0">
					<h4 class="mdl-cell mdl-cell--12-col" style="text-align: center;">Fotos</h4>
					@foreach($estimacion->fotos as $a_pic)
					<div class="mdl-cell mdl-cell--6-col-phone mdl-cell--4-col-tablet mdl-cell--4-col-desktop">

						<div class="file_upload_text_div mdl-textfield mdl-js-textfield">
							<input class="file_upload_text mdl-textfield__input mdl-color-text--white mdl-file-input" disabled readonly="" type="text">
							<label class="mdl-textfield__label" for="file_upload_text" style="color:rgba(0,0,0,.54);">{{$a_pic->img_orig_name}}</label>
						</div>
						<div  class="file_upload_btn">
							<label class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-color-text--white mdl-color--primary" onclick="getModalOut(this)" data-image="{{url($a_pic->image)}}">
								<i class="material-icons">photo_camera</i>
							</label>
						</div>
					</div>
					@endforeach
				</div>                  
			</div>
			@endif
		</div>
	</div>
</div>

@endsection

@section('template_scripts')

@include('scripts.mdl-required-input-fix')


<script type="text/javascript">

	function getModalOut(that) {
		let dialog = document.querySelector("#dialog");
		let img = dialog.querySelector("#modalImg");
		let link = dialog.querySelector("#link");

		img.src = that.dataset.image;
		link.href = that.dataset.image;

		if (!dialog.showModal) {
			dialogPolyfill.registerDialog(dialog);
		}

		dialog.showModal();

		dialog.querySelector('#close').addEventListener('click', function() {
			dialog.close();
			let img = dialog.querySelector("#modalImg");
			let link = dialog.querySelector("#link");
			img.src = "";
			link.href = "";
			dialog.destroy();
		});
	}

	function calculate_estimation() {
		let selects = $('.box_select, .obj_select');
		let volumen_estimado = 0;
		for (let i = 0; i < selects.length; i++){

			let val = $(selects[i]).val();
			let factor = $(selects[i]).attr('data-factor');

			volumen_estimado += val * factor;

		}
		$('#estimacion').html(volumen_estimado+' mtrs<sup>3</sup>');

		$('#box_est').text(() => {
			let selects = $('.box_select');
			let box_est = 0;

			for (let i = 0; i < selects.length; i++) {

				box_est += $(selects[i]).val();

			}
			return parseInt(box_est);
		});
	};

	$(document).ready(() => {
		calculate_estimation();
	});

</script>

@endsection

@section('dialog_section')
@include('dialogs.dialog-show-image')
<div class="backdrop" style="z-index: -100001;"></div>
@endsection