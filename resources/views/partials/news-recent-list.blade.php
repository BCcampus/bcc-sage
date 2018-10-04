<section class="row-fluid recent-news">
	<h4 class="pt-3">Recent News</h4>
	<ul>
		@php
		$args = [
			'posts_per_page' => 3,
		];
		@endphp
		@foreach(\App\App::getLatestNews( $args ) as $news)
			@php($link = site_url() . '/' . $news->post_name)
			@php($cat = get_the_category( $news->ID))
			<li class="border-top">
				<p class="text-uppercase font-size-sm"><time itemprop="datePublished" datetime="{{ get_post_time('c', true, $news->ID) }}">{{ get_the_date('',$news->ID) }}</time> &nbsp;<i class="fa fa-circle green small"></i>&nbsp; <a href="<?php echo esc_url( get_category_link( $cat[0]->term_id ) ) ;?>">{{$cat[0]->name}}</a></p>
				<h4><a href="{{$link}}" class="purple" rel="bookmark" title="{{$news->post_title}}">{{$news->post_title}}</a></h4>
			</li>
		@endforeach
		<li class="border-top">
			<p><a href="{{ site_url() }}/bccampus-news">View all recent news</a></p>
		</li>
	</ul>
</section>
