<footer class="content-info">
    <div id="top-foot" class="clearfix container-fluid">
      <div id="widget-footer" class="clearfix row-fluid">
        @if(has_nav_menu('footer_navigation_1'))
          <nav class="widget col-sm-3" role="navigation">
            <h4>BCcampus Services</h4>
            {!! wp_nav_menu( [
            'theme_location' => 'footer_navigation_1',
            'menu' => 'footer_navigation_1',
            'container' => 'nav',
            'container_class' => 'widget col-sm-3',
            'container_id' => '',
            'menu_class' => 'menu nav flex-column',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'item_spacing' => 'preserve',
            'depth' => 0 ] ) !!}
          </nav>
        @endif
        @if(has_nav_menu('footer_navigation_2'))
          <nav class="widget col-sm-3" role="navigation">
            <h4>BCcampus</h4>
            {!! wp_nav_menu([
            'theme_location' => 'footer_navigation_2',
            'menu' => 'footer_navigation_2',
            'container' => 'nav',
            'container_class' => 'widget col-sm-3',
            'container_id' => '',
            'menu_class' => 'menu nav flex-column',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'item_spacing' => 'preserve',
            'depth' => 0 ] ) !!}
          </nav>
        @endif
        @php(dynamic_sidebar('footer-3'))
      </div>
    </div>
    <div id="bottom-foot">
      <div class="clearfix container-fluid">
        <p class="copyright pull-left">
          <a class="pull-left" rel="license" href="https://creativecommons.org/licenses/by/4.0/">
            <img alt="Creative Commons License" src="https://i.creativecommons.org/l/by/4.0/88x31.png"/></a>
          <small>
            Except where otherwise noted, content on this site is licensed under a <a rel="license"
                                                                                      href="https://creativecommons.org/licenses/by/4.0/">Creative
              Commons Attribution 4.0 International License</a>.
          </small>
        </p>
        <img class="pull-right" width="131" height="49" alt="Logo for BCcampus"
             src="@asset('images/bccampus-logo-sm.png')">
        @if(has_nav_menu('footer_navigation_3'))
          <nav class="footer-links menu widget col-sm-3" role="navigation">
            {!! wp_nav_menu( [
            'theme_location' => 'footer_navigation_3',
            'menu' => 'footer_navigation_3',
            'container' => 'nav',
            'container_class' => 'footer-links menu widget col-sm-3',
            'container_id' => '',
            'menu_class' => 'menu',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '&nbsp;|&nbsp;',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'item_spacing' => 'preserve',
            'depth' => 0 ] ) !!}
          </nav>
        @endif
        <p class="attribution muted">&copy; {{bloginfo('name')}} {{date('Y')}}</p>
      </div>
    </div>
</footer>
