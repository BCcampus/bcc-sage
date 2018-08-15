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
		@include('partials.news-recent')
	</div>
	</div>
	@include('partials.tag-open-ed')
	@include('partials.tag-open-textbooks')
	@endwhile
@endsection
