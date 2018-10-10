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
				// not using $child->guid since guid does not
				// update to current domain when importing content
				$link = site_url() . '/' . $related_post->post_name;

				// make the first one bigger
				if ( 0 === $i ): ;?>
				<div class="col-md-6 pb-sm-2">
					<div class="row featured-news-front"
						 style="background-image: url({{\App\App::getThumbUrl($related_post->ID)}});">
						<article class="col feature-box-md purple-bkgd" itemscope itemtype="http://schema.org/Article">
							<p class="px-3 font-size-sm">
								<time itemprop="datePublished" class="text-uppercase"
									  datetime="{{ get_post_time('c', true, $related_post->ID) }}">{{ get_the_date('',$related_post->ID) }}</time>
							</p>
							<h3 class="px-3 text-inverse"><a href="{{$link}}">{{$related_post->post_title}}</a>
							</h3>
						</article>
						<div class="col"></div>
					</div>
				</div>
				<?php else: ;?>
				<article class="col feature-box-sm shady-bkgd" itemscope itemtype="http://schema.org/Article">
					<div class="featured-image-box"
						 style="background-image: url({{\App\App::getThumbUrl($related_post->ID)}});">
						<a href="{{$link}}"></a>
					</div>
					<div class="border min-height-sm bg-white">
					<p class="text-uppercase pt-3 px-3 font-size-sm">
						<time itemprop="datePublished"
							  datetime="{{ get_post_time('c', TRUE, $related_post->ID) }}">{{ get_the_date('',$related_post->ID) }}</time>
					</p>
					<h4><a class="purple" href="{{$link}}">{{$related_post->post_title}}</a>
					</h4>
					</div>
				</article>
				<?php endif;?>
				<?php $i ++; unset( $image ); ?>
			@endforeach
		</section>
	</div>
</div>
