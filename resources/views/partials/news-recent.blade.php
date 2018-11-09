@php
	$args = [
        'posts_per_page' => 3,
        'category'       => 0,
    ];
@endphp
<section class="recent-news pt-3 d-flex flex-row flex-wrap no-gutters">
	@foreach(\App\App::getLatestNews( $args ) as $recent )
		@php($link=\App\App::maybeGuid($recent->ID, $recent->post_name))
		<article class="col-md-4 feature-box-sm py-2" itemscope itemtype="http://schema.org/Blog">
			<a href="{{$link}}">
			<div class="featured-image-box" style="background-image: url({{\App\App::getThumbUrl($recent->ID)}});">
			</div>
			</a>
			<div class="border min-height-sm">
				<p class="text-uppercase pt-2 px-3 font-size-sm">
					<time itemprop="datePublished"
						  datetime="{{ get_post_time('c', true, $recent->ID) }}">{{ get_the_date('',$recent->ID) }}</time>
				</p>
				<h4 itemprop="name"><a class="purple" href="{{$link}}">{{wp_specialchars_decode($recent->post_title)}}</a>
				</h4>
			</div>
			<meta itemprop="author" content="{{get_the_author_meta('display_name',$recent->post_author)}}"/>
			<meta itemprop="image" content="{{\App\App::getThumbUrl($recent->ID)}}"/>
		</article>
	@endforeach
</section>
