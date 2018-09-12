<section class="projects feature-box-sm">
	<div class="featured-image-box" style="background-image: url('@asset('images/placeholder-image-300x200.jpg')');">
		<h5 class="blue-bkgd">Projects</h5>
	</div>
	<p>We actively participate in opportunities to improve the student experience in B.C. by facilitating technology advancements; enabling research activities; creating collaborative spaces; and more.</p>
	<ul>
		@foreach(\App\Page::getChildrenOfPage($get_projects_id) as $child)
			<?php
			// not using $child->guid since guid does not
			// update to current domain when importing content
			$link = site_url() . '/' . $child->post_name;
			;
			?>
			<li class="border"><a class="purple" href="{{$link}}">{{$child->post_title}}<i class="fa fa-angle-right pull-right"></i></a></li>
		@endforeach
	</ul>
</section>
