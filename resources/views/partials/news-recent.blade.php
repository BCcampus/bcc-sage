<?php
$args = [
	'posts_per_page' => 3,
	'category'       => 0,
];
;?>
<section class="recent-news pad-top d-flex flex-row flex-wrap">
	@foreach(\App\App::getLatestNews( $args ) as $recent )
		<?php
		// not using $child->guid since guid does not
		// update to current domain when importing content
		$link = site_url() . '/' . $recent->post_name;

		if ( has_post_thumbnail( $recent->ID ) ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $recent->ID ), 'single-post-thumbnail' );
		} else {
			$image[] = get_stylesheet_directory_uri() . '/assets/images/placeholder-image-300x200.jpg';
		}
		;?>
			<article class="col-sm-4 feature-box-sm border" itemscope itemtype="http://schema.org/Article">
				<a href="{{$link}}">
					<div class="featured-image-box" style="background-image: url({{$image[0]}});">

					</div>
				</a>
				<p class="upper pad-top"><time itemprop="datePublished" class="updated" datetime="{{ get_post_time('c', true, $recent->ID) }}">{{ get_the_date('',$recent->ID) }}</time></p>
				<h4><a class="purple" href="{{$link}}">{{$recent->post_title}}</a>
				</h4>
			</article>
	@endforeach
</section>
