<section class="row-fluid recent-news">
	<h4 class="pad-top">Recent News</h4>
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
			$cat = get_the_category( $news->ID );
			;?>

			<li class="border-top">
				<small><p class="upper"><time itemprop="datePublished" class="updated" datetime="{{ get_post_time('c', true, $news->ID) }}">{{ get_the_date('',$news->ID) }}</time> &nbsp;<i class="fa fa-circle green small"></i>&nbsp; <a href="<?php echo esc_url( get_category_link( $cat[0]->term_id ) ) ;?>">{{$cat[0]->name}}</a></p></small>
				<h4><a href="{{$link}}" rel="bookmark" title="{{$news->post_title}}">{{$news->post_title}}</a></h4>
			</li>
		@endforeach
		<li class="border-top">
			<p><a href="{{ site_url() }}/bccampus-news">View all recent news</a></p>
		</li>
	</ul>
</section>
