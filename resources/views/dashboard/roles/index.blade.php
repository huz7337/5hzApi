@extends('dashboard.layout')
@section('title', 'Roles')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row align-items-center mb-3">
                    <div class="col-12 col-lg-6">
                        <h2>Roles</h2>
                    </div>
                    <div class="col-12 col-lg-6 text-end">
                        <a class="btn btn-primary btn-icon-split text-white mb-3"
                           href="{{ route('roles.create') }}">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                            <span class="text">Create role</span>
                        </a>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif

                <table class="table table-bordered">
                    <tr>
                        <th width="20px">ID</th>
                        <th>Name</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn btn-success btn-circle text-white me-2"
                                   href="{{ route('roles.edit',$role->id) }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>

                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-circle text-white']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="pagination justify-content-center">
                    {!! $roles->links('dashboard.pagination') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
