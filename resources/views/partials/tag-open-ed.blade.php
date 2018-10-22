<?php
$post_types = [ 'post', 'page' ];
$limit      = 4;
$tag = 'open education'; ?>
<h3>Open Education <img class="mx-2 mb-1" src="@asset('images/green-dots.png')" alt="decorative green dots">
	<small><a href="{{get_site_url()}}/tag/open-education/">view all Open Education news</a></small>
</h3>
@include('partials.content-related')
