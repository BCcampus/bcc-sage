<!doctype html>
<html @php(language_attributes())>
@include('partials.head')
<body @php(body_class())>
@include('partials.microdata-open')
@include('partials.uio')
@php(do_action('get_header'))
@include('partials.header')
@include('partials.page-header')
<div class="container-fluid mb-3" role="document">
		@include('partials.sidebar-mobile')
	<div class="content row">
		<main class="col-lg-8 col-md-8">
			@yield('content')
		</main>
		<aside id="sidebar" class="col-lg-3 offset-lg-1">
			@include('partials.sidebar')
		</aside>
	</div>
</div>
@if( ! is_page_template(['views/template-subscribe.blade.php','views/template-subscribe-edtech.blade.php', 'views/template-events.blade.php']))
	@include('partials.news-related')
	@include('partials.events-related')
@endif
@php(do_action('get_footer'))
@include('partials.footer')
@php(wp_footer())
@include('partials.uio-script')
@include('partials.microdata-close')
</body>
</html>
