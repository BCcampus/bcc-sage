<section class="topics-of-practice">
	<div class="d-flex flex-row flex-wrap">
		@foreach(\App\Page::getChildrenOfPage() as $child)
			<?php
			// not using $child->guid since guid does not
			// update to current domain when importing content
			$link = site_url() . '/' . $child->post_name;
			;?>
			<article class="col-sm-6 t-o-p">
				<div class="featured-image-box">
					<a href="<?php echo $link; ?>"><?php echo \App\App::getThumb( $child->ID, [ 300 ] ); ?></a>
				</div>
				<h5 class="purple-bkgd"><a class="text-white" href="<?php echo $link; ?>">{{$child->post_title}}</a>
				</h5>
				<p><?php echo wp_trim_words( $child->post_content, '30', "<a href='{$link}'>&hellip;</a>" ); ?></p>
			</article>
		@endforeach
	</div>
</section>
