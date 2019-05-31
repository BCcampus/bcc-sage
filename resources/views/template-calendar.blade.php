{{--
  Template Name: Calendar Landing Template
--}}
@php($args = ['posts_per_page'=> 3,'post_type'=>'ai1ec_event',])
@extends('layouts.full')

@section('content')
	@while(have_posts()) @php(the_post())
	@include('partials.content-page')
	<section class="mt-3">
		<div class="d-flex flex-row flex-wrap">
			<div class="col-md-6">
				<div class="featured-event row-fluid d-flex"
					 style="background-image: url(../assets/images/edtech.jpg);">
					<h4 class="purple-bkgd col-sm mt-auto text-inverse"><a href="{{ site_url() }}/events_categories/edtech">EdTech Demos</a></h4>
				</div>
				@php($ids=[794,18787])
				@php($limit=5)
				@include('partials.events-list')
			</div>

			<div class="col-md-6">
				<div class="featured-event row-fluid d-flex"
					 style="background-image: url(../assets/images/flo.jpg);">
					<h4 class="purple-bkgd col-sm mt-auto text-inverse"><a href="{{ site_url() }}/events_categories/flo">Facilitating Learning Online</a></h4>
				</div>
				@php($ids=[793,17882])
				@php($limit=5)
				@include('partials.events-list')
			</div>
		</div>
	</section>
	@endwhile
@endsection
