<article itemscope itemtype="http://schema.org/Article" @php(post_class()) itemref="dateModified">
	<meta itemprop="headline" content="{!! get_the_title() !!}"/>
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
	<meta itemprop="name" content="BCCampus"/>
	<span itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
	  <meta itemprop="url" content="https://bccampus.ca/wp-content/themes/bcc-sage/dist/images/bccampus-logo.png"/>
	</span>
  </span>
	<header class="entry-header">
		<h2 itemprop="name">{!! get_the_title() !!}</h2>
	</header>
	<p class="byline author vcard text-uppercase">
		<small>
			{{ __('By', 'bcc-sage') }}
			<a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
				  <span itemprop="author" itemscope itemtype="http://schema.org/Person">
					<span itemprop="name">{{ get_the_author() }}</span>
				  </span>
			</a>
			&nbsp;<span class="fa fa-circle green"></span>&nbsp;
			@include('partials.entry-meta')
			&nbsp<span class="fa fa-circle green"></span>&nbsp;
			<span itemprop="articleSection">{{ the_category( ', ' ) }}</span>
		</small>
	</p>
	<div itemprop="articleBody" class="entry-content">
		@php(the_content())
	</div>
	<footer class="post-footer">
		<?php
		$post_types    = [ 'post', 'page' ];
		$limit         = 3;
		$category_name = '';
		;?>
		<h3 class="pt-3">Related Stories <img class="mx-2 mb-1" src="@asset('images/green-dots.png')" alt="decorative green dots"></h3>
		@include('partials.content-related')
	</footer>
	@php(comments_template('/partials/comments.blade.php'))
</article>
