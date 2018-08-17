<div class="text-center">
	<p>Related Articles</p>
	<hr>
	@foreach(\App\App::getRelevant($post) as $related_post )
		<a class="related-links" href="{{$related_post->guid}}" rel="bookmark"
		   title="Permanent Link to {{$related_post->post_title}}">{{$related_post->post_title}}</a>
	@endforeach
</div>
