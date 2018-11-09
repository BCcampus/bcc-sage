@php
$args = [
	'posts_per_page' => 1,
	'category_name'  => 'Homepage',
	'post__in'       => get_option( 'sticky_posts' ),

];
@endphp
<section class="d-flex flex-column flex-wrap">
	@foreach(\App\App::getLatestNews( $args ) as $feature)
		@php($link=\App\App::maybeGuid($feature->ID, $feature->post_name))
		@php($cat = get_the_category( $feature->ID))
		<a href="{{$link}}">
		<div class="featured-news col d-flex px-0" style="background-image: url({{\App\App::getThumbUrl($feature->ID)}});">
				<h4 class="purple-bkgd text-inverse col-sm mt-auto">{{wp_specialchars_decode($feature->post_title)}}
				</h4>
		</div>
		</a>
		<article class="row-fluid border-left border-bottom border-right" itemscope itemtype="http://schema.org/Blog">
			<p class="text-uppercase pt-3 px-3 font-size-sm align-middle"><time itemprop="datePublished" datetime="{{ get_post_time('c', true, $feature->ID) }}">{{ get_the_date('',$feature->ID) }}</time> &nbsp;<span class="justify-content-center fa fa-circle green"></span>&nbsp; <a href="<?php echo esc_url( get_category_link( $cat[0]->term_id ) ); ?>">{{$cat[0]->name}}</a></p>
			<p class="px-3">{!! \App\App::maybeExcerpt($feature->ID,$feature->post_content,$link,50) !!}</p>
			<meta itemprop="name" content="{!! $feature->post_title !!}"/>
			<meta itemprop="author" content="{{get_the_author_meta('display_name',$feature->post_author)}}"/>
			<meta itemprop="image" content="{{\App\App::getThumbUrl($feature->ID)}}"/>
		</article>
	@endforeach
</section>
