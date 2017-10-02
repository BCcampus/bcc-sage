<!doctype html>
<html @php(language_attributes())>
@include('partials.head')
<body @php(body_class())>
@include('partials.uio')
@php(do_action('get_header'))
    @include('partials.header')
    <div class="wrap container-fluid " role="document">
        <div class="content row">
            <main class="col-sm-8">
                @yield('content')
            </main>
            @if (App\display_sidebar())
                <aside id="sidebar" class="fluid-sidebar sidebar col-sm-4">
                    @include('partials.sidebar')
                </aside>
            @endif
        </div>
    </div>
    @php(do_action('get_footer'))
        @include('partials.footer')
        @php(wp_footer())
@include('partials.uio-script')
</body>
</html>
