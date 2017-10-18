<footer class="content-info">
  <div id="top-foot" class="clearfix container-fluid">
    <div id="widget-footer" class="clearfix row">
      @if(has_nav_menu('footer_navigation_1'))
        <nav class="widget col-sm-3">
          <h4>Lines of Service</h4>
          {!! wp_nav_menu( ['theme_location' => 'footer_navigation_1', 'menu' => 'Footer Primary Navigation', 'menu_class' => 'menu nav flex-column', 'depth' => 0 ] ) !!}
        </nav>
      @endif
      @if(has_nav_menu('footer_navigation_2'))
        <nav class="widget col-sm-3">
          <h4>BCcampus</h4>
          {!! wp_nav_menu(['theme_location' => 'footer_navigation_2', 'menu' => 'Footer Secondary Navigation', 'menu_class' => 'menu nav flex-column', 'depth' => 0 ] ) !!}
        </nav>
      @endif
      @php(dynamic_sidebar('footer-3'))
    </div>
  </div>
  <div id="bottom-foot">
    <div class="clearfix container-fluid row">
      <div class="col-sm-4">
        <p class="copyright"><a itemprop="license" class="pull-left" rel="license" href="https://creativecommons.org/licenses/by/4.0/">
            <img alt="Creative Commons License" src="https://i.creativecommons.org/l/by/4.0/88x31.png"/></a>
          <small>
            Except where otherwise noted, content on this site is licensed under a
            <a rel="license" href="https://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>.
          </small>
        </p>
        @if(has_nav_menu('footer_navigation_3'))
          <nav class="footer-links horizontal">
            {!! wp_nav_menu( ['theme_location' => 'footer_navigation_3', 'menu' => 'Footer Horizontal Navigation', 'menu_class' => 'menu', 'link_after' => '&nbsp;|&nbsp;', 'depth' => 0 ] ) !!}
          </nav>
        @endif
      </div>
      <div class="col-sm-4">
        <p class="attribution muted">&copy; {{bloginfo('name')}} {{date('Y')}}</p>
      </div>
      <div class="col-sm-4">
        <img class="pull-right" width="131" height="49" alt="Logo for BCcampus" src="@asset('images/bccampus-logo-sm.png')">
      </div>

    </div>
  </div>
</footer>
