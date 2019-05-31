<h4 class="pt-4 pb-2">Grants Currently Offered</h4>
<p>We are looking for your input or participation in the following:</p>
<section class="grants d-flex flex-row flex-wrap no-gutters">
	@foreach(\App\Page::getChildrenOfPage($post->ID, [150]) as $child)
		@php($status = get_post_meta($child->ID,'status',true))
		<!-- If there's no status value, treat it as a grant -->
		@if( empty($status) )
		@php($link=\App\App::maybeGuid($child->ID, $child->post_name))
		<article class="grants-current col-md-6 mb-2" itemscope itemtype="http://schema.org/Article">
			<a href="{{$link}}" class="img-link">
				<div class="featured-grant row-fluid d-flex"
					 style="background-image: url({{\App\App::getThumbUrl($child->ID)}});">
					<h4 itemprop="name" class="text-center purple-bkgd text-inverse col-sm mt-auto">{{wp_specialchars_decode($child->post_title)}}
					</h4>
				</div>
			</a>
			<div class="row-fluid border min-height-md">
				<p class="pt-3 px-3">{!! \App\App::maybeExcerpt($child->ID,$child->post_content,$link,25) !!}</p>
			</div>
			<meta itemprop="author" content="{{get_the_author_meta('display_name',$child->post_author)}}"/>
			<meta itemprop="image" content="{{\App\App::getThumbUrl($child->ID)}}"/>
			<meta itemprop="datePublished" content="{{ get_post_time('c', true, $child->ID) }}"/>
			<meta itemprop="headline" content="{!! $child->post_title !!}"/>
			<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
				<meta itemprop="name" content="BCCampus"/>
				<span itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
					<meta itemprop="url" content="https://bccampus.ca/wp-content/themes/bcc-sage/dist/images/bccampus-logo.png"/>
				</span>
			</span>
		</article>
		@endif
	@endforeach
</section>
