@php
	$limit = 10;
	$ids=[];
	$exclude_ids=\App\App::getIdsInCategory([792,22547]);
@endphp
<section class="py-3">
	<header>
		<h5 class="text-uppercase">Upcoming</h5>
	</header>
	@foreach(\App\App::getUpcomingEvents( $limit, $ids, '', $exclude_ids ) as $recent )
		<article class="events-upcoming my-2 border flex-row d-flex" itemscope itemtype="http://schema.org/Event">
				<div class="col-md-3 events-image-box"
					 style="background-image: url({{ \App\App::getThumbUrl($recent['post_id']) }});">
				</div>
				<div class="col-md-9">
					<p class="text-uppercase pt-2 font-size-sm">
						<time itemprop="startDate">{{ $recent['start'] }}</time>
					</p>
					<h4><a class="purple" itemprop="name" href="@php echo esc_url( $recent['link'] ); @endphp">{{ $recent['title']}}</a>
					</h4>
				</div>
			<span itemprop="location" itemscope itemtype="http://schema.org/Place">
			<meta itemprop="address" content="{!! $recent['location'] !!}"/>
			</span>
		</article>
	@endforeach
</section>
