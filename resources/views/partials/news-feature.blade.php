<?php
$args = [
	'posts_per_page' => 1,
	'category_name'  => 'Homepage',
	'post__in'       => get_option( 'sticky_posts' ),

];?>
<section class="container-fluid">
	@foreach(\App\App::getLatestNews( $args ) as $feature)
		<?php
		// not using $child->guid since guid does not
		// update to current domain when importing content
		$link = site_url() . '/' . $feature->post_name;
		$date = date( 'M d, Y', strtotime( $feature->post_date ) );

		if ( has_post_thumbnail( $feature->ID ) ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $feature->ID ), 'single-post-thumbnail' );
		} else {
			$image[0] = get_stylesheet_directory_uri() . '/assets/images/placeholder-image-300x200.jpg';
		}
		;?>
		<div class="featured-news row" style="background-image: url('{{$image[0]}}');">
			<h4 class="purple-bkgd"><a class="text-inverse" href="{{$link}}">{{$feature->post_title}}</a>
			</h4>
		</div>
		<article class="row">
			<p class="upper pad">{{$date}}</p>
			<p><?php echo wp_trim_words( $feature->post_content, '30', "<a href='{$link}'><i class='fa fa-arrow-right pull-right'></i></a>" );?></p>
		</article>
	@endforeach
</section>
