<section class="subscribe-box">
	<h4>Subscribe to EdTech Demos</h4>
	<p>Signup to be notified of upcoming demonstrations.</p>
	@php($link = site_url() . '/edtech-demo-subscribe/')
	<form action="{{$link}}">
		<button name="subscribe" type="submit" class="btn btn-primary">Subscribe</button>
	</form>
</section>
