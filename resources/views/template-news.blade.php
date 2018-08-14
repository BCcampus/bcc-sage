{{--
  Template Name: News Landing Template
--}}

@extends('layouts.app')

@section('content')
	@while(have_posts()) @php(the_post())
	@include('partials.feature-news')
	@include('partials.subscribe')
	@include('partials.recent-news')
	@include('partials.tag-open-ed')
	@include('partials.tag-open-textbooks')
	@endwhile
@endsection