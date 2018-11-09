<section class="row-fluid recent-news">
	<h4 class="pt-3 text-uppercase">Recent News</h4>
	<ul>
		@php
		$args = [
			'posts_per_page' => 3,
		];
		@endphp
		@foreach(\App\App::getLatestNews( $args ) as $news)
			@php($link=\App\App::maybeGuid($news->ID, $news->post_name))
			@php($cat = get_the_category( $news->ID))
			<li class="border-top" itemscope itemtype="http://schema.org/Blog">
				<p class="text-uppercase font-size-sm"><time itemprop="datePublished" datetime="{{ get_post_time('c', true, $news->ID) }}">{{ get_the_date('',$news->ID) }}</time> &nbsp;<span class="fa fa-circle green"></span>&nbsp; <a href="<?php echo esc_url( get_category_link( $cat[0]->term_id ) ); ?>">{{wp_specialchars_decode($cat[0]->name)}}</a></p>
				<h4 itemprop="name"><a href="{{$link}}" class="purple" rel="bookmark" title="{{$news->post_title}}">{{wp_specialchars_decode($news->post_title)}}</a></h4>
				<meta itemprop="author" content="{{get_the_author_meta('display_name',$news->post_author)}}"/>
				<meta itemprop="image" content="{{\App\App::getThumbUrl($news->ID)}}"/>
			</li>
		@endforeach
		<li class="border-top">
			<p><a href="{{ site_url() }}/bccampus-news">View all recent news</a></p>
		</li>
	</ul>
</section>
