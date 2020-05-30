@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel Slider</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Publier</th>
                            <th scope="col">Image</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Actions</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($slider as $sliderInfo)
                          <tr>
                            <th scope="row">{{ $sliderInfo->id }}</th>
                            <td>
                              <label class="switch pr-5 switch-success mr-3 published">
                                  <input class="published" data-id="{{$sliderInfo->id}}" id="published"  name="recipients" type="checkbox" @if($sliderInfo->is_published) checked @endif  >
                              </label>
                            </td>
                            <td><img src="{{ asset($sliderInfo->img_thumb) }}" alt=""></td>
                            <td>{{ $sliderInfo->title }}</td>
                            <td><a href="{{ route('admin.slider.edit', $sliderInfo->id) }}"><button type="button" class="btn btn-primary">Editer</button></a></td>
                            <td>
                              <a href="{{route('admin.slider.destroy', $sliderInfo->id)}} "
                                onclick="event.preventDefault(); document.getElementById('destroy{{$sliderInfo->id}}').submit();"><button type="button" class="btn btn-danger">Supprimer</button></a>
                              <form method="POST" id="destroy{{$sliderInfo->id}}" action="{{route('admin.slider.destroy', $sliderInfo->id)}} "
                                style="display: none;">
                                @csrf
                                @method("DELETE")
                              </form>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                      <div class="text-start">
                      <a href="{{ route('admin.slider.create') }}"><i class="icon-panel fas fa-plus"></i></a>
                      </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
