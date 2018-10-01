@extends('layouts.front')

@section('content')
	<span itemscope itemtype="http://schema.org/ItemPage">
		<div class="row mt-sm-4">
	  <div class="col-sm-4">
	  @include('partials.children-top-list')
		  @include('partials.children-projects-list')
	  </div>
	  <div class="col-sm-8">
	  @include('partials.news-feature-front')
		  @include('partials.news-recent')
		  @include('partials.events-feature')
		  @include('partials.events-upcoming')
	  </div>
	  </div>
  <span>
@endsection
