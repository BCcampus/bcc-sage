<section class="projects t-o-p">
	<div class="featured-image-box">
		<img src="@asset('images/placeholder-image-300x200.jpg')"/>
	</div>
	<h5 class="blue-bkgd">Projects</h5>
	<p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
		magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat.</p>
	<ul>
		@foreach(\App\Page::getChildrenOfPage($get_projects_id) as $child)
			<?php
			// not using $child->guid since guid does not
			// update to current domain when importing content
			$link = site_url() . '/' . $child->post_name;
			;
			?>
			<li><a class="purple" href="<?php echo $link; ?>">{{$child->post_title}}</a></li>
		@endforeach
	</ul>
</section>
