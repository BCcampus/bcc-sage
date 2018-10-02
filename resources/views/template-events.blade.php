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
					 style="background-image: url({{get_stylesheet_directory_uri() . '/assets/images/placeholder-image-300x200.jpg'}});">
					<h4 class="purple-bkgd col-sm mt-auto">EdTech Demos</h4>
				</div>

				<ul class="events-list">
					@foreach(\App\App::getEvents( 'edtech', $args ) as $recent )
						@php($link = site_url() . '/' . $recent->post_name)
						@php($date = date( 'M d, Y', strtotime( $recent->post_date ) ))
						<li class="border">
							<p class="text-uppercase">{{$date}}</p>
							<p><a href="{{$link}}" rel="bookmark"
								  title="{{$recent->post_title}}">{{$recent->post_title}}</a>
							</p>
						</li>
					@endforeach
				</ul>
				<h4>
					<small><a href="{{ site_url() }}/events_categories/edtech">EdTech Archives</a></small>
				</h4>
			</div>

			<div class="col-md-6">
				<div class="featured-event row-fluid d-flex"
					 style="background-image: url({{get_stylesheet_directory_uri() . '/assets/images/placeholder-image-300x200.jpg'}});">
					<h4 class="purple-bkgd col-sm mt-auto">Facilitating Learning Online</h4>
				</div>

				<ul class="events-list">
					@foreach(\App\App::getEvents( 'flo', $args ) as $recent )
						@php($link = site_url() . '/' . $recent->post_name)
						@php($date = date( 'M d, Y', strtotime( $recent->post_date ) ))
						<li class="border">
							<p class="text-uppercase">{{$date}}</p>
							<p><a href="{{$link}}" rel="bookmark"
								  title="{{$recent->post_title}}">{{$recent->post_title}}</a>
							</p>
						</li>
					@endforeach
				</ul>
				<h4>
					<small><a href="{{ site_url() }}/events_categories/flo">FLO Archives</a></small>
				</h4>
			</div>
		</div>
	</section>
	@endwhile
@endsection
