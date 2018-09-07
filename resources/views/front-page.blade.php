@extends('layouts.front')

@section('content')
	<span itemscope itemtype="http://schema.org/ItemPage">
		<div class="row">
	  <div class="col-3">
	  @include('partials.children-top-list')
		  @include('partials.children-projects-list')
	  </div>
	  <div class="col-9">
	  @include('partials.news-feature-front')
		  @include('partials.news-recent')
		  @include('partials.events-feature')
		  @include('partials.events-upcoming')
	  </div>
	  </div>
  <span>
@endsection
