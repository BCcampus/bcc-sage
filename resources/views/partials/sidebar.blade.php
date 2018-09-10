@if(is_page() && ! is_page(['calendar','contact-us']))

    @php($hasChildren = wp_list_pages( 'title_li=&child_of='.$post->ID.'&echo=0' ))
    @php($isChild = get_post_ancestors($post->ID))

    <!-- Prevent returning a menu of all pages when no children, display on child pages also -->
    @if((($isChild || $hasChildren )))
        <!-- Display everywhere except mobile -->
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
    @endif
@else
    @php(dynamic_sidebar('sidebar-primary'))
@endif
