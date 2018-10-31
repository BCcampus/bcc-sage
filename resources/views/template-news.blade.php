{{--
  Template Name: News Landing Template
--}}

@extends('layouts.full')

@section('content')
	@while(have_posts()) @php(the_post())
	<div class="row">
	<div class="col-sm-6">
		@include('partials.news-feature')
	</div>
	<div class="col-sm-6">
		@include('partials.subscribe')
		@include('partials.news-recent-list')
	</div>
	</div>
	@include('partials.category-open-ed')
	@include('partials.category-learning-teaching')
	@endwhile
@endsection
