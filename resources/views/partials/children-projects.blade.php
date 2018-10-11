<section class="current-projects">
	@foreach(\App\Page::getChildrenOfPage() as $child)
		<?php
		// not using $child->guid since guid does not
		// update to current domain when importing content
		$link = site_url() . '/' . $child->post_name;
		;?>
		<article class="projects flex-row d-flex flex-wrap my-2" itemscope itemtype="http://schema.org/Article">
			<div class="col-md-3 events-image-box" style="background-image: url({{\App\App::getThumbUrl( $child->ID )}});">
			</div>
			<div class="col-md-9 px-md-3 px-0">
				<h5 class="pt-2"><a class="purple" href="{{$link}}">{{$child->post_title}}</a></h5>
				<p><?php echo wp_trim_words( $child->post_content, '30', "<a href='{$link}'>&hellip;</a>" ) ;?></p>
			</div>
		</article>
	@endforeach
</section>
