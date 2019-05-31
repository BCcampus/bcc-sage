<div class="entry-content" itemprop="text">
    @php($status = get_post_meta($post->ID,'status',true))
    @if( ($status) )
    <p><b>Status:</b> @php(print_r($status))</p>
    @endif
    @php(the_content())
    {!! wp_link_pages(['echo' => 1, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'bcc-sage'), 'after' => '</p></nav>']) !!}
</div>
