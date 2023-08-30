@extends('dashboard.layout')
@section('title', 'Users')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 mb-4">
                <div class="col">
                    <a class="btn btn-light btn-icon-split w-100"
                       href="{{ route('roles.index') }}"
                    >
                <span class="icon text-gray-600">
                   <i class="fa-solid fa-lock"></i>
                </span>
                        <span class="text">Roles</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row align-items-center mb-3">
                <div class="col-12 col-lg-6">
                    <h2>Users</h2>
                </div>
                <div class="col-12 col-lg-6 text-end">
                    <a class="btn btn-primary btn-icon-split text-white mb-3"
                       href="{{ route('users.create') }}">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                        <span class="text">Create user</span>
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
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="10%">Action</th>
                </tr>
                @foreach ($data as $key => $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                        <label class="badge bg-secondary">{{ $v }}</label>
                        @endforeach
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-success btn-circle text-white me-2"
                           href="{{ route('users.edit',$user->id) }}">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>

                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy',
                        $user->id],'style'=>'display:inline']) !!}
                        {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger
                        btn-circle text-white']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
