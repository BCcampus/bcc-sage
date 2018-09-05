<footer class="content-info container-fluid">
	<div id="top-foot" class="clearfix">
		<div id="widget-footer" class="clearfix row">
			<div class="widget col-sm-4">
				<ul class="inline no-margin">
					<li class="social-media">
						<a href="https://www.facebook.com/BCcampus"><img src="@asset('images/icon-facebook.svg')" alt="facebook icon"></a>
					</li>
					<li class="social-media">
						<a href="https://twitter.com/bccampus"><img src="@asset('images/icon-twitter.svg')" alt="twitter icon"></a>
					</li>
					<li class="social-media">
						<a href="https://www.flickr.com/photos/61642799@N03/"><img src="@asset('images/icon-flickr.svg')" alt="flickr icon"></a>
					</li>
					<li class="social-media">
						<a href="https://www.linkedin.com/company/bccampus"><img src="@asset('images/icon-linkedin.svg')" alt="linkedin icon"></a>
					</li>
					<li class="social-media">
						<a href="https://video.bccampus.ca/"><img src="@asset('images/icon-kaltura.svg')" alt="kaltura icon"></a>
					</li>
				</ul>
				<a class="brand" href="{{ site_url('/') }}">
					<img src="@asset('images/bccampus-logo.png')" alt="Logo for BCcampus"/></a>
			</div>
			@if(has_nav_menu('footer_navigation_1'))
				<nav class="widget col-sm-4">
					<h4>Quick Links</h4>
					{!! wp_nav_menu(['theme_location' => 'footer_navigation_1', 'menu' => 'Footer Navigation', 'menu_class' => 'menu nav flex-column', 'depth' => 0 ] ) !!}
				</nav>
			@endif
			<div class="col-sm-4">
				@include('partials.subscribe')
			</div>
		</div>
	</div>
	<div id="bottom-foot" class="clearfix container-fluid">
		<div class="d-flex flex-row flex-nowrap">
			<div class="col-sm-8 p-2">
				<p class="copyright"><a itemprop="license" class="pull-left" rel="license"
										href="https://creativecommons.org/licenses/by/4.0/">
						<img alt="Creative Commons License" src="https://i.creativecommons.org/l/by/4.0/88x31.png"/></a>
					<small>
						Except where otherwise noted, content on this site is licensed under a
						<a rel="license" href="https://creativecommons.org/licenses/by/4.0/">Creative Commons
							Attribution 4.0 International License</a>.
					</small>
				</p>
			</div>
			<div class="col-sm-4 p-2">
				@if(has_nav_menu('footer_navigation_2'))
					<nav class="footer-links horizontal">
						{!! wp_nav_menu( ['theme_location' => 'footer_navigation_2', 'menu' => 'Footer Horizontal Navigation', 'menu_class' => 'menu', 'link_after' => '&nbsp;|&nbsp;', 'depth' => 0 ] ) !!}
					</nav>
				@endif
			</div>
		</div>
	</div>
</footer>
