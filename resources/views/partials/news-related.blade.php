<?php
$post_types = [ 'post', 'page' ];
$limit = 3;
$i = 0;
;?>
<div class="flex-row shady-bkgd">
	<div class="shady-bkgd py-3 container-fluid">
		<h3>Related News <img class="mx-2 mb-1" src="@asset('images/green-dots.png')" alt="decorative green dots">
			<small><a href="{{get_site_url()}}/news">view all news</a></small>
		</h3>
		<section class="related-news d-flex flex-row flex-wrap">
			@foreach(\App\App::getRelevant($post, $post_types, $limit, $tag) as $related_post )
				<?php
				$link=\App\App::maybeGuid($related_post->ID, $related_post->post_name);

				// make the first one bigger
				if ( 0 === $i ): ;?>
				<div class="col-md-6 py-2">
					<a href="{{$link}}" class="img-link">
					<div class="row featured-news-front"
						 style="background-image: url({{\App\App::getThumbUrl($related_post->ID)}});">
						<article class="col feature-box-md purple-bkgd" itemscope itemtype="http://schema.org/Blog">
							<p class="px-3 font-size-sm">
								<time itemprop="datePublished" class="text-uppercase"
									  datetime="{{ get_post_time('c', true, $related_post->ID) }}">{{ get_the_date('',$related_post->ID) }}</time>
							</p>
							<h3 itemprop="name" class="px-3 text-inverse">{{wp_specialchars_decode($related_post->post_title)}}
							</h3>
							<meta itemprop="author" content="{{get_the_author_meta('display_name',$related_post->post_author)}}"/>
							<meta itemprop="image" content="{{\App\App::getThumbUrl($related_post->ID)}}"/>
						</article>
						<div class="col"></div>
					</div>
					</a>
				</div>
				<?php else: ;?>
				<article class="col-md-3 feature-box-sm shady-bkgd py-2" itemscope itemtype="http://schema.org/Blog">
					<a href="{{$link}}">
					<div class="featured-image-box"
						 style="background-image: url({{\App\App::getThumbUrl($related_post->ID)}});">
					</div>
					</a>
					<div class="border min-height-sm bg-white">
					<p class="text-uppercase pt-3 px-3 font-size-sm">
						<time itemprop="datePublished"
							  datetime="{{ get_post_time('c', TRUE, $related_post->ID) }}">{{ get_the_date('',$related_post->ID) }}</time>
					</p>
					<h4><a class="purple" itemprop="name" href="{{$link}}">{{wp_specialchars_decode($related_post->post_title)}}</a>
					</h4>
					</div>
					<meta itemprop="author" content="{{get_the_author_meta('display_name',$related_post->post_author)}}"/>
					<meta itemprop="image" content="{{\App\App::getThumbUrl($related_post->ID)}}"/>
				</article>
				<?php endif;?>
				<?php $i ++; unset( $image ); ?>
			@endforeach
		</section>
	</div>
</div>
