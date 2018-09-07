@if(is_page() && ! is_page(['calendar','contact-us']))
    <!-- Display the dropdown menu only on mobile -->
    <div class="dropdown d-block d-md-none">
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">{!! \App\App::getListHeading( $post->ID) !!}</button>
            <div class="dropdown-menu">
                <ul>
                    {!! wp_list_pages( [
                  'depth'        => 2,
                  'child_of'     => \App\App::getChildOf( $post->ID ),
                  'title_li'     =>  '',
                  'sort_column'  => 'menu_order, post_title',
                  'item_spacing' => 'preserve'
                  ] ); !!}
                </ul>
            </div>
        </div>
    </div>
@endif