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
                <div class="slider-outer">
                    <img src="{{ asset(img\img_slider\arrow_left.png) }}" class="prev" alt="Prev">
                    <div class="slider-inner">
                      <img src="{{ asset(img\img_slider\img_slider_module1.jpg) }}" class="active">
                      <img src="{{ asset(img\img_slider\img_slider_module2.jpg) }}">
                      <img src="{{ asset(img\img_slider\img_slider_module3.jpg) }}">
                    </div>
                    <img src="{{ asset(img\img_slider\arrow_right.png) }}" class="next" alt="Next">
                  </div>
        </div>
@endsection
