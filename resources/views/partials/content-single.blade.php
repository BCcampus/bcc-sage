<article @php(post_class())>
    <header class="entry-header">
        <h1 class="entry-title">{!! get_the_title() !!}</h1>
    </header>
    @include('partials/entry-meta')
    <div class="entry-content">
        @php(the_content())
    </div>
    @if($get_upcoming_events)
        <hr>
        <div class="upcoming-events" itemscope itemtype="http://schema.org/Event">
            <p>Join us at an upcoming event:</p>
          <ul>
            @foreach($get_upcoming_events as $upcoming_event )
              <li><a itemprop="url" href="{{$upcoming_event['link']}}" title="Permanent Link to {{$upcoming_event['title']}}"><span itemprop="name">{{$upcoming_event['title']}}</span></a> — <span itemprop="startDate">{{$upcoming_event['start']}}</span></li>
          @endforeach
          </ul>
        </div>
        <hr>
    @endif
    <p class="byline author vcard">
        {{ __('Posted by', 'bcc-sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author"
                                             class="fn">{{ get_the_author() }}</a> &amp; filed
        under {{ the_category( ', ' ) }}.
    </p>
    <p class="tags">{{ the_tags('', '&nbsp;', '') }}</p>
    <footer class="post-footer alert alert-info">
        {!! wp_link_pages(['echo' => 1, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
        <nav>
            <ul class="clearfix">
                @if( is_singular( 'ai1ec_event' ))
                    <li class="post-navigation pull-left col-6">{!! previous_post_link('&laquo; Previous Event<br>%link') !!} </li>
                    <li class="post-navigation pull-right text-right col-6">{!! next_post_link('Next Event &raquo;<br>%link ') !!} </li>
                @else
                    <li class="post-navigation pull-left col-6">{!! previous_post_link('&laquo; Previous Article<br>%link') !!} </li>
                    <li class="post-navigation pull-right text-right col-6">{!! next_post_link('Next Article &raquo;<br>%link ') !!} </li>
                @endif
            </ul>
        </nav>
        @if( !is_singular( 'ai1ec_event' ))
            <p class="text-center">Related Articles</p>
            <hr>
        @endif
        @if($get_related_posts)
            @foreach($get_related_posts as $related_post )
                <a itemprop="relatedLink" href="{{$related_post->guid}}" rel="bookmark"
                   title="Permanent Link to {{$related_post->post_title}}">{{$related_post->post_title}}</a>
            @endforeach
        @endif
    </footer>
    @php(comments_template('/partials/comments.blade.php'))
</article>
