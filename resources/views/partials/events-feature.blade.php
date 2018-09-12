@php(
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
])
<section class="pad-top featured-news-front">
	<header>
@if(is_front_page())
	<h3>Events <img src="@asset('images/green-dots.png')" alt="decorative green dots">
		<small><a href="{{site_url()}}/events">view all events</a></small>
	</h3>
	</header>
@endif
	<div class="featured-events-front d-flex flex-row flex-wrap">
	@foreach(\App\App::getLatestNews( $args ) as $recent )
		<article class="events-box-md col-sm d-flex no-gutters px-md-1">
			<div class="featured-event col-sm d-flex" style="background-image: url({{\App\App::getThumbUrl($recent->ID)}});">
				@if(is_page('events'))
					<h4 class="purple-bkgd halfsies col-sm mt-auto">
						@else
							<h4 class="purple-bkgd col-sm mt-auto">
								@endif
					<time itemprop="datePublished" class="updated upper" datetime="{{ get_post_time('c', true, $recent->ID) }}">{{ get_the_date('',$recent->ID) }}</time>
					<br><a class="text-inverse" href="@php echo esc_url( $recent->guid ); @endphp">{{ $recent->post_title }}</a></h4>
					</h4>
			</div>
		</article>
	@endforeach
	</div>
</section>

