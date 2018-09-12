<?php
$cat = get_the_category( $post->ID );
$args = [
	'posts_per_page' => 2,
	'post_type'      => 'ai1ec_event',
	'orderby'        => 'rand',
	'tax_query'      => [
		[
			'taxonomy' => 'events_categories',
			'field'    => 'name',
			'terms'    => 'featured',
		],
	],
];
; ?>
<section class="pad-top featured-news-front">
	<header>
	<h3>Events <img src="@asset('images/green-dots.png')" alt="decorative green dots">
		<small><a href="{{site_url()}}/calendar">view all events</a></small>
	</h3>
	</header>
	<div class="d-flex flex-row flex-wrap mb-2 no-gutters">
	@foreach(\App\App::getLatestNews( $args ) as $recent )
		<article class="col no-gutters px-md-1">
			<div class="featured-event col d-flex" style="background-image: url({{\App\App::getThumbUrl($recent->ID)}});">
				<h4 class="purple-bkgd col mt-auto">
					<time itemprop="datePublished" class="updated upper" datetime="{{ get_post_time('c', true, $recent->ID) }}">{{ get_the_date('',$recent->ID) }}</time>
					<br><a class="text-inverse" href="{{ $recent->guid }}">{{ $recent->post_title }}</a></h4>
			</div>
		</article>
	@endforeach
	</div>
</section>

