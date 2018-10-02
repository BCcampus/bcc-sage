@php
$args = [
	'posts_per_page' => 1,
	'category_name'  => 'Homepage',
	'post__in'       => get_option( 'sticky_posts' ),

];
@endphp
<section class="container-fluid">
	@foreach(\App\App::getLatestNews( $args ) as $feature)
		@php($link = site_url() . '/' . $feature->post_name)
		@php($cat = get_the_category( $feature->ID))
		<div class="featured-news row" style="background-image: url({{\App\App::getThumbUrl($feature->ID)}});">
			<h4 class="purple-bkgd text-inverse"><a href="{{$link}}">{{$feature->post_title}}</a>
			</h4>
		</div>
		<article class="row border-left border-bottom border-right" itemscope itemtype="http://schema.org/Article">
			<small><p class="text-uppercase pad-top pad-left pad-right"><time itemprop="datePublished" class="updated" datetime="{{ get_post_time('c', true, $feature->ID) }}">{{ get_the_date('',$feature->ID) }}</time> &nbsp;<i class="fa fa-circle green small"></i>&nbsp; <a href="<?php echo esc_url( get_category_link( $cat[0]->term_id ) ) ;?>">{{$cat[0]->name}}</a></p></small>
			<p class="pad-left pad-right"><?php echo wp_trim_words( $feature->post_content, '30', "<a href='{$link}'>&hellip;<i class='fa fa-arrow-right'></i></a>" );?></p>
		</article>
	@endforeach
</section>
