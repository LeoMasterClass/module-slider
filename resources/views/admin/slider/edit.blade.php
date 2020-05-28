@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel Slider - Edition d'une image</div>

                @if ($errors->has('title'))

                <div class="message error">
                  {{ $errors->first('title')}}
                </div>

                @endif

                <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                    <img src="{{ asset($slider->img) }}" class="rounded mx-auto d-block" alt="...">
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Titre</span>
                            </div>
                            <textarea class="form-control" aria-label="With textarea" name="title">{{ $slider->title }}</textarea>
                          </div>

                    </div>
                    
                    <div class="form-group">

                        <label class="" for="img">Choisir une image</label>
                        <input type="file" class="" id="" name="img">

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection