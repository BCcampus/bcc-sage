<section class="subscribe-box">
	<h4>Subscribe to Our Newsletter</h4>
	<p>Get the latest information on news and events at BCcampus.</p>
	@php($link = site_url() . '/subscribe')
	<form action="{{$link}}">
	<button name="subscribe" type="submit" class="btn btn-primary">Subscribe</button>
	</form>
</section>
