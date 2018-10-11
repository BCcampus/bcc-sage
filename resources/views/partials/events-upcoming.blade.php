@php
	$limit = 3;
	$ids=[];
@endphp
<section class="py-3">
	<header>
		<h5 class="text-uppercase">Upcoming</h5>
	</header>
	@foreach(\App\App::getUpcomingEvents( $limit, $ids ) as $recent )
		<article class="events-upcoming my-2 border flex-row d-flex" itemscope itemtype="http://schema.org/Article">
				<div class="col-md-3 events-image-box"
					 style="background-image: url({{ \App\App::getThumbUrl($recent['post_id']) }});">
				</div>
				<div class="col-md-9">
					<p class="text-uppercase pt-2 font-size-sm">
						<time>{{ $recent['start'] }}</time>
					</p>
					<h4><a class="purple" href="@php echo esc_url( $recent['link'] ); @endphp">{{ $recent['title']}}</a>
					</h4>
				</div>
		</article>
	@endforeach
</section>
