@php
$args = [
	'posts_per_page' => 1,
	'category_name'  => 'Homepage',
	'post__in'       => get_option( 'sticky_posts' ),

];
@endphp
<section class="d-flex flex-row flex-wrap">
	@foreach(\App\App::getLatestNews( $args ) as $feature)
		@php($link = site_url() . '/' . $feature->post_name)
		@php($cat = get_the_category( $feature->ID))
		<div class="featured-news col d-flex px-0" style="background-image: url({{\App\App::getThumbUrl($feature->ID)}});">
				<h4 class="purple-bkgd text-inverse col-sm mt-auto"><a href="{{$link}}">{{$feature->post_title}}</a>
				</h4>
		</div>
		<article class="row-fluid border-left border-bottom border-right" itemscope itemtype="http://schema.org/Article">
			<p class="text-uppercase pt-3 px-3 font-size-sm align-middle"><time itemprop="datePublished" datetime="{{ get_post_time('c', true, $feature->ID) }}">{{ get_the_date('',$feature->ID) }}</time> &nbsp;<i class="justify-content-center fa fa-circle green"></i>&nbsp; <a href="<?php echo esc_url( get_category_link( $cat[0]->term_id ) ) ;?>">{{$cat[0]->name}}</a></p>
			<p class="px-3"><?php echo wp_trim_words( $feature->post_content, '50', "<a href='{$link}'>&hellip;<i class='fa fa-arrow-right'></i></a>" );?></p>
		</article>
	@endforeach
</section>
