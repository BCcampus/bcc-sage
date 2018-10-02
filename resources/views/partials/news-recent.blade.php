@php
$args = [
	'posts_per_page' => 3,
	'category'       => 0,
];
@endphp
<section class="recent-news pad-top d-flex flex-row flex-wrap">
	@foreach(\App\App::getLatestNews( $args ) as $recent )
		@php($link = site_url() . '/' . $recent->post_name)
			<article class="col feature-box-sm border" itemscope itemtype="http://schema.org/Article">
				<a href="{{$link}}">
					<div class="featured-image-box" style="background-image: url({{\App\App::getThumbUrl($recent->ID)}});">

					</div>
				</a>
				<p class="upper pt-2 px-3"><time itemprop="datePublished" class="updated" datetime="{{ get_post_time('c', true, $recent->ID) }}">{{ get_the_date('',$recent->ID) }}</time></p>
				<h4><a class="purple" href="{{$link}}">{{$recent->post_title}}</a>
				</h4>
			</article>
	@endforeach
</section>
