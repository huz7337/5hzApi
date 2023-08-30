@extends('dashboard.layout')
@section('title', 'Edit User')
@section('content')
    <div class="container-fluid">
        <div class="mb-3">
            <a class="d-inline-block align-middle me-2" href="{{ route('users.index') }}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2 class="d-inline-block align-middle m-0">Edit user</h2>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::model($user, ['method' => 'PUT','route' => ['users.update', $user->id]]) !!}
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, ['placeholder' => 'Name','class' => 'form-control']) !!}
                        </div>

                        <div class="mb-3">
                            <strong>Email:</strong>
                            {!! Form::text('email', null, ['placeholder' => 'Email','class' => 'form-control']) !!}
                        </div>

                        <div class="mb-3">
                            <strong>Password:</strong>
                            {!! Form::password('password', ['placeholder' => 'Password','class' => 'form-control']) !!}
                        </div>

                        <div class="mb-3">
                            <strong>Confirm Password:</strong>
                            {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password','class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Role:</strong>
                            {!! Form::select('roles[]', $roles,$userRole, ['class' => 'form-control','multiple']) !!}
                        </div>
                        <button type="submit" class="btn btn-primary btn-icon-split text-white">
                                        <span class="icon text-white-50">
                                            <i class="fa-solid fa-floppy-disk"></i>
                                        </span>
                            <span class="text">Submit</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
