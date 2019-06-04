<section class="projects feature-box-sm">
	<a href="@php echo get_permalink($get_projects_id); @endphp" class="img-link">
	<div class="featured-image-box" style="background-image: url({{\App\App::getThumbUrl($get_projects_id)}});">
		<h5 class="blue-bkgd text-inverse">Projects</h5>
	</div>
	</a>
	<p class="mt-3">We actively participate in opportunities to improve the student experience in B.C. by facilitating technology advancements; enabling research activities; creating collaborative spaces; and more.</p>
	<div class="mb-3 list-group">
		@foreach(\App\Page::getChildrenOfPage($get_projects_id) as $child)
			@if( $child->post_type != 'attachment')
			@php($link=\App\App::maybeGuid($child->ID, $child->post_name))
			<a class="list-group-item list-group-item-action purple font-weight-bold" href="{{$link}}">{{wp_specialchars_decode($child->post_title)}}<span class="fa fa-arrow-right pull-right"></span></a>
		@endif
		@endforeach
	</div>
</section>
