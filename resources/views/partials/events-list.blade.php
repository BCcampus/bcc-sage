<ul class="events-list">
	@foreach(\App\App::getEvents( $event_category, $args ) as $recent )
		@php($link = site_url() . '/' . $recent->post_name)
		@php($date = date( 'M d, Y', strtotime( $recent->post_date ) ))
		<li class="border my-2 p-2">
			<p class="text-uppercase"><time>{{$date}}</time></p>
			<p class="purple font-weight-bold"><a href="{{$link}}" rel="bookmark"
				  title="{{$recent->post_title}}">{{$recent->post_title}}</a>
			</p>
		</li>
	@endforeach
</ul>
