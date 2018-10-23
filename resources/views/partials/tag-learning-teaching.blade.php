<?php
$post_types = [ 'post', 'page' ];
$limit      = 4;
$tag = 'learning-teaching'; ?>
<h3>Learning + Teaching <img class="mx-2 mb-1" src="@asset('images/green-dots.png')" alt="decorative green dots">
	<small><a href="{{get_site_url()}}/tag/learning-teaching/">view all Learning + Teaching news</a></small>
</h3>
@include('partials.content-related')

