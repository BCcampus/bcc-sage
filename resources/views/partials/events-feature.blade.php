@php
$limit = 2;
$filter = [792,22547]; // featured category is 792 on cert, 22547 on prod
@endphp
<section class="mt-3">
	@if(is_front_page())
		<header>
			<h3>Events <img class="mx-2 mb-1" src="@asset('images/green-dots.png')" alt="decorative green dots">
				<small><a href="{{site_url()}}/events">view all events</a></small>
			</h3>
		</header>
	@endif
	<div class="featured-event d-flex flex-row flex-wrap">
		@foreach(\App\App::getUpcomingEvents( $limit, $filter ) as $recent )
			<article class="events-box-md col-sm-6">
				<div class="featured-event row-fluid d-flex"
					 style="background-image: url({{\App\App::getThumbUrl($recent['post_id'])}});">
					<div class="purple-bkgd col-sm mt-auto">
						<h4 class="text-inverse">
							<time class="text-uppercase font-size-sm">{{ $recent['start']}}</time>
							<br><a href="@php echo esc_url( $recent['link'] ); @endphp">{{ $recent['title'] }}</a>
						</h4>
					</div>
				</div>
			</article>
		@endforeach
	</div>
</section>

