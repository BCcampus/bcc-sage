<section class="container-fluid">
	<h3>News <img src="@asset('images/green-dots.png')" alt="decorative green dots">
		<small><a href="/bccampus-news">view all news</a></small>
	</h3>
	@foreach($get_latest_news as $feature)
		<?php
		// not using $child->guid since guid does not
		// update to current domain when importing content
		$link = site_url() . '/' . $feature->post_name;
		$date = date( 'M d, Y', strtotime( $feature->post_date ) );

		if (has_post_thumbnail( $feature->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $feature->ID ), 'single-post-thumbnail' ); ?>
		<div class="row featured-news-front" style="background-image: url('{{$image[0]}}');">
			<?php else: ;?>
			<div class="row featured-news-front">
				<?php endif; ?>
				<div class="col"></div>

				<article class="col purple-bkgd">
					<p class="upper">{{$date}}</p>
					<h4><a class="text-inverse" href="{{$link}}">{{$feature->post_title}}</a>
					</h4>
				</article>
			</div>
	@endforeach
</section>
