<section class="subscribe-box">
	<p>Get the latest information on news and events by subscribing to the BCcampus newsletter.</p>
	@php($link = site_url() . '/subscribe')
	<form action="{{$link}}">
	<button name="subscribe" type="submit" class="btn btn-primary">Subscribe</button>
	</form>
</section>
