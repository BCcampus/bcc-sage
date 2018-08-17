<section class="relevant d-flex flex-row flex-wrap">
	@foreach(\App\App::getRelevant($post, $post_types, $limit) as $related_post )
		<?php
		// not using $child->guid since guid does not
		// update to current domain when importing content
		$link = site_url() . '/' . $related_post->post_name;
		;?>
		<article class="col-sm t-o-p">
			<div class="featured-image-box">
				<a href="<?php echo $link; ?>"><?php echo \App\App::getThumb( $related_post->ID, [ 300 ] ); ?></a>
			</div>
			<p class="text-left">{{$related_post->post_date}}</p>
			<h4 class="text-left"><a class="purple" href="<?php echo $link; ?>">{{$related_post->post_title}}</a></h4>
		</article>
	@endforeach
</section>
