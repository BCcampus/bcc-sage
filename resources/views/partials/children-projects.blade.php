<section class="current-projects">
	@foreach(\App\Page::getChildrenOfPage() as $child)
		<?php
		// not using $child->guid since guid does not
		// update to current domain when importing content
		$link = site_url() . '/' . $child->post_name;
		;?>
		<article class="projects d-flex flex-row">
			<div class="featured-image-box side-img p-2">
				<a href="{{$link}}"><?php echo \App\App::getThumb( $child->ID, [
						175,
						175
					] );?></a>
			</div>
			<div class="p-2">
				<h5><a class="purple" href="{{$link}}">{{$child->post_title}}</a></h5>
				<p><?php echo wp_trim_words( $child->post_content, '30', "<a href='{$link}'>&hellip;</a>" ) ;?></p>
			</div>
		</article>
	@endforeach
</section>
