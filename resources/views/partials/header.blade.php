<header class="banner">
  <div class="container-fluid">
    <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    <nav class="nav-primary navbar navbar-toggleable-md navbar-light bg-faded">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-nav mr-auto', 'container' => 'collapse navbar-collapse']) !!}
      @endif
    </nav>
    @if( ! is_front_page() )
      <nav class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        @foreach ( \App\App::breadCrumbs() as $key => $item )
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
