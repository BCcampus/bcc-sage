<div class="row-fluid">
	<h4 class="pad">Recent News</h4>
	<ul>
		<?php
		$args = [
			'posts_per_page' => 5
		];?>
		@foreach(\App\App::getLatestNews( $args ) as $news)
			<?php
			// not using $child->guid since guid does not
			// update to current domain when importing content
			$link = site_url() . '/' . $news->post_name;
			$date = date( 'M d, Y', strtotime( $news->post_date ) );
			;?>
			<li>
				<p class="text-left upper">{{$date}}</p>
				<p><a href="{{$link}}" rel="bookmark" title="{{$news->post_title}}">{{$news->post_title}}</a></p>
			</li>
		@endforeach
	</ul>
</div>
