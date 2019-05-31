<!doctype html>
<html @php(language_attributes())>
@include('partials.head')
<body @php(body_class())>
@include('partials.microdata-open')
@php(do_action('get_header'))
@include('partials.header')
<div class="container-fluid" role="document">
	<main class="main">
		@yield('content')
	</main>
</div>
@php(do_action('get_footer'))
@include('partials.footer')
@php(wp_footer())
@include('partials.microdata-close')
</body>
</html>
