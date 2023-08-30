@extends('dashboard.layout')
@section('title', "$comment->title | Edit post")
@section('content')
    <div class="container-fluid">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

            <div class="row align-items-center mb-3">
                <div class="col-12 col-lg-6 mb-3">
                    <a class="d-inline-block align-middle me-2" href="{{ route('comments.index') }}">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h2 class="d-inline-block align-middle m-0">Edit comment</h2>
                </div>
                <div class="col-12 col-lg-6 mb-3 text-end">
                    <ul class="post-images">
                        @foreach ($comment->attachments as $attachment)
                            <li>
                                <img src="{{asset("storage/$attachment->path")}}" alt="">

                                {!! Form::open(['method' => 'DELETE','route' => ['attachments.destroy', $attachment->id],'class'=>'remove']) !!}
                                {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-circle text-white']) !!}
                                {!! Form::close() !!}
                            </li>
                        @endforeach
                    </ul>
                </div>
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

        {!! Form::model($comment, ['method' => 'PUT','route' => ['comments.update', $comment->id], 'enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Comment:</strong>
                            {!! Form::text('comment', $comment->comment, ['placeholder' => 'Comment','class' => 'form-control']) !!}
                        </div>
                        <div class="mb-3">
                            <strong>Images</strong>
                            <input type="file" name="attachments[]" class="form-control" multiple>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="is_approved"
                                   value="{{(bool)$comment->is_approved}}"
                                   id="is_approved" {{ $comment->is_approved ? 'checked' : '' }}>
                            <label class="form-check-label mb-3" for="is_approved">
                                Approve comment
                            </label>
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

@push('custom-scripts')
    <script>
        const checkbox = document.getElementById('is_approved')

        checkbox.addEventListener('change', (event) => {
            if (event.currentTarget.checked) {
                checkbox.value = 1;
            } else {
                checkbox.value = 0;
            }

        })
    </script>
@endpush
