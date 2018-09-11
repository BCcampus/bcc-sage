<section class="container-fluid">
	<h3>News <img src="@asset('images/green-dots.png')" alt="decorative green dots">
		<small><a href="{{get_site_url()}}/news">view all news</a></small>
	</h3>
	@foreach($get_latest_news as $feature)
		<?php
		// not using $child->guid since guid does not
		// update to current domain when importing content
		$link = site_url() . '/' . $feature->post_name;

		if ( has_post_thumbnail( $feature->ID ) ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $feature->ID ), 'single-post-thumbnail' );
		} else {
			$image[0] = get_stylesheet_directory_uri() . '/assets/images/placeholder-image-300x200.jpg';
		}
		;?>
		<div class="row featured-news-front" style="background-image: url('{{$image[0]}}');">
			<div class="col"></div>
			<article class="col purple-bkgd" itemscope itemtype="http://schema.org/Article">
				<p class="upper"><time itemprop="datePublished" class="updated" datetime="{{ get_post_time('c', true, $feature->ID) }}">{{ get_the_date('',$feature->ID) }}</time></p>
				<h4><a class="text-inverse" href="{{$link}}">{{$feature->post_title}}</a>
				</h4>
			</article>
		</div>
	@endforeach
</section>
