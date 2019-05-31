{{--
  Template Name: Grants Landing Template
--}}

@extends('layouts.app')

@section('content')
	@while(have_posts()) @php(the_post())
	@include('partials.content-page')
	@include('partials.children-grants')
	@include('partials.children-open-calls')
	@endwhile
@endsection
