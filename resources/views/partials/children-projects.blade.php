<article class="current-projects">
	<h4 class="text-capitalize">{{$post->post_name}}</h4>
	@foreach(\App\Page::getChildrenOfPage() as $child)
		<?php
		// not using $child->guid since guid does not
		// update to current domain when importing content
		$link = site_url() . '/' . $child->post_name;
		;?>
		<article class="col project d-flex">
			<a class="p-2" href="<?php echo $link; ?>"><?php echo get_the_post_thumbnail( $child->ID, [ 175, 175 ] ); ?></a>
			<div class="p-2">
				<h5><a class="purple" href="<?php echo $link; ?>">{{$child->post_title}}</a></h5>
				<p><?php echo wp_trim_words( $child->post_content, '30', "<a href='{$link}'>&hellip;</a>" ); ?></p>
			</div>
		</article>
	@endforeach
</article>
