<article class="current-projects">
	<h4>Projects</h4>
	@foreach($get_children_of_page as $child)
		<article class="col-sm">
			<p>{{$child->post_title}}</p>
		</article>
	@endforeach
	<article class="col-sm">
		Placeholder
	</article>
	<article class="col-sm">
		Placeholder
	</article>
	<article class="col-sm">
		Placeholder
	</article>
	<article class="col-sm">
		Placeholder
	</article>
</article>
