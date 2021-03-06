@extends('dashboard')

@section('template_title')
Detalle de caja
@endsection

@section('template_fastload_css')

@endsection

@section('header')
Detalle de caja
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
	<a itemprop="item" href="{{ url('app/boxes') }}">
		<span itemprop="name">
			Cajas
		</span>
	</a>
	<i class="material-icons">chevron_right</i>
	<meta itemprop="position" content="2" />
</li>
<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	<a itemprop="item" href="#">
		<span itemprop="name">
			Detalle
		</span>
	</a>
	<meta itemprop="position" content="3" />
</li>
@endsection

<div class="mdl-grid full-grid margin-top-0 padding-0">
	<div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
		<div class="mdl-card card-new-user" style="width:100%;" itemscope itemtype="http://schema.org/Person">

			<div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
				<h2 class="mdl-card__title-text">Detalle de caja</h2>
			</div>

			<div class="mdl-card card-wide" style="width:100%;" itemscope itemtype="http://schema.org/Person">
				<div class="mdl-card__supporting-text">
					<div class="mdl-grid full-grid padding-0">
						<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

							<div class="mdl-grid ">

								<div class="mdl-cell mdl-cell--12-col">
									<label class="mdl-color-text--indigo">Nombre: </label>
									{{ucfirst($box->name)}}
								</div>

								<div class="mdl-cell mdl-cell--3-col">
									<label class="mdl-color-text--indigo">Unidad: </label>
									{{$box->unit}}
								</div>

								<div class="mdl-cell mdl-cell--3-col">
									<label class="mdl-color-text--indigo">Valor mínimo: </label>
									{{$box->vmin}}
								</div>

								<div class="mdl-cell mdl-cell--3-col">
									<label class="mdl-color-text--indigo">Valor máximo: </label>
									{{$box->vmax}}
								</div>

								<div class="mdl-cell mdl-cell--3-col">
									<label class="mdl-color-text--indigo">Factor: </label>
									{{$box->factor}}
								</div>

								<div class="mdl-cell mdl-cell--12-col">
									<label class="mdl-color-text--indigo">Cuartos: </label>
									<div class="mdl-grid">
										@foreach($box->rooms as $room)
										<div class="mdl-cell mdl-cell--3-col">
											{{ucfirst($room->name)}}
										</div>
										@endforeach
									</div>
								</div>

								<div class="mdl-cell mdl-cell--12-col">
									<label class="mdl-color-text--indigo">Texto de ayuda: </label>
									{{$box->tooltip}}
								</div>

								<div class="mdl-cell mdl-cell--12-col">
									<label class="mdl-color-text--indigo">Descripción: </label>
									<br>
									{{$box->description}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

@endsection