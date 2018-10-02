@php
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
@endphp
<section class="py-3">
	<header>
	<h5 class="text-uppercase purple">Upcoming</h5>
	</header>
	@foreach(\App\App::getLatestNews( $args ) as $recent )
		<article class="events-upcoming my-1 border" itemscope itemtype="http://schema.org/Article">
			<div class="row pad-left">
				<div class="col-sm-2 events-image-box" style="background-image: url({{\App\App::getThumbUrl($recent->ID)}});">
				</div>
				<div class="col-sm-10">
					<p class="text-uppercase pt-2"><time itemprop="datePublished" datetime="{{ get_post_time('c', true, $recent->ID) }}">{{ get_the_date('',$recent->ID) }}</time></p>
					<h4><a class="purple" href="@php echo esc_url( $recent->guid ); @endphp">{{ $recent->post_title }}</a></h4>
				</div>
			</div>
		</article>
	@endforeach
</section>
