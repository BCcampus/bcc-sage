<?php
$post_types = [ 'post', 'page' ];
$limit      = 4;
$tag = 'open textbooks'
; ?>
<h3>Open Textbooks <img class="mx-2 mb-1" src="@asset('images/green-dots.png')" alt="decorative green dots">
	<small><a href="{{get_site_url()}}/tag/open-textbooks/">view all Open Textbooks news</a></small>
</h3>
@include('partials.content-related')

