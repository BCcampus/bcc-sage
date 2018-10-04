<section>
	<header>
	<h3>News <img class="mx-2 mb-1" src="@asset('images/green-dots.png')" alt="decorative green dots">
		<small><a href="{{get_site_url()}}/news">view all news</a></small>
	</h3>
	</header>
	@foreach($get_latest_news as $feature)
		@php($link = site_url() . '/' . $feature->post_name)

		<div class="row featured-news-front no-gutters" style="background-image: url({{\App\App::getThumbUrl($feature->ID)}});">
			<div class="col px-md-1"></div>
			<article class="col purple-bkgd" itemscope itemtype="http://schema.org/Article">
				<p class="px-3 font-size-sm"><time itemprop="datePublished" class="text-uppercase" datetime="{{ get_post_time('c', true, $feature->ID) }}">{{ get_the_date('',$feature->ID) }}</time></p>
				<h2 class="px-3 font-weight-light text-inverse"><a href="{{$link}}">{{$feature->post_title}}</a>
				</h2>
			</article>
		</div>
	@endforeach
</section>
