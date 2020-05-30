@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container">
            
                {{-- Slider --}}
                <div id="slider" class="">

                    
                    
                    <ul class="slides">
                        @foreach($showSlider as $slide)
                        <li class="slide">
                            <img src="{{ asset($slide->img) }}">
                            <div class="bloc-titre">
                                <h2>
                                    {{ $slide->title }}
                                </h2>
                            </div>
                        </li>
                        @endforeach

{{--                    <li class="slide"><img src="{{ asset('img/img_slider/img_slider_module1.jpg') }}"></li>
                        <li class="slide"><img src="{{ asset('img/img_slider/img_slider_module2.jpg') }}"></li>
                        <li class="slide"><img src="{{ asset('img/img_slider/img_slider_module3.jpg') }}"></li>
                        <li class="slide"><img src="{{ asset('img/img_slider/img_slider_module4.jpg') }}"></li> --}}
    
    
                    </ul>

                        <div class="prev">
                                <img src="{{ asset('img/img_slider/arrow_left.png') }}">
                            </div>
                            <div class="next">
                                <img src="{{ asset('img/img_slider/arrow_right.png') }}">
                            </div>

                </div>
                


        </div>
@endsection
