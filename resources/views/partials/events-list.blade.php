<ul class="events-list">
	@foreach(\App\App::getUpcomingEvents( $limit, $filter ) as $recent )
		<li class="border my-2 p-2">
			<p class="text-uppercase font-size-sm"><time>{{$recent['start']}}</time></p>
			<p class="font-weight-bold"><a class="purple" href="{{$link}}" rel="bookmark"
				  title="{{$recent['title']}}">{{$recent['title']}}</a>
			</p>
		</li>
	@endforeach
</ul>
