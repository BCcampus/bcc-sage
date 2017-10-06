<article itemscope itemtype="http://schema.org/Article" @php(post_class()) itemref="dateModified">
  <meta itemprop="headline" content="{!! get_the_title() !!}">
  <span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
    <meta itemprop="name" content="BCCampus">
    <span itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
      <meta itemprop="url" content="https://bccampus.ca/wp-content/themes/bcc-sage/dist/images/bccampus-logo.png">
    </span>
  </span>
  <header class="entry-header">
        <h1 itemprop="name" class="entry-title">{!! get_the_title() !!}</h1>
    </header>
    @include('partials/entry-meta')
    <div itemprop="articleBody" class="entry-content">
        @php(the_content())
    </div>
    <p class="byline author vcard">
        {{ __('Posted by', 'bcc-sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author"
                                             class="fn"><span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name">{{ get_the_author() }}</span></span></a> &amp; filed
        under <span itemprop="articleSection">{{ the_category( ', ' ) }}</span>.
    </p>
    <p class="tags">{{ the_tags('', '&nbsp;', '') }}</p>
    <footer class="post-footer alert alert-info">
        {!! wp_link_pages(['echo' => 1, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'bcc-sage'), 'after' => '</p></nav>']) !!}
        <nav>
            <ul class="clearfix">
                <li class="post-navigation pull-left col-6">{!! previous_post_link('&laquo; Previous Article<br>%link') !!}</li>
                <li class="post-navigation pull-right text-right col-6">{!! next_post_link('Next Article &raquo;<br>%link ') !!} </li>
            </ul>
        </nav>
        <hr>
        <p class="text-center">Related Articles</p>
        @if($get_related_posts)
            @foreach($get_related_posts as $related_post )
                <a href="{{$related_post->guid}}" rel="bookmark"
                   title="Permanent Link to {{$related_post->post_title}}">{{$related_post->post_title}}</a>
            @endforeach
        @endif
    </footer>
    @php(comments_template('/partials/comments.blade.php'))
</article>
