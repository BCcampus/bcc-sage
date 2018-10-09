@php
	$limit = 3;
@endphp
<section class="py-3">
	<header>
		<h5 class="text-uppercase">Upcoming</h5>
	</header>
	@foreach(\App\App::getUpcomingEvents( $limit ) as $recent )
		<article class="events-upcoming my-1 border" itemscope itemtype="http://schema.org/Article">
			<div class="row pad-left">
				<div class="col-sm-2 events-image-box"
					 style="background-image: url({{\App\App::getThumbUrl($recent['post_id'])}});">
				</div>
				<div class="col-sm-10">
					<p class="text-uppercase pt-2 font-size-sm">
						<time>{{ $recent['start'] }}</time>
					</p>
					<h4><a class="purple" href="@php echo esc_url( $recent['link'] ); @endphp">{{ $recent['title']}}</a>
					</h4>
				</div>
			</div>
		</article>
	@endforeach
</section>
