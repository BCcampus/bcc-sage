<h4 class="pt-5">Currently closed opportunities</h4>
<section class="grants d-flex col-sm row">
    @php($parent = get_theme_mod('grants_closed_setting', '' ))
    @if ($parent !== '')
        @foreach(\App\Page::getChildrenOfPage( $parent ) as $child)
            @php($link = site_url() . '/' . $child->post_name)
            <div class="featured-event d-flex col-sm-6"
                 style="background-image: url({{\App\App::getThumbUrl($child->ID)}});">
                <h4 class="purple-bkgd col-sm mt-auto">
                    <a class="text-white" href="{{$link}}">{{$child->post_title}}</a>
                </h4>
            </div>
        @endforeach
    @endif
</section>