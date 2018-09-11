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
<div class="pad">
	<h3>Events <img src="@asset('images/green-dots.png')" alt="decorative green dots">
		<small><a href="/calendar">view all events</a></small>
	</h3>
</div>
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
		<article class="events-box-md col d-flex">
			<div class="featured-event col d-flex" style="background-image: url({{$image[0]}});">
				<h4 class="purple-bkgd col mt-auto">
					<small>{{$date}}</small>
					<br><a class="text-inverse" href="{{$link}}">{{$recent->post_title}}</a></h4>
			</div>
		</article>
	@endforeach
</section>

