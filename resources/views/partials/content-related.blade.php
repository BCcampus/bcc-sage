<section class="relevant d-flex flex-row flex-wrap my-3">
	@foreach(\App\App::getRelevant($post, $post_types, $limit, $category_name) as $related_post )
		@php
		$link=\App\App::maybeGuid($related_post->ID, $related_post->post_name);
		$cat = get_the_category( $related_post->ID );
		$column_width = (3 === $limit) ? 4 : 3;
		@endphp
		<article class="col-md-{{$column_width}} feature-box-sm py-2" itemscope itemtype="http://schema.org/Article">
			<div class="featured-image-box"
				 style="background-image: url({{\App\App::getThumbUrl($related_post->ID)}});">
			</div>
			<div class="border min-height-md">
				<p class="text-uppercase pt-2 px-3 font-size-sm">
					<time itemprop="datePublished"
						  datetime="{{ get_post_time('c', true, $related_post->ID) }}">{{ get_the_date('',$related_post->ID) }}</time>
				</p>
				<h4><a class="purple" href="{{$link}}">{!! $related_post->post_title !!}</a>
				</h4>
				<p class="px-3 font-size-sm text-uppercase mb-1 font-weight-500"><a
						href="<?php echo esc_url( get_category_link( $cat[0]->term_id ) ); ?>">{!! $cat[0]->name !!}</a></p>
			</div>
		</article>
	@endforeach
</section>
