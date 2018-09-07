<?php
$args = [
	'posts_per_page' => 3,
	'category' => 0,
];
;?>
<section class="recent-news pad d-flex flex-row flex-wrap">
		@foreach(\App\App::getLatestNews( $args ) as $recent )
			<?php
			// not using $child->guid since guid does not
			// update to current domain when importing content
			$link = site_url() . '/' . $recent->post_name;
			$date = date( 'M d, Y', strtotime( $recent->post_date ) );
			;?>
			<article class="col-sm-4 feature-box-sm border">
				<div class="featured-image-box">
					<a href="{{$link}}"><?php echo \App\App::getThumb( $recent->ID, [ 300 ] );?></a>
				</div>
				<p class="text-left upper">{{$date}}</p>
				<h4 class="text-left"><a class="purple" href="{{$link}}">{{$recent->post_title}}</a>
				</h4>
			</article>
		@endforeach
</section>
