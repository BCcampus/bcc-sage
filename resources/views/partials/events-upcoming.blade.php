<?php
$args = [
	'posts_per_page' => 3,
	'post_type'      => 'ai1ec_event',
	'tax_query'      => [
		[
			'taxonomy' => 'events_categories',
			'field'    => 'name',
			'terms'    => 'featured',
			'operator' => 'NOT IN',
		],
	],
];
;?>
<section class="pad-top">
	<header>
	<h4>Upcoming</h4>
	</header>
	@foreach(\App\App::getLatestNews( $args ) as $recent )
		<?php
		// not using $child->guid since guid does not
		// update to current domain when importing content
		$link = site_url() . '/' . $recent->post_name;
		?>
		<article class="events-upcoming my-1 border" itemscope itemtype="http://schema.org/Article">
			<div class="row pad-left">
				<div class="col-sm-2 events-image-box" style="background-image: url({{\App\App::getThumbUrl($recent->ID)}});">
				</div>
				<div class="col-sm-10">
					<p class="upper"><time itemprop="datePublished" class="updated" datetime="{{ get_post_time('c', true, $recent->ID) }}">{{ get_the_date('',$recent->ID) }}</time></p>
					<h4><a class="purple" href="{{$link}}">{{$recent->post_title}}</a></h4>
				</div>
			</div>
		</article>
	@endforeach
</section>
