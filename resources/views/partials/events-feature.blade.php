<?php
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
@if(is_front_page())
<div class="pad">
	<h3>Events <img src="@asset('images/green-dots.png')" alt="decorative green dots">
		<small><a href="/events">view all events</a></small>
	</h3>
</div>
@endif
<section class="featured-events-front d-flex flex-row flex-wrap">
	@foreach(\App\App::getLatestNews( $args ) as $recent )
		<?php
		$date = date( 'M d, Y', strtotime( $recent->post_date ) );
		if ( has_post_thumbnail( $recent->ID ) ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $recent->ID ), 'single-post-thumbnail' );
		} else {
			$image[] = get_stylesheet_directory_uri() . '/assets/images/placeholder-image-300x200.jpg';
		}
		?>
			<article class="events-box-md col-sm d-flex">
				<div class="featured-event col-sm d-flex" style="background-image: url({{$image[0]}});">
					@if(is_page('events'))
						<h4 class="purple-bkgd halfsies col-sm mt-auto">
							@else
								<h4 class="purple-bkgd col-sm mt-auto">
									@endif
								<small>{{$date}}</small>
								<br><a class="text-inverse" href="{{$link}}">{{$recent->post_title}}</a></h4>
						</h4>
				</div>
			</article>
	@endforeach
</section>

