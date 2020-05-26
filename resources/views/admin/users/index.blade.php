@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel Utilisateur</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                          <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @can('edit-users')
                                <form action="{{ route('admin.users.edit', $user->id) }}" method="POST" class="d-inline">
                                    <button type="button" class="btn btn-primary">Editer</button>
                                </form>
                                @endcan
                            </td>
                            <td>
                                @can('delete-users')
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    <button type="button" class="btn btn-danger">Supprimer</button>
                                </form>
                                @endcan
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
</div>
@endsection