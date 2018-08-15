@extends('layouts.front')

@section('content')
	<span itemscope itemtype="http://schema.org/ItemPage">
	  <div class="container-fluid">
		  {!! do_shortcode('[smartslider3 slider=4]') !!}
	  </div>
		<div class="row">
	  <div class="col-4">
	  @include('partials.children-top')
		  @include('partials.children-projects')
	  </div>
	  <div class="col-8">
	  @include('partials.news-feature')
		  @include('partials.news-recent')
		  @include('partials.events-feature')
		  @include('partials.events-upcoming')
	  </div>
	  </div>
  <span>
@endsection
