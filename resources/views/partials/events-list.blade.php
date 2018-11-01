<ul class="events-list">
	@foreach(\App\App::getUpcomingEvents( $limit, $ids ) as $recent )
		@php($link=\App\App::maybeGuid($recent['post_id'], $recent['title']))
		<li class="border my-2 p-2" itemscope itemtype="http://schema.org/Event">
			<p class="text-uppercase font-size-sm">
				<time itemprop="startDate">{{$recent['start']}}</time>
			</p>
			<p class="font-weight-bold"><a class="purple" itemprop="name" href="{{$link}}" rel="bookmark"
										   title="{{$recent['title']}}">{{$recent['title']}}</a>
			</p>
		</li>
	@endforeach
</ul>
