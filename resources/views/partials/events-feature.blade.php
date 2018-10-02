@php
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
@endphp
<section class="mt-3">
	@if(is_front_page())
		<header>
			<h3>Events <img class="mx-2 mb-1" src="@asset('images/green-dots.png')" alt="decorative green dots">
				<small><a href="{{site_url()}}/events">view all events</a></small>
			</h3>
		</header>
	@endif
	<div class="featured-event d-flex flex-row flex-wrap">
		@foreach(\App\App::getLatestNews( $args ) as $recent )
			<article class="events-box-md col-sm-6 no-gutters px-md-1">
				<div class="featured-event row-fluid d-flex"
					 style="background-image: url({{\App\App::getThumbUrl($recent->ID)}});">
					<div class="purple-bkgd col-sm mt-auto">
						<h4 class="text-inverse">
							<time itemprop="datePublished" class="text-uppercase"
								  datetime="{{ get_post_time('c', TRUE, $recent->ID) }}">{{ get_the_date('',$recent->ID) }}</time>
							<br><a href="@php echo esc_url( $recent->guid ); @endphp">{{ $recent->post_title }}</a>
						</h4>
					</div>
				</div>
			</article>
		@endforeach
	</div>
</section>

