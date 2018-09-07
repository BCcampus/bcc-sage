{{--
  Template Name: About Us Landing Template
--}}

@extends('layouts.parent')

@section('content')
	@while(have_posts()) @php(the_post())
	@include('partials.content-page')
	@endwhile
@endsection
