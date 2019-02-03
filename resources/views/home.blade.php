@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header"><h1 class="display-4 text-center">Home page</h1></div>
                <div class="card-body">

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-9">

                            @foreach($sections as $section)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$section->title}}</h5>
                                        <p class="card-text">{{$section->text}}</p>
                                        <p class="card-text"><small class="text-muted">{{date('H:i d.m.Y', strtotime($section->created_at))}}</small></p>
                                    </div>
                                    <div id="carouselExampleControls{{$section->id}}" class="carousel slide card-img-bottom"  data-ride="carousel">
                                        <div class="carousel-inner">
                                        @foreach($section->photos as $photo)
                                            <div class="carousel-item @if($loop->first) active @endif">
                                                <a href="{{asset('storage/'.$photo->name)}}" data-fancybox="example_group" data-caption="Увеличенная картинка fancybox">
                                                    <img class="d-block w-100" src="{{asset('storage/'.$photo->name)}}" alt="Space photo {{$photo->id}}">
                                                </a>
                                            </div>
                                        @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls{{$section->id}}" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls{{$section->id}}" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{--
--}}
