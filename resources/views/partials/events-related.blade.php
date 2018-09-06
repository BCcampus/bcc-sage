<?php
$post_types = [ 'ai1ec_event' ];
$limit = 4;
; ?>
<h3>Related Events <img src="@asset('images/green-dots.png')" alt="decorative green dots">
	<small><a href="/calendar">view all events</a></small>
</h3>
<section class="relevant d-flex flex-row flex-wrap">
	@foreach(\App\App::getRelevant($post, $post_types, $limit, $tag) as $related_post )
		<?php
		// not using $child->guid since guid does not
		// update to current domain when importing content
		$link = site_url() . '/' . $related_post->post_name;
		$date = date( 'M d, Y', strtotime( $related_post->post_date ) );
		;?>
		<article class="col-3 border py-2">
			<p class="text-left upper">{{$date}}</p>
			<h4 class="text-left"><a class="purple" href="{{$link}}">{{$related_post->post_title}}</a></h4>
		</article>
	@endforeach
</section>
