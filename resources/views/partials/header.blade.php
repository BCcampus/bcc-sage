<header class="banner">
	<div class="container-fluid">
		<div class="brand"><a class="navbar-brand" href="{{ home_url('/') }}"><img
					src="@asset('images/bccampus-logo.png')" alt="Logo for BCcampus"> </a></div>
		{{--<div class="pull-right">{{get_search_form()}}</div>--}}
		<nav class="navbar navbar-light bg-faded rounded navbar-expand-md primary_navigation navbar-megamenu">
			<button class="navbar-toggler navbar-toggler-right p-2" type="button" data-toggle="collapse"
					data-target="#containerNavbar" aria-controls="containerNavbar" aria-expanded="false"
					aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="containerNavbar">
				@if (has_nav_menu('primary_navigation'))
					{!! wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'menu' => 'Primary Navigation',
                    'menu_class' => 'nav navbar-nav mr-auto',
                    'depth' => 3,
                    'echo' => TRUE,
                    'fallback_cb' => '__return_empty_string',
                    'walker' => $nav_walker ]) !!}
				@endif
			</div>
		</nav>
	</div>
	@if (is_front_page())
		<div class="container-fluid slider">
			{!! $get_slider_id !!}
		</div>
	@endif
</header>
