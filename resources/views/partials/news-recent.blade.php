@php
	$args = [
        'posts_per_page' => 3,
        'category'       => 0,
    ];
@endphp
<section class="recent-news pt-3 d-flex flex-row flex-wrap">
	@foreach(\App\App::getLatestNews( $args ) as $recent )
		@php($link=\App\App::maybeGuid($recent->ID, $recent->post_name))
		<article class="col-md-4 feature-box-sm py-2" itemscope itemtype="http://schema.org/Article">
			<div class="featured-image-box" style="background-image: url({{\App\App::getThumbUrl($recent->ID)}});">

			</div>
			<div class="border min-height-sm">
				<p class="text-uppercase pt-2 px-3 font-size-sm">
					<time itemprop="datePublished"
						  datetime="{{ get_post_time('c', true, $recent->ID) }}">{{ get_the_date('',$recent->ID) }}</time>
				</p>
				<h4><a class="purple" href="{{$link}}">{{wp_specialchars_decode($recent->post_title)}}</a>
				</h4>
			</div>
		</article>
	@endforeach
</section>
