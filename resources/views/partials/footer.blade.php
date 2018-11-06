<footer>
	<section class="shady-bkgd full-width py-2">
		<div class="container-fluid">
			<div id="top-foot" class="clearfix">
				<div id="widget-footer" class="clearfix row">
					<div class="widget col-md-4 py-2">
						<ul class="inline no-margin mb-5">
							<li class="social-media">
								<a href="https://www.facebook.com/BCcampus"><img
										src="@asset('images/icon-facebook.svg')"
										alt="facebook icon"></a>
							</li>
							<li class="social-media">
								<a href="https://twitter.com/bccampus"><img src="@asset('images/icon-twitter.svg')"
																			alt="twitter icon"></a>
							</li>
							<li class="social-media">
								<a href="https://www.flickr.com/photos/61642799@N03/"><img
										src="@asset('images/icon-flickr.svg')" alt="flickr icon"></a>
							</li>
							<li class="social-media">
								<a href="https://www.linkedin.com/company/bccampus"><img
										src="@asset('images/icon-linkedin.svg')" alt="linkedin icon"></a>
							</li>
							<li class="social-media">
								<a href="https://video.bccampus.ca/"><img src="@asset('images/icon-kaltura.svg')"
																		  alt="kaltura icon"></a>
							</li>
						</ul>
						<a class="brand" href="{{ site_url('/') }}">
							<img src="@asset('images/bccampus-logo.png')" alt="Logo for BCcampus"/></a>
					</div>
					@if(has_nav_menu('footer_navigation_1'))
						<nav class="widget col-md-4 py-2">
							<h4>Quick Links</h4>
							{!! wp_nav_menu(['theme_location' => 'footer_navigation_1', 'menu' => 'Footer Navigation', 'menu_class' => 'menu nav flex-column', 'depth' => 0 ] ) !!}
						</nav>
					@endif
					<div class="col-md-4 py-2">
						@include('partials.subscribe')
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="black-bkgd full-width">
		<div id="bottom-foot" class="clearfix container-fluid">
			<div class="d-flex flex-row flex-nowrap">
				<div class="col-md-8">
					<p class="copyright"><a itemprop="license" class="pull-left" rel="license"
											href="https://creativecommons.org/licenses/by/4.0/">
							<img alt="Creative Commons License" src="https://i.creativecommons.org/l/by/4.0/88x31.png"/></a>
							Except where otherwise noted, content on this site is licensed under a
							<a rel="license" href="https://creativecommons.org/licenses/by/4.0/">Creative Commons
								Attribution 4.0 International License</a>.
					</p>
				</div>
				<div class="col-md-4 d-flex justify-content-end">
					@if(has_nav_menu('footer_navigation_2'))
						<nav class="footer-links horizontal">
							{!! wp_nav_menu( ['theme_location' => 'footer_navigation_2', 'menu' => 'Footer Horizontal Navigation', 'menu_class' => 'menu', 'link_after' => '', 'depth' => 0 ] ) !!}
						</nav>
					@endif
				</div>
			</div>
		</div>
	</section>
</footer>
