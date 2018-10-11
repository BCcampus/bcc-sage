<section class="d-flex flex-row flex-wrap">
	@foreach(\App\Page::getChildrenOfPage() as $child)
		@php
			$link = site_url() . '/' . $child->post_name;
		@endphp
		<article class="topics-of-practice col-sm-6 no-gutters mb-2 px-2" itemscope itemtype="http://schema.org/Article">
			<div class="featured-topic row-fluid d-flex" style="background-image: url({{\App\App::getThumbUrl($child->ID)}});">
				<h4 class="purple-bkgd text-inverse col-sm mt-auto"><a href="{{$link}}">{{wp_specialchars_decode($child->post_title)}}</a>
				</h4>
			</div>
			<div class="row-fluid border-left border-right border-bottom">
				<p class="pt-3 pad-left pad-right"><?php echo wp_trim_words( $child->post_content, '30', "<a href='{$link}'>&hellip;<i class='fa fa-arrow-right'></i></a>" );?></p>
			</div>
		</article>
	@endforeach
</section>
