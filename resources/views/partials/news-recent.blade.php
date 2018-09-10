<?php
$args = [
	'posts_per_page' => 3,
	'category'       => 0,
];
;?>
<section class="recent-news pad d-flex flex-row flex-wrap">
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
		}
		;?>
		<article class="col-sm-4 feature-box-sm border">
			<div class="featured-image-box" style="background-image: url({{$image[0]}});">
				<a href="{{$link}}"></a>
			</div>
			<p class="upper pad">{{$date}}</p>
			<h4><a class="purple" href="{{$link}}">{{$recent->post_title}}</a>
			</h4>
		</article>
	@endforeach
</section>
