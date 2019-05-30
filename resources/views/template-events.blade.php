{{--
  Template Name: Events Landing Template
--}}
@php($args = ['posts_per_page'=> 10,'post_type'=>'ai1ec_event',])
@extends('layouts.parent')

@section('content')
	@while(have_posts()) @php(the_post())
	@include('partials.content-page')
	@include('partials.events-hosted')
	@endwhile
@endsection
