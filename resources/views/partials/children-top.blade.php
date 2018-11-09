<section class="topics-of-practice d-flex flex-row flex-wrap no-gutters">
	@foreach(\App\Page::getChildrenOfPage() as $child)
		@php($link=\App\App::maybeGuid($child->ID, $child->post_name))
		<article class="topics-of-practice-item col-md-6 mb-2" itemscope itemtype="http://schema.org/Article">
			<a href="{{$link}}" class="img-link">
			<div class="featured-topic row-fluid d-flex" style="background-image: url({{\App\App::getThumbUrl($child->ID)}});">
				<h4 itemprop="name" class="purple-bkgd text-inverse col-sm mt-auto">{{wp_specialchars_decode($child->post_title)}}
				</h4>
			</div>
			</a>
			<div class="row-fluid border-left border-right border-bottom  min-height-md">
				<p class="pt-3 pad-left pad-right"><?php echo wp_trim_words( $child->post_content, '25', "<a href='{$link}'>&hellip;<i class='fa fa-arrow-right'></i></a>" ); ?></p>
			</div>
			<meta itemprop="author" content="{{get_the_author_meta('display_name',$child->post_author)}}"/>
			<meta itemprop="image" content="{{\App\App::getThumbUrl($child->ID)}}"/>
		</article>
	@endforeach
</section>
