<section class="current-projects">
	<h4 class="text-capitalize">Projects</h4>
	<ul>
		<?php
		$id = '12805';
		?>
		@foreach(\App\Page::getChildrenOfPage($id) as $child)
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
