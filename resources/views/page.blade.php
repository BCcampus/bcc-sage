@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
  <span itemscope itemtype="http://schema.org/ItemPage">
    @include('partials.content-page')
  </span>
  @endwhile
@endsection
