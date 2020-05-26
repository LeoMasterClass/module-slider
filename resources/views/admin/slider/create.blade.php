@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel Slider - Ajout d'une image</div>

                <form action="/admin/slider/create">
                    <div class="form-group">
                      <label for="email">Email address:</label>
                      <input type="email" class="form-control" placeholder="Enter email" id="email">
                    </div>
                    <div class="form-group">
                      <label for="img_thumbnail">Image vignette:</label>
                      <input type="file" name="img_thumbnail" class="form-control" placeholder="Enter password" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="img">Image slider:</label>
                        <input type="file" name="img" class="form-control" placeholder="Enter password" id="pwd">
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
