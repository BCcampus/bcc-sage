<header class="banner">
	<div class="container-fluid">
		<div class="navbar d-flex flex-row flex-wrap no-gutters">
			<div class="py-2 col-md-4"><a class="navbar-brand" href="{{ site_url('/') }}">
					<img srcset="@asset('images/bccampus-logo-x2.png') 2x" src="@asset('images/bccampus-logo-tagline.png')" alt="Logo for BCcampus"></a>
			</div>
			<div class="p-2 col-md-6 justify-content-end shady-bkgd-md">
				<nav class="navbar navbar-light bg-faded rounded navbar-expand-md header_navigation">
				<div id="containerNavbar1">
					@if (has_nav_menu('header_navigation'))
						{!! wp_nav_menu([
                        'theme_location' => 'header_navigation',
                        'menu' => 'Header Navigation',
                        'menu_class' => 'navbar-nav ml-auto',
                        'depth' => 1,
                        'echo' => true,
                        'fallback_cb' => '__return_empty_string',
                        'walker' => $nav_walker ]) !!}
					@endif
				</div>
			</nav>
			</div>
			<div class="p-2 col-md-2 shady-bkgd-md">
				{{get_search_form()}}
			</div>
		</div>
			<nav class="navbar navbar-light bg-faded rounded navbar-expand-md primary_navigation navbar-megamenu shady-bkgd-md px-sm-2">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
						data-target="#containerNavbar2" aria-controls="containerNavbar2" aria-expanded="false"
						aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="containerNavbar2">
					@if (has_nav_menu('primary_navigation'))
						{!! wp_nav_menu([
                        'theme_location' => 'primary_navigation',
                        'menu' => 'Primary Navigation',
                        'container_class' => 'navbar-collapse justify-content-end',
                    	'menu_class' => 'nav navbar-nav',
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
