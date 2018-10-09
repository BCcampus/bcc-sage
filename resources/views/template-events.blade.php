{{--
  Template Name: Events Landing Template
--}}
@php($args = ['posts_per_page'=> 3,'post_type'=>'ai1ec_event',])
@extends('layouts.full')

@section('content')
	@while(have_posts()) @php(the_post())
	@include('partials.events-feature')
	@include('partials.content-page')
	<section class="mt-3">
		<div class="d-flex flex-row flex-wrap">
			<div class="col-md-6">
				<div class="featured-event row-fluid d-flex"
					 style="background-image: url({{\App\App::getThumbUrl($recent->ID)}});">
					<h4 class="purple-bkgd col-sm mt-auto">EdTech Demos</h4>
				</div>
				@php($filter=[794,18787])
				@php($limit=5)
				@include('partials.events-list')
				<p>
					<a href="{{ site_url() }}/events_categories/edtech">EdTech Archives</a>
				</p>
			</div>

			<div class="col-md-6">
				<div class="featured-event row-fluid d-flex"
					 style="background-image: url({{\App\App::getThumbUrl($recent->ID)}});">
					<h4 class="purple-bkgd col-sm mt-auto">Facilitating Learning Online</h4>
				</div>
				@php($filter=[793,17882])
				@php($limit=5)
				@include('partials.events-list')
				<p>
					<a href="{{ site_url() }}/events_categories/flo">FLO Archives</a>
				</p>
			</div>
		</div>
	</section>
	@endwhile
@endsection
