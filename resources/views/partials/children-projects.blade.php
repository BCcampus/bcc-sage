<section class="current-projects">
	@foreach(\App\Page::getChildrenOfPage() as $child)
		@php($link=\App\App::maybeGuid($child->ID, $child->post_name))
		<article class="projects flex-row d-flex flex-wrap my-2" itemscope itemtype="http://schema.org/Article">
			<div class="col-md-3 events-image-box" style="background-image: url({{\App\App::getThumbUrl( $child->ID )}});">
			</div>
			<div class="col-md-9 px-md-3 px-0">
				<h5 class="pt-2"><a class="purple" itemprop="name" href="{{$link}}">{{wp_specialchars_decode($child->post_title)}}</a></h5>
				<p><?php echo wp_trim_words( $child->post_content, '15', "<a href='{$link}'>&hellip;</a>" ); ?></p>
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
	@endforeach
</section>
