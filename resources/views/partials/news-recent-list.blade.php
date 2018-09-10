<section class="row-fluid recent-news">
	<h4 class="pad">Recent News</h4>
	<ul>
		<?php
		$args = [
			'posts_per_page' => 3
		];?>
		@foreach(\App\App::getLatestNews( $args ) as $news)
			<?php
			// not using $child->guid since guid does not
			// update to current domain when importing content
			$link = site_url() . '/' . $news->post_name;
			$date = date( 'M d, Y', strtotime( $news->post_date ) );
			;?>
			<li class="border-top">
				<p class="upper">{{$date}}</p>
				<p><a href="{{$link}}" rel="bookmark" title="{{$news->post_title}}">{{$news->post_title}}</a></p>
			</li>
		@endforeach
		<li class="border-top">
			<p><a href="<?php get_site_url(); ?>/bccampus-news">View all recent news</a></p>
		</li>
	</ul>
</section>
