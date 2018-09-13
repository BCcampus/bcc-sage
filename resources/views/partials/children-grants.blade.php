<h4 class="pt-5">Grants Currently Offered:</h4>
<section class="grants d-flex col-sm row">
    @foreach(\App\Page::getChildrenOfPage( '698319' ) as $child)
        @php($link = site_url() . '/' . $child->post_name)
        <div class="featured-event d-flex col-sm-6"
             style="background-image: url({{\App\App::getThumbUrl($child->ID)}});">
            <h4 class="purple-bkgd col-sm mt-auto">
                <a class="text-white" href="{{$link}}">{{$child->post_title}}</a>
            </h4>
        </div>
    @endforeach
</section>