<article @php(post_class()) itemscope itemtype="http://schema.org/Article">
	<div class="row my-2 pad-left">
		<div class="col-md-3 events-image-box" style="background-image: url({{\App\App::getThumbUrl()}});">
		</div>
		<div class="col-md-9 entry-summary border">
			<header>
				<small class="text-uppercase">
					@include('partials/entry-meta')
					@if(is_category())
						&nbsp;<i class="fa fa-circle green small"></i>&nbsp; @php(the_category('&nbsp; | &nbsp;'))
					@endif
				</small>
				<h3 class="entry-title"><a class="purple" href="{{ get_permalink() }}">{{ the_title_attribute() }}</a></h3>
			</header>
			@php(the_excerpt())
		</div>
	</div>
</article>
