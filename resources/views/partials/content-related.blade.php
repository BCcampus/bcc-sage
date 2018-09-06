<section class="relevant d-flex flex-row flex-wrap">
	@foreach(\App\App::getRelevant($post, $post_types, $limit, $tag) as $related_post )
		<?php
		// not using $child->guid since guid does not
		// update to current domain when importing content
		$link = site_url() . '/' . $related_post->post_name;
		$date = date( 'M d, Y', strtotime($related_post->post_date) );
		;?>
		<article class="col-sm feature-box-sm">
			<div class="featured-image-box">
				<a href="{{$link}}">{{\App\App::getThumb( $related_post->ID, [ 300 ] )}}</a>
			</div>
			<p class="text-left">{{$date}}</p>
			<h4 class="text-left"><a class="purple" href="{{$link}}">{{$related_post->post_title}}</a></h4>
		</article>
	@endforeach
</section>
