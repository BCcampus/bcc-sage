<section class="topics-of-practice feature-box-sm">
	<div class="featured-image-box" style="background-image: url('@asset('images/placeholder-image-300x200.jpg')');">
		<h5 class="blue-bkgd">Topics of Practice</h5>
	</div>
	<p class="mt-3">At BCcampus, we support the adaptation and evolution of teaching and learning practices in post-secondary institutions across British Columbia through collaboration, communication, and innovation.</p>
	<ul class="mb-3">
		@foreach(\App\Page::getChildrenOfPage($get_topics_of_practice_id) as $child)
			<?php
			// not using $child->guid since guid does not d
			// update to current domain when importing content
			$link = site_url() . '/' . $child->post_name;
			;?>
			<li class="border-top border-right border-left border-last"><a class="purple font-weight-bold" href="{{$link}}">{{$child->post_title}}<i class="fa fa-arrow-right pull-right"></i></a></li>
		@endforeach
	</ul>
</section>
