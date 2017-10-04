<header class="banner">
  <div class="container-fluid">
    <nav class="navbar navbar-light bg-faded rounded navbar-expand-md primary_navigation">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
              data-target="#containerNavbar" aria-controls="containerNavbar" aria-expanded="false"
              aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="{{ home_url('/') }}"><img src="@asset('images/bccampus-logo.png')" alt="Logo for BCcampus"> </a>

      <div class="collapse navbar-collapse" id="containerNavbar">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'menu' => 'Primary Navigation',
          'menu_class' => 'navbar-nav mr-auto',
          'depth' => 3,
          'echo' => true,
          'fallback_cb' => '__return_empty_string',
          'walker' => $nav_walker ]) !!}
        @endif
      </div>
      {{--<form class="form-inline my-2 my-md-0 input-group" role="search" method="get" action="{{ home_url( '/' ) }}">--}}
        {{--<input type="text" class="form-control mr-sm-2" placeholder="{{ __('Search', 'bcc-sage' ) }}" name="s">--}}
        {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{ __( 'Go!', 'bcc-sage' ) }}</button>--}}
      {{--</form>--}}
    </nav>
    @if( ! is_front_page() )
      <nav class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        @foreach ( $bread_crumbs as $key => $item )
          @if ( empty( $item['link'] ) )
            <span class="breadcrumb-item" itemscope itemtype="http://schema.org/Thing"
                  itemprop="item">{{ esc_html( $item['title'] ) }}</span>
          @else
            <a class="breadcrumb-item" itemscope itemtype="http://schema.org/Thing" itemprop="item"
               href="{{ esc_url( $item['link'] ) }}">{{ esc_html( $item['title'] ) }}</a>
          @endif
        @endforeach
      </nav>
    @endif

  </div>
</header>
