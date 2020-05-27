@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel Slider - Ajout d'une image</div>

                @if ($errors->has('title'))

                <div class="message error">
                  {{ $errors->first('title')}}
                </div>

                @endif

                <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                  @csrf
                    <div class="form-group">

                      <label for="title">Titre:</label>
                      <input type="text" class="form-control" placeholder="Titre" id="title" value="{{ old('title') }}" name="title">

                    </div>
                    
                    <div class="form-group">

                        <label class="" for="img">Choisir une imgae</label>
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
