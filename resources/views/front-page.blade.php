@extends('layouts.app')

@section('content')
  {{--@debug('hierarchy')--}}
  {{--@debug('controller')--}}
  {{--@debug('dump')--}}
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
@endsection
