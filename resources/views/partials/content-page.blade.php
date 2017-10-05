<div class="entry-content" itemprop="text">
    @php(the_content())
        {!! wp_link_pages(['echo' => 1, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
</div>
