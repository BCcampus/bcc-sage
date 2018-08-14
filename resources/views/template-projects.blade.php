{{--
  Template Name: Projects Landing Template
--}}

@extends('layouts.app')

@section('content')
	@while(have_posts()) @php(the_post())
	@include('partials.content-page')
	@include('partials.projects-children')
	@include('partials.related-news')
	@include('partials.related-events')
	@endwhile
@endsection
