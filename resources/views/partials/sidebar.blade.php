@if(is_page())
  {!! wp_list_pages( [
  'depth'        => 2,
  'show_date'    => '',
  'date_format'  => get_option( 'date_format' ),
  'child_of'     => $post->post_parent,
  'exclude'      => '',
  'title_li'     => '<span class="fa fa-chevron-circle-left" aria-hidden="true"></span> <a href="' . get_the_permalink( \App\App::getListHeading( $post->ID ) ) . '">' . get_the_title( \App\App::getListHeading( $post->ID ) ) . '</a>',
  'echo'         => 0,
  'authors'      => '',
  'sort_column'  => 'post_parent',
  'link_before'  => '',
  'link_after'   => '',
  'item_spacing' => 'preserve',
  'walker'       => '',
  ] ); !!}
@endif

@php(dynamic_sidebar('sidebar-primary'))
