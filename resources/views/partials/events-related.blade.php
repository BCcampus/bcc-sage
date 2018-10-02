@php
	$post_types = [ 'ai1ec_event' ];
	$limit = 4;
@endphp

<h3>Related Events <img class="mx-2 mb-1" src="@asset('images/green-dots.png')" alt="decorative green dots">
	<small><a href="/calendar">view all events</a></small>
</h3>
<section class="relevant d-flex flex-row flex-wrap">
	@foreach(\App\App::getRelevant($post, $post_types, $limit, $tag) as $related_post )
		<article class="col border py-2 m-md-2" itemscope itemtype="http://schema.org/Article">
			<p class="upper"><time itemprop="datePublished" class="updated" datetime="{{ get_post_time('c', true, $related_post->ID) }}">{{ get_the_date('',$related_post->ID) }}</time></p>
			<h4><a class="purple" href="@php echo esc_url( $related_post->guid ); @endphp">{{ $related_post->post_title }}</a></h4>
		</article>
	@endforeach
</section>
