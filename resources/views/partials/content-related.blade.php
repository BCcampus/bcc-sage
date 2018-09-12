<section class="relevant d-flex flex-row flex-wrap">
	@foreach(\App\App::getRelevant($post, $post_types, $limit, $tag) as $related_post )
		<?php
		// not using $child->guid since guid does not
		// update to current domain when importing content
		$link = site_url() . '/' . $related_post->post_name;
		$cat = get_the_category( $related_post->ID );

		;?>
		<article class="col-sm feature-box-sm border" itemscope itemtype="http://schema.org/Article">
			<a href="{{$link}}">
				<div class="featured-image-box" style="background-image: url({{\App\App::getThumbUrl($related_post->ID)}});">

				</div>
			</a>
			<p class="upper pad-top"><time itemprop="datePublished" class="updated" datetime="{{ get_post_time('c', true, $related_post->ID) }}">{{ get_the_date('',$related_post->ID) }}</time></p>
			<h4><a class="purple" href="{{$link}}">{{$related_post->post_title}}</a>
			</h4>
			<p><a href="<?php echo esc_url( get_category_link( $cat[0]->term_id ) ) ;?>">{{$cat[0]->name}}</a></p>
		</article>
	@endforeach
</section>
