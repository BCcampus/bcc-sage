<article @php(post_class()) itemscope itemtype="http://schema.org/Article">
	<div class="row my-2 pad-left">
		<div class="col-md-3 events-image-box" style="background-image: url({{\App\App::getThumbUrl()}});">
		</div>
		<div class="col-md-9 entry-summary">
			<header>
				@include('partials/entry-meta')
				<h3 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h3>
			</header>
			@php(the_excerpt())
		</div>
	</div>
</article>
