@extends('dashboard.layout')
@section('title', 'Create New Position')
@section('content')
    <div class="container-fluid">
        <div class="mb-3">
            <a class="d-inline-block align-middle me-2" href="{{ route('positions.index') }}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2 class="d-inline-block align-middle m-0">Create position</h2>
        </div>

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

        {!! Form::open(['route' => 'positions.store','method'=>'POST']) !!}
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="mb-3">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, ['placeholder' => 'Name','class' => 'form-control']) !!}
                </div>
                <button type="submit" class="btn btn-primary btn-icon-split text-white">
                                        <span class="icon text-white-50">
                                            <i class="fa-solid fa-floppy-disk"></i>
                                        </span>
                    <span class="text">Create</span>
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
