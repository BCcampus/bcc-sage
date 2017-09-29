<section class="row col-sm-12 clearfix border-bottom no-gutters" role="main">

  <div class="col-xs-12 col-sm-8 col-md-7 clearfix no-gutters">
    <div class="row clearfix">
      <div class="col-xs-12 col-sm-6 col-md-4 darker-grey text-inverse height-5">
        <div class="vertical-align barbs-special-sauce">
          @if(has_nav_menu('footer_navigation_1'))
            <nav>
              <h4>Lines of Service</h4>
              {!! wp_nav_menu( ['theme_location' => 'footer_navigation_1', 'menu' => 'Footer Primary Navigation', 'menu_class' => 'text-inverse menu nav flex-column', 'depth' => 0 ] ) !!}
            </nav>
          @endif
          <p><a href="/services/">Learn more</a> <i class="fa fa-inverse fa-arrow-right fa-lg"></i></p>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-8 no-gutters">
        <div class="row bcc-otb-project height-3" onclick="location.href = '/open-textbook-project/';"
             style="cursor: pointer;">
          <div class="bg"></div>
          <div class="barbs-special-sauce">
            <h3>B.C. Open Textbook Project</h3>
            <p><a href="/open-textbook-project/">Learn more</a> <i class="fa fa-arrow-right fa-lg"></i></p>
          </div>
        </div>
        <div class="row bcc-upcoming-events height-2" onclick="location.href = '/calendar/';"
             style="cursor: pointer;">
          <div class="bg"></div>
          <div class="barbs-special-sauce bottom-align text-inverse">
            <h3>Upcoming Events!<br>
              <small><a href="/calendar/">Learn more</a> <i class="fa fa-inverse fa-arrow-right fa-lg"></i></small>
            </h3>
          </div>
        </div>
      </div>
    </div>
    @include('partials.latest-news')
  </div>
  <div class="col-xs-12 col-sm-4 col-md-5 clearfix diagonal height-7 no-gutters">
    <div class="barbs-special-sauce">
      <div id="circle" onclick="location.href = '/about-us/';" style="cursor: pointer;">
        <h2><a role="button" href="/about-us/">What<br>We Do</a></h2>
      </div>
    </div>
  </div>

</section> <!-- end #main -->
