@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header"><h1 class="display-4 text-center">Event {{$event->id}}</h1></div>
                <div class="card-body">

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-9">

                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$event->title}}</h5>
                                        <p class="card-text">{{$event->text}}</p>
                                        <p class="card-text"><small class="text-muted">{{date('H:i d.m.Y', strtotime($event->created_at))}}</small></p>
                                    </div>
                                    <div id="carouselExampleControls" class="carousel slide card-img-bottom"  data-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach($event->photos as $photo)
                                                <div class="carousel-item @if($loop->first) active @endif">
                                                    <a href="{{asset('storage/'.$photo->name)}}" data-fancybox="example_group" data-caption="Увеличенная картинка fancybox">
                                                        <img class="d-block w-100" src="{{asset('storage/'.$photo->name)}}" alt="Space photo {{$photo->id}}">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="card mb-3" id="application_card">
                                    <div class="card-body p-3">
                                        <h5 class="card-title mb-3">The application for the event</h5>
                                        <form action="{{route('events.apply',['event'=>$event->id])}}" id="application_form" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="surname">Surname</label>
                                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter surname" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="education_level">Education level</label>
                                                <select class="form-control" id="education_level" name="education_level" required>
                                                    <option default disabled>Choose education level</option>

                                                @foreach($educationLevels as $educationLevel)
                                                    <option value="{{$educationLevel}}">{{$educationLevel}}</option>
                                                @endforeach

                                                </select>
                                            </div>

                                            <input type="hidden" name="ip" value="{{$request->ip()}}">
                                            <input type="hidden" name="utm" value="{{array_key_exists(1, $urlData = explode('?',$request->fullUrl())) ? $urlData[1] : ''}}">

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>

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
