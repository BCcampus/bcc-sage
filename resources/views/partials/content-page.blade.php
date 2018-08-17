<div class="entry-content" itemprop="text">
	@php(the_content())
	{!! wp_link_pages(['echo' => 1, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'bcc-sage'), 'after' => '</p></nav>']) !!}
	@if( !is_singular( 'ai1ec_event' ) && \App\App::getRelevant($post))
		<div class="text-center">
			<p>Related Articles</p>
			<hr>
			@foreach(\App\App::getRelevant($post) as $related_post )
				<a class="related-links" href="{{$related_post->guid}}" rel="bookmark"
				   title="Permanent Link to {{$related_post->post_title}}">{{$related_post->post_title}}</a>
			@endforeach
		</div>
	@endif
</div>
