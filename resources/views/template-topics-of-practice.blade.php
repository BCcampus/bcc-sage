{{--
  Template Name: Topics of Practice Landing Template
--}}

@extends('layouts.app')

@section('content')
	@while(have_posts()) @php(the_post())
	@include('partials.content-page')
	@include('partials.children-top')
	@include('partials.news-related')
	@include('partials.events-related')
	@endwhile
@endsection
