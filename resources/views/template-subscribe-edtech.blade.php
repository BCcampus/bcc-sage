{{--
  Template Name: EdTech Subscribe Landing Template
--}}

@extends('layouts.parent')

@section('content')
	@while(have_posts()) @php(the_post())
	@include('partials.content-page')
	@include('partials.subscribe-edtech-form')
	@endwhile
@endsection
