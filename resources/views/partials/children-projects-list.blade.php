<section class="projects feature-box-sm">
	<div class="featured-image-box" style="background-image: url({{\App\App::getThumbUrl($get_projects_id)}});">
		<h5 class="blue-bkgd text-inverse"><a href="@php echo get_permalink($get_projects_id); @endphp">Projects</a></h5>
	</div>
	<p class="mt-3">We actively participate in opportunities to improve the student experience in B.C. by facilitating technology advancements; enabling research activities; creating collaborative spaces; and more.</p>
	<div class="mb-3 list-group">
		@foreach(\App\Page::getChildrenOfPage($get_projects_id) as $child)
			@php($link=\App\App::maybeGuid($child->ID, $child->post_name))
			<a class="list-group-item list-group-item-action purple font-weight-bold" href="{{$link}}">{{wp_specialchars_decode($child->post_title)}}<i class="fa fa-arrow-right pull-right"></i></a>
		@endforeach
	</div>
</section>
