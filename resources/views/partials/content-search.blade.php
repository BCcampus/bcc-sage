<article @php(post_class())>
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ the_title_attribute() }}</a></h2>
    @if (get_post_type() === 'post')
      @include('partials/entry-meta')
    @endif
  </header>
  <div class="entry-summary" itemscope itemtype="http://schema.org/SearchResultsPage">
    @php(the_excerpt())
  </div>
</article>
