<h4 class="pt-4 pb-2">Grants Currently Offered</h4>
<p>We are looking for your input or participation in the following:</p>
<section class="grants d-flex flex-row flex-wrap">
	@foreach(\App\Page::getChildrenOfPage($post->ID, [698541,15972]) as $child)
		@php($link=\App\App::maybeGuid($child->ID, $child->post_name))
		<article class="grants-current col-md-6 mb-2" itemscope itemtype="http://schema.org/Article">
			<div class="featured-grant row-fluid d-flex"
				 style="background-image: url({{\App\App::getThumbUrl($child->ID)}});">
				<h4 class="text-center purple-bkgd text-inverse col-sm mt-auto"><a
						href="{{$link}}">{{wp_specialchars_decode($child->post_title)}}</a>
				</h4>
			</div>
			<div class="row-fluid border min-height-md">
				<p class="pt-3 px-3"><?php echo wp_trim_words( $child->post_content, '30', "<a href='{$link}'>&hellip;<i class='fa fa-arrow-right'></i></a>" ); ?></p>
			</div>
		</article>
	@endforeach
</section>
