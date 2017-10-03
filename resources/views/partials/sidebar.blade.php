@if(is_page())
{!! wp_list_pages( [
'depth'        => -1,
'show_date'    => '',
'date_format'  => get_option( 'date_format' ),
'child_of'     => $post->post_parent,
'exclude'      => '',
'title_li'     => '<a href="'.get_the_permalink($post->post_parent).'">'. get_the_title($post->post_parent) . '</a>',
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
