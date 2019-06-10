<footer>
	<section class="shady-bkgd full-width py-2">
		<div class="container-fluid">
			<div id="top-foot" class="clearfix">
				<div id="widget-footer" class="clearfix row">
					<div class="widget col-md-4 py-2">
						<h4>Connect With Us</h4>
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
						@include('partials.subscribe')
					</div>
					@if(has_nav_menu('footer_navigation_1'))
						<nav class="widget col-md-4 py-2">
							<h4>Quick Links</h4>
							{!! wp_nav_menu(['theme_location' => 'footer_navigation_1', 'menu' => 'Footer Navigation', 'menu_class' => 'menu nav flex-column', 'depth' => 0 ] ) !!}
						</nav>
					@endif
					<div class="col-md-4 py-2">
						<h4>Acknowledgement</h4>
						<p class="acknowledgement">For thousands of years the Coast Salish, Lkwungen, and W̱SÁNEĆ Peoples have walked gently on the unceded territories where we now live, work, and play. We are committed to building relationships with the first peoples here, one based in honour and respect, and we thank them for their hospitality.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="black-bkgd full-width">
		<div id="bottom-foot" class="clearfix container-fluid">
			<div class="d-flex flex-row flex-nowrap">
				<div class="col-md-8">
					<p class="copyright">
					<a itemprop="license" class="pull-left" rel="license"
											href="https://creativecommons.org/licenses/by/4.0/">
							<img alt="Creative Commons License" src="https://i.creativecommons.org/l/by/4.0/88x31.png"/></a>
							Except where otherwise noted, content on this site is licensed under a
							<a rel="license" href="https://creativecommons.org/licenses/by/4.0/">Creative Commons
								Attribution 4.0 International Licence</a>.
					</p>
				</div>
				<div class="col-md-4 d-flex justify-content-end">
					@if(has_nav_menu('footer_navigation_2'))
						<nav class="footer-links horizontal">
							{!! wp_nav_menu( ['theme_location' => 'footer_navigation_2', 'menu' => 'Footer Horizontal Navigation', 'menu_class' => 'menu', 'link_after' => '&nbsp;&nbsp;', 'depth' => 0 ] ) !!}
						</nav>
					@endif
				</div>
			</div>
		</div>
	</section>
</footer>
