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
<section class="pad d-flex flex-row flex-wrap">
	<h4>Upcoming</h4>
	@foreach(\App\App::getLatestNews( $args ) as $recent )
		<?php
		// not using $child->guid since guid does not
		// update to current domain when importing content
		$link = site_url() . '/' . $recent->post_name;
		$date = date( 'M d, Y', strtotime( $recent->post_date ) );
		if ( has_post_thumbnail( $recent->ID ) ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $recent->ID ), 'single-post-thumbnail' );
		} else {
			$image[] = get_stylesheet_directory_uri() . '/assets/images/placeholder-image-300x200.jpg';
		};
		?>
		<article class="events-upcoming">
			<div class="row border">
				<div class="col-sm-2 events-image-box" style="background-image: url({{$image[0]}});">
				</div>
				<div class="col-sm-10">
					<p class="upper">{{$date}}</p>
					<h4><a class="purple" href="{{$link}}">{{$recent->post_title}}</a></h4>
				</div>
			</div>
		</article>
	@endforeach
</section>
