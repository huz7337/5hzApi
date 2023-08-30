@extends('dashboard.layout')
@section('title', 'Projects')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row align-items-center mb-3">
                <div class="col-12 col-lg-6">
                    <h2>Projects</h2>
                </div>
                <div class="col-12 col-lg-6 text-end">
                    <a class="btn btn-primary btn-icon-split text-white mb-3"
                       href="{{ route('projects.create') }}">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                        <span class="text">Create project</span>
                    </a>
                </div>
            </div>

            @if ($message = Session::get('success'))
            <div class="alert alert-success mb-4">
                {{ $message }}
            </div>
            @endif

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th width="20px">ID</th>
                    <th>Title</th>
                    <th width="10%">Status</th>
                    <th width="10%">Action</th>
                </tr>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project?->name }}</td>
                    <td>
                        @if(!empty($project->active))
                        <div class="alert alert-success p-2 mb-0" role="alert">
                            Active!
                        </div>
                        @else
                        <div class="alert alert-danger p-2 mb-0" role="alert">
                            Disactive
                        </div>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-success btn-circle text-white me-2"
                           href="{{ route('projects.edit', $project->id) }}">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>

                        {!! Form::open(['method' => 'DELETE','route' => ['projects.destroy',
                        $project->id],'style'=>'display:inline']) !!}
                        {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger
                        btn-circle text-white']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </table>
            {!! $projects->links('dashboard.pagination') !!}
        </div>
    </div>
</div>
@endsection
