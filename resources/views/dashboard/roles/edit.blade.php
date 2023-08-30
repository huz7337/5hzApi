@extends('dashboard.layout')
@section('title', 'Edit Role')
@section('content')
    <div class="container-fluid">
        <div class="mb-3">
            <a class="d-inline-block align-middle me-2" href="{{ route('roles.index') }}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2 class="d-inline-block align-middle m-0">Edit role</h2>
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

        {!! Form::model($role, ['method' => 'PUT','route' => ['roles.update', $role->id]]) !!}
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <p><strong>Permission:</strong></p>
                            @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                <br/>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
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
    </div>
@endsection
