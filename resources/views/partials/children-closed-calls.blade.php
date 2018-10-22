<h4 class="pt-5">Currently Closed Opportunities</h4>
<p>Some programs are made available on an as-needed basis, and may be open or closed at different points of the year. Please check back to see if a program you’re interested in is currently available.</p>
<section class="grants d-flex flex-row flex-wrap">
	@php
		$parent = get_theme_mod('grants_closed_setting', '' );
	@endphp
	@if ($parent !== '')
		@foreach(\App\Page::getChildrenOfPage( $parent ) as $child)
			@php
				$link = site_url() . '/' . $child->post_name;
			@endphp
			<article class="grants-closed col-md-6 my-2" itemscope
					 itemtype="http://schema.org/Article">
				<div class="featured-grant row-fluid d-flex"
					 style="background-image: url({{\App\App::getThumbUrl($child->ID)}});">
					<h4 class="text-center purple-bkgd text-inverse col-sm mt-auto"><a
							href="{{$link}}">{{wp_specialchars_decode($child->post_title)}}</a>
					</h4>
				</div>
				<div class="row-fluid border min-height-md">
					<p class="pt-3 px-2"><?php echo wp_trim_words( $child->post_content, '30', "<a href='{$link}'>&hellip;<i class='fa fa-arrow-right'></i></a>" ); ?></p>
				</div>
			</article>
		@endforeach
	@endif
</section>
