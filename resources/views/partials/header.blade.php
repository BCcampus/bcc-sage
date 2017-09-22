<header class="banner">
    <div class="container-fluid">
        <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
        <nav class="nav-primary navbar navbar-toggleable-md navbar-light bg-faded">
            @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-nav mr-auto', 'container' => 'collapse navbar-collapse']) !!}
            @endif
        </nav>
        <nav class="breadcrumb">
            @if (is_category())
                {!! BreadCrumbs::catCrumb() !!}
            @endif
            @if (is_single())
                {!! BreadCrumbs::postCrumb() !!}
            @endif
            @if (is_page())
                {!! BreadCrumbs::pageCrumb() !!}
            @endif
        </nav>
    </div>
</header>
