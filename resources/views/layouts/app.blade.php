<!doctype html>
<html @php(language_attributes())>
@include('partials.head')
<body @php(body_class())>
@include('partials.microdata-open')
@include('partials.uio')
@php(do_action('get_header'))
    @include('partials.header')
    <div class="wrap container-fluid " role="document">
        <div class="content row">
            <main class="col-sm-8">
                @yield('content')
            </main>
                <aside id="sidebar" class="col-sm-4">
                    @include('partials.sidebar')
                </aside>
        </div>
    </div>
    @php(do_action('get_footer'))
        @include('partials.footer')
        @php(wp_footer())
@include('partials.uio-script')
@include('partials.microdata-close')
</body>
</html>
