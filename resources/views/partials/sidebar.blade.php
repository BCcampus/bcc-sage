@if(is_page() && ! is_page(['calendar','contact-us']))
    <!-- Display the sidebar menu everywhere except mobile -->
    <ul class="d-none d-md-block">
        {!! wp_list_pages( [
      'depth'        => 2,
      'child_of'     => \App\App::getChildOf( $post->ID ),
      'title_li'     => \App\App::getListHeading( $post->ID),
      'sort_column'  => 'menu_order, post_title',
      'item_spacing' => 'preserve'
      ] ); !!}
    </ul>
    @php(dynamic_sidebar('sidebar-primary'))
@else
    @php(dynamic_sidebar('sidebar-primary'))
@endif
