<article @php(post_class())>
    <header class="entry-header">
        <h1 class="entry-title">{!! get_the_title() !!}</h1>
    </header>
    @include('partials/entry-meta')
    <div class="entry-content">
        @php(the_content())
    </div>
    <p class="byline author vcard">
        {{ __('Posted by', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author"
                                         class="fn">{{ get_the_author() }}</a> &amp; filed
        under {{ the_category( ', ' ) }}.
    </p>
    <p class="tags">{{ the_tags('', '&nbsp;', '') }}</p>
    <footer>
        {!! wp_link_pages(['echo' => 1, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
        <nav class="wp-prev-next alert alert-info">
            <ul class="post-navigation clearfix">
                <li class="post-navigation pull-left">{!! previous_post_link('&laquo; Previous Article<br>%link') !!}</li>
                <li class="post-navigation pull-right">{!! next_post_link('Next Article &raquo;<br>%link ') !!} </li>
            </ul>
            <hr>
            <p class="text-center">Related Articles</p>
            @if($get_related_posts)
                @foreach($get_related_posts as $related_post )
                    <a itemprop="relatedLink" href="{{$related_post->guid}}" rel="bookmark" title="Permanent Link to {{$related_post->post_title}}">{{$related_post->post_title}}</a> &#124;
                @endforeach
            @endif
        </nav>
    </footer>
    @php(comments_template('/partials/comments.blade.php'))
</article>