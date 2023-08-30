@extends('dashboard.layout')
@section('title', 'Categories')
@section('content')
    <div class="container-fluid">
        @include('dashboard.components.postButtons')

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row align-items-center mb-3">
                    <div class="col-12 col-lg-6">
                        <h2>Categories</h2>
                    </div>
                    <div class="col-12 col-lg-6 text-end">
                        <a class="btn btn-primary btn-icon-split text-white mb-3"
                           href="{{ route('categories.create') }}">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                            <span class="text">Create category</span>
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
                        <th width="10%">Action</th>
                    </tr>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a class="btn btn-success btn-circle text-white me-2"
                                   href="{{ route('categories.edit',$category->id) }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id],'style'=>'display:inline']) !!}
                                {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-circle text-white']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="pagination justify-content-center">
                    {!! $categories->links('dashboard.pagination') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
