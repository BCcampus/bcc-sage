<header class="banner">
  <div class="container-fluid">
    <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded primary_navigation">

      <div class="navbar-collapse" id="navbarNav">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu([
          'menu' => 'primary_navigation',
          'theme_location' => 'primary_navigation',
          'depth' => 3,
          'container' => 'div',
          'container_class' => 'navbar-collapse',
          'menu_class' => 'navbar-nav',
          'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
          'walker' => \App\App::navWalker() ]) !!}
        @endif
      </div>
    </nav>
    @if( ! is_front_page() )
      <nav class="breadcrumb">
        <a class="breadcrumb-item" href="{{ esc_url( home_url() )}}">Home</a>

        @if (is_category())
          <span class="breadcrumb-item">{{ single_cat_title( '', false ) }}</span>
        @endif

        @if (is_single())
          @foreach( get_the_category() as $cat )
            <a class="breadcrumb-item" href="{{ get_category_link( $cat->term_id ) }}"> {{ $cat->name }}</a>
          @endforeach
        @endif

        @if (is_page())
          @if( $post->post_parent )
            <a class="breadcrumb-item"
               href="{{ get_permalink( $post->post_parent ) }}">{{ get_the_title( $post->post_parent ) }}</a>
          @endif
          <span class="breadcrumb-item">{{ get_the_title() }}</span>
        @endif
      </nav>
    @endif

  </div>
</header>
