@extends('dashboard.layout')
@section('title', 'Create New Comment')
@section('content')
    <div class="container-fluid">
        <div class="mb-3">
            <a class="d-inline-block align-middle me-2" href="{{ route('comments.index') }}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2 class="d-inline-block align-middle m-0">Create category</h2>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::open(['route' => ['comments.store','method'=>'POST'], 'enctype'=>'multipart/form-data']) !!}
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="mb-3">
                    <label>Comment:</label>
                    {!! Form::text('comment', null, ['placeholder' => 'Your comment','class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    <label>Post:</label>
                    {{--                    {!! Form::select('post_id', $posts,[], ['class' => 'form-control']) !!}--}}
                    {!! Form::select('post_id',[null=>'Please Select'] + $posts,[], ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    <label>Page:</label>
                    {{--                    {!! Form::select('page_id', $pages,[], ['class' => 'form-control']) !!}--}}
                    {!! Form::select('page_id',[null=>'Please Select'] + $pages,[], ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    <strong>Images</strong>
                    <input type="file" name="attachments[]" class="form-control" multiple>
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
