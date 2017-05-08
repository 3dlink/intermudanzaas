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
                                {!! Form::text('fecha_estimada', NULL, array('id' => 'fecha_estimada', 'class' => 'mdl-textfield__input')) !!}
                                {!! Form::label('fecha_estimada', 'Fecha estimada de mudanza', array('class' => 'mdl-textfield__label')); !!}
                                <span class="mdl-textfield__error"></span>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--3-col-tablet mdl-cell--3-col-desktop">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('tipo_mudanza') ? 'is-invalid' :'' }}">
                                {!! Form::select('tipo_mudanza', ['' => '', '1' => 'Familiar', '2' => 'Personal', '3' => 'Comercial', '4' => 'Otros'], NULL, array('class' => 'mdl-selectfield__select mdl-textfield__input', 'id' => 'tipo_mudanza')) !!}
                                <label for="tipo_mudanza">
                                    <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                </label>
                                {!! Form::label('tipo_mudanza', 'Tipo de mudanza', array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
                                <span class="mdl-textfield__error"></span>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                        </div>
                        <div class="mdl-cell mdl-cell--3-col-tablet mdl-cell--3-col-desktop">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('telf_origen') ? 'is-invalid' :'' }}">
                                {!! Form::text('telf_origen', NULL, array('id' => 'telf_origen', 'class' => 'mdl-textfield__input')) !!}
                                {!! Form::label('telf_origen', 'Teléfono de origen', array('class' => 'mdl-textfield__label')); !!}
                                <span class="mdl-textfield__error"></span>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--3-col-tablet mdl-cell--3-col-desktop">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('p_origen') ? 'is-invalid' :'' }}">
                                {!! Form::select('p_origen', $paises, NULL, array('class' => 'mdl-selectfield__select mdl-textfield__input', 'id' => 'p_origen')) !!}
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

                        <div class="mdl-cell mdl-cell--12-col">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('dir_origen') ? 'is-invalid' :'' }}">
                                {!! Form::textarea('dir_origen',  NULL, array('id' => 'dir_origen', 'class' => 'mdl-textfield__input', 'rows' => 2)) !!}
                                {!! Form::label('dir_origen', 'Dirección de origen', array('class' => 'mdl-textfield__label')); !!}
                            </div>
                        </div>

                        <div class="mdl-cell mdl-cell--3-col-tablet mdl-cell--3-col-desktop">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('telf_destino') ? 'is-invalid' :'' }}">
                                {!! Form::text('telf_destino', NULL, array('id' => 'telf_destino', 'class' => 'mdl-textfield__input')) !!}
                                {!! Form::label('telf_destino', 'Teléfono de destino', array('class' => 'mdl-textfield__label')); !!}
                                <span class="mdl-textfield__error"></span>
                            </div>
                        </div>

                        <div class="mdl-cell mdl-cell--3-col-tablet mdl-cell--3-col-desktop">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('p_destino') ? 'is-invalid' :'' }}">
                                {!! Form::select('p_destino', $paises, NULL, array('class' => 'mdl-selectfield__select mdl-textfield__input', 'id' => 'p_destino')) !!}
                                <label for="p_destino">
                                    <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                </label>
                                {!! Form::label('p_destino', 'País de destino', array('class' => 'mdl-textfield__label mdl-selectfield__label')); !!}
                                <span class="mdl-textfield__error"></span>
                            </div>
                        </div>

                        <div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('c_destino') ? 'is-invalid' :'' }}">
                                {!! Form::text('c_destino', NULL, array('id' => 'c_destino', 'class' => 'mdl-textfield__input')) !!}
                                {!! Form::label('c_destino', 'Ciudad de destino', array('class' => 'mdl-textfield__label')); !!}
                                <span class="mdl-textfield__error"></span>
                            </div>
                        </div>

                        <div class="mdl-cell mdl-cell--12-col">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('dir_destino') ? 'is-invalid' :'' }}">
                                {!! Form::textarea('dir_destino',  NULL, array('id' => 'dir_destino', 'class' => 'mdl-textfield__input', 'rows' => 2)) !!}
                                {!! Form::label('dir_destino', 'Dirección de destino', array('class' => 'mdl-textfield__label')); !!}
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('comentario') ? 'is-invalid' :'' }}">
                                {!! Form::textarea('comentario',  NULL, array('id' => 'comentario', 'class' => 'mdl-textfield__input', 'rows' => 1)) !!}
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
                                    @if(count($a_room->objects)>0)
                                    <div class="mdl-cell mdl-cell--6-col-phone mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
                                        <center>
                                            <table class="mdl-data-table mdl-js-data-table">
                                                <thead>
                                                    <tr>
                                                        <th class="mdl-data-table--selectable">¿Lleva?</th>
                                                        <th class="mdl-data-table__cell--non-numeric">Objeto</th>
                                                        <th>Cantidad</th>
                                                        <th>Unidad</th>
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
                                                    <tr>
                                                        <td class="mdl-data-table--selectable"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-obj-{{$a_obj->id.'_'.$a_room->id}}">
                                                            <input type="checkbox" id="checkbox-obj-{{$a_obj->id.'_'.$a_room->id}}" @if($exist){{'checked'}}@endif class="mdl-checkbox__input"/>
                                                        </label></td>
                                                        <td class="mdl-data-table__cell--non-numeric">{{ucfirst($a_obj->name)}}</td>
                                                        <td id="obj_{{$a_room->id}}_{{$a_obj->id}}">
                                                            @if(!$exist)
                                                            {!! Form::selectRange('obj_'.$a_obj->id.'_'.$a_room->id, $a_obj->vmin, $a_obj->vmax, NULL, ['styles' => 'text-align: center; margin-left: 10px;', 'disabled' => 'false', 'id' => 'obj_'.$a_obj->id.'_'.$a_room->id, 'data-factor' => $a_obj->factor, 'class' => 'obj_select']); !!}
                                                            @else
                                                            {!! Form::selectRange('obj_'.$a_obj->id.'_'.$a_room->id, $a_obj->vmin, $a_obj->vmax, $qty, ['styles' => 'text-align: center; margin-left: 10px;', 'id' => 'obj_'.$a_obj->id.'_'.$a_room->id, 'data-factor' => $a_obj->factor, 'class' => 'obj_select']); !!}
                                                            @endif
                                                        </td>
                                                        @if(strlen($a_obj->tooltip)>0)
                                                        <div class="mdl-tooltip" for="obj_{{$a_room->id}}_{{$a_obj->id}}">
                                                            {{$a_obj->tooltip}}
                                                        </div>
                                                        @endif
                                                        <td class="mdl-data-table__cell--non-numeric">{{$a_obj->unit}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </center>
                                    </div>
                                    @endif

                                    @if(count($a_room->boxes)>0)
                                    <div class="mdl-cell mdl-cell--6-col-phone mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
                                        <center>
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
                                                    <?php 
                                                    $exist = false;
                                                    $qty = NULL; ?>
                                                    @foreach($estimacion->boxes as $e_box)
                                                    @if ($e_box->pivot->room_id == $a_room->id)
                                                    @if ($e_box->id == $a_obj->id) 
                                                    <?php 
                                                    $exist = true;
                                                    $qty = $e_box->pivot->cantidad; 
                                                    ?>
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                    <tr>
                                                        <td class="mdl-data-table--selectable"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-box-{{$a_box->id.'_'.$a_room->id}}">
                                                            <input type="checkbox" id="checkbox-box-{{$a_box->id.'_'.$a_room->id}}" @if($exist){{'checked'}}@endif class="mdl-checkbox__input"/>
                                                        </label></td>
                                                        <td class="mdl-data-table__cell--non-numeric">{{ucfirst($a_box->name)}}</td>
                                                        <td id="box_{{$a_box->id}}">
                                                            @if(!$exist)
                                                            {!! Form::selectRange('box_'.$a_box->id.'_'.$a_room->id, $a_box->vmin, $a_box->vmax, NULL, ['styles' => 'text-align: center; margin-left: 10px;', 'disabled' => 'true', 'data-factor' => $a_box->factor, 'class' => 'box_select']); !!}
                                                            @else
                                                            {!! Form::selectRange('box_'.$a_box->id.'_'.$a_room->id, $a_box->vmin, $a_box->vmax, $qty, ['styles' => 'text-align: center; margin-left: 10px;', 'data-factor' => $a_box->factor, 'class' => 'box_select']); !!}
                                                            @endif
                                                        </td>
                                                        @if(strlen($a_box->tooltip)>0)
                                                        <div class="mdl-tooltip" for="box_{{$a_box->id}}" data-mdl-for="box_{{$a_box->id}}">
                                                            {{$a_box->tooltip}}
                                                        </div>
                                                        @endif
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </center>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach 
                        </div>
                    </div>
                    <div class="mdl-grid full-grid padding-0">

                        <div  class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                            <h4 class="mdl-cell mdl-cell--12-col" style="text-align: center;">Objetos Especiales</h4>
                            <div class=" mdl-grid full-grid est_div">
                                @foreach($especiales as $a_esp)
                                <div id="id1_{{$a_esp->id}}" class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
                                    <div id="id2_{{$a_esp->id}}" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="esp_name_{{$a_esp->id}}" class="mdl-textfield__input esp_name" name="esp_name_{{$a_esp->id}}" type="text" value="{{$a_esp->name}}">
                                        <label id="id3_{{$a_esp->id}}" class="mdl-textfield__label" for="esp_name_{{$a_esp->id}}">Nombre</label>
                                    </div>
                                </div>
                                <div id="id4_{{$a_esp->id}}" class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
                                    <div id="id5_{{$a_esp->id}}" class="file_upload_container">
                                        <div id="file_upload_text_div_esp_{{$a_esp->id}}" class="file_upload_text_div mdl-textfield mdl-js-textfield">
                                            <input class="file_upload_text mdl-textfield__input mdl-color-text--white mdl-file-input" disabled readonly="" id="file_upload_text_esp_{{$a_esp->id}}" type="text">
                                            <label id="label_esp_{{$a_esp->id}}" class="mdl-textfield__label" for="file_upload_text" style="color:rgba(0,0,0,.54);">{{$a_esp->img_orig_name}}</label>
                                        </div>
                                        <div id="id6_{{$a_esp->id}}" class="file_upload_btn">
                                            <label id="id7_{{$a_esp->id}}" class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-color-text--white">
                                                <i class="material-icons">add_a_photo</i>
                                                <input id="file_upload_btn_esp_{{$a_esp->id}}" class="hidden mdl-file-input form-esp-input" accept="image/*" onchange="cambiarInputText(this)" data-input-text="file_upload_text_esp_{{$a_esp->id}}" data-label="label_esp_{{$a_esp->id}}" name="esp_foto_{{$a_esp->id}}" type="file">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div id="id8_{{$a_esp->id}}" class="mdl-cell mdl-cell--9-col">
                                    <div id="id9_{{$a_esp->id}}" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <textarea id="esp_desc_{{$a_esp->id}}" class="mdl-textfield__input" rows="1" name="esp_desc_{{$a_esp->id}}" cols="50" value=>{{$a_esp->description}}</textarea>
                                        <label id="id10_{{$a_esp->id}}" for="esp_desc_{{$a_esp->id}}" class="mdl-textfield__label">Descripción del objeto especial</label>
                                    </div>
                                </div>

                                <div id="id11_{{$a_esp->id}}" class="mdl-cell mdl-cell--3-col-phone mdl-cell--3-col-tablet mdl-cell--3-col-desktop">
                                    <center>
                                        <span id="removeEsp_{{$a_esp->id}}" class="removeBtn mdl-button mdl-button--fab mdl-button--mini-fab" onclick="removeEsp(this,{{$a_esp->id}})" tabindex="0"><i class="material-icons">close</i>
                                        </span>
                                    </center>
                                </div>

                                @endforeach

                                <div id="especial" class="mdl-cell mdl-cell--12-col">
                                    <center>
                                        <span id="addEsp" class="mdl-button mdl-button--fab mdl-color--primary mdl-color-text--white mdl-button--mini-fab">
                                            <i class="material-icons">add</i>
                                        </span>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mdl-card__menu mdl-color-text--white">
                        {{-- SAVE ICON --}}
                        <span class="save-actions">
                            {!! Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'Pedir Cotización', 'id' => 'submitIcon')) !!}
                        </span>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}

            <div class="mdl-card__supporting-text">
                <div class="mdl-grid full-grid padding-0">
                    <h4 class="mdl-cell mdl-cell--12-col" style="text-align: center;">Fotos</h4>
                    <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                        {!! Form::open(['route' => 'uploadEstimacionImg', 'method' => 'POST', 'files' => 'true', 'class' => 'dropzone', 'id' => 'dropzone']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div id="uploaded" class="mdl-grid full-grid">
                        @foreach($estimacion->fotos as $a_pic)
                        <div class="mdl-cell mdl-cell--6-col-phone mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
                            <div class="file_upload_text_div mdl-textfield mdl-js-textfield">
                                <input class="file_upload_text mdl-textfield__input mdl-color-text--white mdl-file-input" disabled readonly="" type="text">
                                <label class="mdl-textfield__label" for="file_upload_text" style="color:rgba(0,0,0,.54);">{{$a_pic->img_orig_name}}</label>
                            </div>
                            <div  class="delete_pic_btn">
                                <label class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect" onclick="deletePic(this)" data-image="{{$a_pic->id}}">
                                    <i class="material-icons">close</i>
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>                  
            </div>

            <div class="mdl-card__actions padding-top-0">
                <div class="mdl-grid padding-top-0">
                    <div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0 margin-left-1-1">

                        {{-- SAVE BUTTON--}}
                        <span class="save-actions">
                            {!! Form::button('<i class="material-icons">save</i> Pedir Cotización', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--green mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1', 'id' => 'submitBtn')) !!}
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('template_scripts')

@include('scripts.mdl-required-input-fix')

<script type="text/javascript">
    Dropzone.options.dropzone = {
        paramName: "img_est_{{$estimacion->id}}",
        uploadMultiple: true,
        dictDefaultMessage: "Haga click o arraste las imágenes aquí...",
        acceptedFiles: "image/*",
        parallelUploads: 3,
        processing: (file) => {
            let btn = document.querySelector("#submitBtn");
            let icon = document.querySelector("#submitIcon");

            btn.disabled = true;
            icon.disabled = true;
        },
        queuecomplete: () => {
            let btn = document.querySelector("#submitBtn");
            let icon = document.querySelector("#submitIcon");

            btn.disabled = false;
            icon.disabled = false;
            getFotos();
        },
        success: (file, response) => {
            // $(file.previewElement).remove();
        }
    };

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
        if (alMenosNombres()) {
            $('#form').submit();
        }else{
            toastr.error('Debe escribir al menos un nombre para los objetos especiales');
                // event.preventDefault();
            }
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
        $('#estimacion').html(volumen_estimado+' mtrs<sup>3</sup>');

        $('#box_est').text(() => {
            let selects = $('.box_select');
            let box_est = 0;

            for (let i = 0; i < selects.length; i++) {
                if (!selects[i].hasAttribute('disabled')) {
                    box_est += parseInt($(selects[i]).val());
                }
            }
            return box_est;
        });
    };

    function cambiarInputText(obj) {
        let str = obj.value;
        let i;
        if (str.lastIndexOf('\\')) {
            i = str.lastIndexOf('\\') + 1;
        } else if (str.lastIndexOf('/')) {
            i = str.lastIndexOf('/') + 1;
        }
        let fileInputText = document.querySelector('#'+$(obj).attr('data-input-text'));
        fileInputText.value = str.slice(i, str.length);

        $('#'+$(obj).attr('data-label')).css('color', 'rgba(0,0,0,.54)');
        $('#'+$(obj).attr('data-label')).text(fileInputText.value);
    }

    function alMenosNombres() {
        let names = $('.esp_name');
        for (let i = names.length - 1; i >= 0; i--) {
            if ($(names[i]).val() == ''){
                return false;
            }
        }
        return true;
    }

    var next = 0;

    $('#addEsp').click((event)=>{
        event.preventDefault();
        next++;
        let nombre = 'esp_name_'+next;
        let desc = 'esp_desc_'+next;
        let fileUploadDiv = 'file_upload_text_div_esp_'+next;
        let fileIploadTextInput = 'file_upload_text_esp_'+next;
        let fileLabel = 'label_esp_'+next;
        let fileUploadBtn = 'file_upload_btn_esp_'+next;
        let fieldName = 'esp_foto_'+next;
        let removeBtn = 'removeEsp_'+next;
        let ids = ['id1_', 'id2_', 'id3_', 'id4_', 'id5_', 'id6_', 'id7_', 'id8_', 'id9_', 'id10_', 'id11_', 'id12_'];

        for (let i = 0; i < ids.length; i++) {
            ids[i] = ids[i]+next;
        }

        let html = '<div id="';
        html += ids[0];
        html += '" class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop"><div id="';
        html += ids[1];
        html += '" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label"><input id="';
        html += nombre;
        html += '" class="mdl-textfield__input esp_name" name="';
        html += nombre;
        html += '" type="text"><label id="';
        html += ids[2];
        html += '" class = "mdl-textfield__label" for="';
        html += nombre;
        html += '">Nombre</label></div></div><div id="';
        html += ids[3];
        html += '" class="mdl-cell mdl-cell--6-col-tablet mdl-cell--6-col-desktop"><div id ="';
        html += ids[4];
        html += '" class="file_upload_container"><div id="';
        html += fileUploadDiv;
        html += '" class="file_upload_text_div mdl-textfield mdl-js-textfield"><input class="file_upload_text mdl-textfield__input mdl-color-text--white mdl-file-input" type="text" disabled readonly id="';
        html += fileIploadTextInput;
        html += '" /><label id="';
        html += fileLabel;
        html += '" class="mdl-textfield__label" for="file_upload_text">Foto del objeto</label></div><div id="';
        html += ids[5];
        html += '" class="file_upload_btn"><label id="';
        html += ids[6];
        html += '" class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-color-text--white"><i class="material-icons">add_a_photo</i><input id="';
        html += fileUploadBtn;
        html += '" class="hidden mdl-file-input form-esp-input" accept="image/*" onchange="cambiarInputText(this)" data-input-text="';
        html += fileIploadTextInput;
        html += '" data-label="';
        html += fileLabel;
        html += '" name="';
        html += fieldName;
        html += '" type="file"></label></div></div></div><div id="';
        html += ids[7];
        html += '" class="mdl-cell mdl-cell--9-col"><div id="';
        html += ids[8];
        html += '" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label"><textarea id="';
        html += desc;
        html += '" class="mdl-textfield__input" rows="1" name="';
        html += desc;
        html += '" cols="50"></textarea><label id="';
        html += ids[9];
        html +='" for="';
        html += desc;
        html += '" class="mdl-textfield__label">Descripción del objeto especial</label></div></div><div id="';
        html += ids[10];
        html += '" class="mdl-cell mdl-cell--3-col-phone mdl-cell--3-col-tablet mdl-cell--3-col-desktop"><center><span id="';
        html += removeBtn;
        html += '" class="removeBtn mdl-button mdl-button--fab mdl-button--mini-fab" onclick="removeEsp(this,';
        html += next;
        html += ')"><i class="material-icons">close</i></span></center><div id="';
        html += ids[11];
        html += '" class="mdl-tooltip" for="';
        html += removeBtn;
        html += '">Remover objeto especial</div></div>';

        $("#especial").before(html);

        ids.push(nombre, fileUploadDiv, fileIploadTextInput, fileLabel, fileUploadBtn, desc);

        for (var i = ids.length - 1; i >= 0; i--) {
            let item = document.getElementById(ids[i]);
            componentHandler.upgradeElement(item);
        }
    });

function removeEsp(event, id) {
    $('#id1_'+id+', #id4_'+id+', #id8_'+id+', #id11_'+id).remove();
}

function deletePic(that) {
    let id = that.dataset.image;

    $.ajax({
        url: '{{url("app/estimaciones/fotos")}}/'+id, 
        method: 'DELETE',
        data: '_token={{csrf_token()}}',
        success: (res) => {
            console.log(res);
            getFotos();
        }
    });
}

function getFotos() {
    $.get('{{url("app/estimaciones/fotos/$estimacion->id")}}', (data) => {
        let html = '';

        for (i in data){
            html += '<div class="mdl-cell mdl-cell--6-col-phone mdl-cell--4-col-tablet mdl-cell--4-col-desktop"><div class="file_upload_text_div mdl-textfield mdl-js-textfield"><input class="file_upload_text mdl-textfield__input mdl-color-text--white mdl-file-input" disabled readonly="" type="text"><label class="mdl-textfield__label" for="file_upload_text" style="color:rgba(0,0,0,.54);">';
            html += data[i].name;
            html += '</label></div><div  class="delete_pic_btn"><label class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect" onclick="deletePic(this)" data-image="';
            html += data[i].id;
            html += '"><i class="material-icons">close</i></label></div></div>';
        }

        $('#uploaded').empty();
        $('#uploaded').html(html);
    });
}

$(document).ready(() => {
    calculate_estimation();
});

</script>

@endsection

@section('dialog_section')
@include('dialogs.dialog-save')
<div class="backdrop" style="z-index: -100001;"></div>
@endsection