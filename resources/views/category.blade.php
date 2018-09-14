@extends('layouts.app')
@section('content')
	<h2>@php(the_category( '&nbsp;' ))</h2>
	@while(have_posts()) @php(the_post())
	<span itemscope itemtype="http://schema.org/ItemPage">
    @include('partials.content')
  </span>
	@endwhile
	<div class="pad-top pad-bottom">
	<?php echo paginate_links();?>
	</div>
@endsection
