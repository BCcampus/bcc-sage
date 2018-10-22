<h4 class="pt-5">Open Calls for Proposals</h4>
<p>We are looking for applications for the following:</p>
<section class="grants d-flex flex-row flex-wrap">
	@php
		$ids= [155,451]; // open call for proposals is 451 on cert, 155 on prod
		$limit = 4;
		$last_day = 0;
	@endphp
	@foreach(\App\App::getUpcomingEvents( $limit, $ids, $last_day ) as $open)
		<article class="grants-open col-md-6 my-2" itemscope
				 itemtype="http://schema.org/Article">
			<div class="featured-grant row-fluid d-flex"
				 style="background-image: url({{\App\App::getThumbUrl($open['post_id'])}});">
				<h4 class="text-center purple-bkgd text-inverse col-sm mt-auto"><a
						href="{{$open['link']}}">{{wp_specialchars_decode($open['title'])}}</a>
				</h4>
			</div>
			<div class="row-fluid border min-height-md">
				<p class="pt-3 px-2"><?php echo wp_trim_words( $open['post_content'], '30', "<a href='{$open['link']}'>&hellip;<i class='fa fa-arrow-right'></i></a>" );?></p>
			</div>
		</article>
	@endforeach
</section>
