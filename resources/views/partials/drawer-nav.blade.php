<div class="demo-drawer mdl-layout__drawer mdl-color--cyan-indigo-900 mdl-color-text--cyan-indigo-50">
	<a href="{{ url('/app') }}" class="dashboard-logo mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--primary mdl-color-text--white">
		<!-- Laravel
			<i class="material-icons " role="presentation">whatshot</i>
			Material --> {{ Lang::get('titles.app') }}
		</a>
		<header class="demo-drawer-header">
			<div class="mdl-user-avatar" style="position: inherit; text-align: center;">
				@if(\Auth::user()->profile->profile_pic != NULL)
				<img src="{{ url(\Auth::user()->profile->profile_pic) }}" alt="{{ \Auth::user()->last_name }}">
				@else
				<i class="material-icons mdl-list__item-avatar">face</i>
				@endif
				<span itemprop="image" style="display:none;">{{ Gravatar::get(\Auth::user()->email) }}</span>
			</div>
			<div class="demo-avatar-dropdown">
				<span>
					{{ Auth::user()->first_name.' '.Auth::user()->last_name }}
				</span>
				<div class="mdl-layout-spacer"></div>
				@include('partials.account-nav')
			</div>
		</header>

		<nav class="demo-navigation mdl-navigation mdl-color--cyan-indigo-800">

			<a class="mdl-navigation__link" href="{{ url('/app') }}" title="{{ Lang::get('titles.app') }}">
				<i class="mdl-color-text--cyan-indigo-400 material-icons" role="presentation">home</i>
				{{ Lang::get('titles.home') }}
			</a>
			<!--   -->

			@if (!Auth::guest() && Auth::user()->hasRole('administrador'))
			<a class="mdl-navigation__link" href="{{ url('app/users') }}">
				<i class="mdl-color-text--cyan-indigo-400 material-icons mdl-badge mdl-badge--overlap users_badge" data-badge="{{ $totalUsers }}" role="presentation">contacts</i>
				{{ Lang::get('titles.adminUserList') }}
			</a>
			@endif

			@if(!Auth::guest() && (Auth::user()->hasRole('logistica') || Auth::user()->hasRole('ventas') || Auth::user()->hasRole('administrador') || Auth::user()->hasRole('coordinacion')))
			<a class="mdl-navigation__link" href="{{ url('app/clientes') }}">
				<i class="mdl-color-text--cyan-indigo-400 material-icons" role="presentation">portrait</i>
				<!-- {{ Lang::get('titles.adminUserList') }} -->
				Clientes
			</a>
			@endif

			@if (!Auth::guest() && (Auth::user()->hasRole('coordinacion') || Auth::user()->hasRole('administrador')))
			<a class="mdl-navigation__link" href="{{ url('app/rooms') }}">
				<i class="mdl-color-text--cyan-indigo-400 material-icons" role="presentation">domain</i>
				<!-- {{ Lang::get('titles.adminUserList') }} -->
				Cuartos
			</a>

			<a class="mdl-navigation__link" href="{{ url('app/objects') }}">
				<i class="mdl-color-text--cyan-indigo-400 material-icons" role="presentation">weekend</i>
				<!-- {{ Lang::get('titles.adminUserList') }} -->
				Objetos
			</a>

			<a class="mdl-navigation__link" href="{{ url('app/boxes') }}">
				<i class="mdl-color-text--cyan-indigo-400 material-icons" role="presentation">border_all</i>
				<!-- {{ Lang::get('titles.adminUserList') }} -->
				Cajas
			</a>
			@if (!Auth::guest() && Auth::user()->hasRole('administrador'))
			<a class="mdl-navigation__link" href="{{ url('app/paises') }}">
				<i class="mdl-color-text--cyan-indigo-400 material-icons" role="presentation">public</i>
				<!-- map, public -->
				<!-- {{ Lang::get('titles.adminUserList') }} -->
				Países
			</a>
			@endif
			@endif

			@if(!Auth::guest())
			<a class="mdl-navigation__link" href="{{ url('app/estimaciones') }}">
				<i class="mdl-color-text--cyan-indigo-400 material-icons" role="presentation">event_note</i>
				<!-- {{ Lang::get('titles.adminUserList') }} -->
				Estimaciones
			</a>
			@endif

			<div class="mdl-layout-spacer"></div>

		</nav>
	</div>