<article class="current-projects">
	<h4>Projects</h4>
	@foreach($get_children_of_page as $child)
		<article class="col-sm project d-flex">
				<a class="p-2" href="{{$child->guid}}"><?php echo get_the_post_thumbnail( $child->ID ); ?></a>
				<div class="p-2">
					<h5><a href="{{$child->guid}}">{{$child->post_title}}</a></h5>
					<p><?php echo wp_trim_words( $child->post_content, '30', "<a href='{$child->guid}'>&hellip;</a>" ); ?></p>
				</div>
		</article>
	@endforeach
</article>
