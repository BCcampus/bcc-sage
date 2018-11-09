<h4 class="pt-5">Currently Closed Opportunities</h4>
<p>Some programs are made available on an as-needed basis, and may be open or closed at different points of the year. Please check back to see if a program you’re interested in is currently available.</p>
<section class="grants d-flex flex-row flex-wrap">
	@php
		$parent = get_theme_mod('grants_closed_setting', '' );
	@endphp
	@if ($parent !== '')
		@foreach(\App\Page::getChildrenOfPage( $parent ) as $child)
			@php($link=\App\App::maybeGuid($child->ID, $child->post_name))
			<article class="grants-closed col-md-6 my-2" itemscope
					 itemtype="http://schema.org/Article">
				<a href="{{$link}}" class="img-link">
				<div class="featured-grant row-fluid d-flex"
					 style="background-image: url({{\App\App::getThumbUrl($child->ID)}});">
					<h4 itemprop="name" class="text-center purple-bkgd text-inverse col-sm mt-auto">{{wp_specialchars_decode($child->post_title)}}
					</h4>
				</div>
				</a>
				<div class="row-fluid border min-height-md">
					<p class="pt-3 px-2">{!! \App\App::maybeExcerpt($child->ID,$child->post_content,$link,25) !!}</p>
				</div>
				<meta itemprop="datePublished" content="{{ get_post_time('c', true, $child->ID) }}"/>
				<meta itemprop="headline" content="{!! $child->post_title !!}"/>
				<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
				<meta itemprop="name" content="BCCampus"/>
				<span itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
					<meta itemprop="url" content="https://bccampus.ca/wp-content/themes/bcc-sage/dist/images/bccampus-logo.png"/>
				</span>
			</span>
			</article>
		@endforeach
	@endif
</section>
