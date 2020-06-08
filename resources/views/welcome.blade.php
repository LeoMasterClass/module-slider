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
    
                    </ul>

                    <div class="controls"><button type="button" class="next btn btn-primary">Suivant</button></div>
                    <div class="controls"><button type="button" class="prev btn btn-primary">Précédent</button></div>
                    
                </div>
                


        </div>
@endsection
