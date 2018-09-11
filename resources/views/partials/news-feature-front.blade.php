<section class="container-fluid">
	<h3>News <img src="@asset('images/green-dots.png')" alt="decorative green dots">
		<small><a href="{{get_site_url()}}/news">view all news</a></small>
	</h3>
	@foreach($get_latest_news as $feature)
		<?php
		// not using $child->guid since guid does not
		// update to current domain when importing content
		$link = site_url() . '/' . $feature->post_name;
		;?>
		<div class="row featured-news-front" style="background-image: url({{\App\App::getThumbUrl($feature->ID)}});">
			<div class="col"></div>
			<article class="col purple-bkgd" itemscope itemtype="http://schema.org/Article">
				<time itemprop="datePublished" class="updated upper" datetime="{{ get_post_time('c', true, $feature->ID) }}">{{ get_the_date('',$feature->ID) }}</time>
				<h4><a class="text-inverse" href="{{$link}}">{{$feature->post_title}}</a>
				</h4>
			</article>
		</div>
	@endforeach
</section>
