<section class="topics-of-practice feature-box-sm">
	<a href="@php echo get_permalink($get_topics_of_practice_id); @endphp" class="img-link">
	<div class="featured-image-box" style="background-image: url({{\App\App::getThumbUrl($get_topics_of_practice_id)}});">
		<h5 class="blue-bkgd text-inverse">Topics of Practice</h5>
	</div>
	</a>
	<p class="mt-3">At BCcampus, we support the adaptation and evolution of teaching and learning practices in post-secondary institutions across British Columbia through collaboration, communication, and innovation.</p>
	<div class="mb-3 list-group">
		@foreach(\App\Page::getChildrenOfPage($get_topics_of_practice_id) as $child)
			@php($link=\App\App::maybeGuid($child->ID, $child->post_name))
			<a class="list-group-item list-group-item-action purple font-weight-bold" href="{{$link}}">{{wp_specialchars_decode($child->post_title)}}<i class="fa fa-arrow-right pull-right"></i></a>
		@endforeach
	</div>
</section>
