@if(is_page() && ! is_page(['calendar','contact-us']))
  {!! wp_list_pages( [
  'depth'        => 2,
  'show_date'    => '',
  'date_format'  => get_option( 'date_format' ),
  'child_of'     => \App\App::getChildOf( $post->ID ),
  'exclude'      => '',
  'title_li'     => \App\App::getListHeading( $post->ID ),
  'echo'         => 0,
  'authors'      => '',
  'sort_column'  => 'post_title',
  'link_before'  => '',
  'link_after'   => '',
  'item_spacing' => 'preserve',
  'walker'       => '',
  ] ); !!}
@else
  @php(dynamic_sidebar('sidebar-primary'))
@endif
