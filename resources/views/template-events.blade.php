{{--
  Template Name: Events Landing Template
--}}
@php($args = ['posts_per_page'=> 3,'post_type'=>'ai1ec_event',])
@extends('layouts.full')

@section('content')
    @while(have_posts()) @php(the_post())
    <div class="row">
        <div class="col">
            @include('partials.events-feature')
        </div>
        @include('partials.content-page')
    </div>

    <section class="featured-events-front d-flex flex-row flex-wrap">
        <article class="events-box-md col-sm d-flex">
            <div class="featured-event col-sm d-flex"
                 style="background-image: url({{get_stylesheet_directory_uri() . '/assets/images/placeholder-image-300x200.jpg'}});">
                <h4 class="purple-bkgd col-sm mt-auto">Edtech Demos</div>
        </article>
        <article class="events-box-md col-sm d-flex">
            <div class="featured-event col-sm d-flex"
                 style="background-image: url({{get_stylesheet_directory_uri() . '/assets/images/placeholder-image-300x200.jpg'}});">
                <h4 class="purple-bkgd col-sm mt-auto">Other Demos</h4></div>
        </article>
    </section>

    <section class="featured-events-front d-flex flex-row flex-wrap">
        <article class="events-box-md col-sm d-flex">
            <ul class="events-list col-sm">
                @foreach(\App\App::getEvents( 'edtech', $args ) as $recent )
                    @php($date = date( 'M d, Y', strtotime( $recent->post_date ) ))
                    <li class="border">
                        <p class="upper">{{$date}}</p>
                        <p><a href="{{$link}}" rel="bookmark"
                              title="{{$recent->post_title}}">{{$recent->post_title}}</a>
                        </p>
                    </li>
                @endforeach
            </ul>
        </article>

        <article class="events-box-md col-sm d-flex">
            <ul class="events-list col-sm">
                @foreach(\App\App::getEvents( 'fol', $args ) as $recent )
                    @php($date = date( 'M d, Y', strtotime( $recent->post_date ) ))
                    <li class="border">
                        <p class="upper">{{$date}}</p>
                        <p><a href="{{$link}}" rel="bookmark"
                              title="{{$recent->post_title}}">{{$recent->post_title}}</a>
                        </p>
                    </li>
                @endforeach
            </ul>
        </article>
    </section>

    <section class="featured-events-front d-flex flex-row flex-wrap">
        <div class="col-sm d-flex">
            <h4>
                <small><a href="/events_categories/edtech">EdTech Archives</a></small>
            </h4>
        </div>
        <div class="col-sm d-flex">
            <h4>
                <small><a href="/events_categories/fol">FOL Archives</a></small>
            </h4>
        </div>
    </section>


    @endwhile
@endsection
