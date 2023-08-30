@extends('dashboard.layout')
@section('title', 'Comments')
@section('content')
    <div class="container-fluid">
        @include('dashboard.components.postButtons')

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row align-items-center mb-3">
                    <div class="col-12 col-lg-6">
                        <h2>Comments</h2>
                    </div>
                    <div class="col-12 col-lg-6 text-end">
                        <a class="btn btn-primary btn-icon-split text-white mb-3"
                           href="{{ route('comments.create') }}">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                            <span class="text">Create comment</span>
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
                        <th>Comment</th>
                        <th>Type</th>
                        <th>Type</th>
                        <th width="10%">Approve</th>
                        <th width="10%">Action</th>
                    </tr>
                    @foreach ($comments as $key => $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>{{ $comment->commentable_id }}</td>
                            <td>{{ $comment->commentable_type }}</td>
                            <td>
                                @if(!empty($comment->is_approved))
                                    <div class="alert alert-success mb-0" role="alert">
                                        Approve!
                                    </div>
                                @else
                                    <div class="alert alert-danger mb-0" role="alert">
                                        NOT Approve!
                                    </div>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-success btn-circle text-white me-2"
                                   href="{{ route('comments.edit',$comment->id) }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                {!! Form::open(['method' => 'DELETE','route' => ['comments.destroy', $comment->id],'style'=>'display:inline']) !!}
                                {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-circle text-white']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="pagination justify-content-center">
                    {!! $comments->links('dashboard.pagination') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
