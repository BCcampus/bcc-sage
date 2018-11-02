<?php
$post_types = [ 'post' ];
$limit      = 4;
$category_name = 'Open Education'; ?>
<h3 class="mt-2">Open Education <img class="mx-2 mb-1" src="@asset('images/green-dots.png')" alt="decorative green dots">
	<small><a href="{{get_site_url()}}/category/open-education/">view all Open Education news</a></small>
</h3>
@include('partials.content-related')
