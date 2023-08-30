@extends('dashboard.layout')
@section('title', isset($service['meta']['title']) ? "{$service['meta']['title']} | Edit service" : "Edit service")
@section('content')
<div class="container-fluid">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif


    <div class="row align-items-center mb-3">
        <div class="col-8">
            <a class="d-inline-block align-middle me-2" href="{{ route('services.index') }}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2 class="d-inline-block align-middle m-0">Edit service</h2>
        </div>

    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Uh-oh!</strong> It looks like there were some issues with the information you entered.
    </div>
    @endif

    {!! Form::model($service, ['method' => 'PUT','route' => ['services.update', $service['id']],
    'enctype'=>'multipart/form-data']) !!}
    <div class="card shadow mb-4">
        <div class="card-body">

            <div class="row mb-3">
                <div class="col-12 col-lg-8">
                    <div class="seo">
                        <div class="mb-3">
                            <label for="meta[title]">Title</label>
                            <input type="text"
                                   name="meta[title]"
                                   id="meta[title]"
                                   class="form-control @error('meta.title') is-invalid @enderror"
                                   placeholder="Title"
                                   value="{{ $service['meta']['title'] ?? '' }}"
                            >
                            @error('meta.title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta[description]">Description</label>
                            <textarea style="height:80px"
                                      name="meta[description]"
                                      id="meta[description]"
                                      class="form-control @error('meta.description') is-invalid @enderror"
                                      placeholder="Description"
                            >{{ $service['meta']['description'] ?? '' }}</textarea>
                            @error('meta.description')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta[keywords]">Keywords</label>
                            <textarea style="height:80px"
                                      name="meta[keywords]"
                                      id="meta[keywords]"
                                      placeholder="Keywords"
                                      class="form-control @error('meta.keywords') is-invalid @enderror"
                            >{{ $service['meta']['keywords'] ?? '' }}</textarea>
                            @error('meta.keywords')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta[slug]">Slug</label>
                            <input type="text"
                                   name="meta[slug]"
                                   id="meta[slug]"
                                   class="form-control @error('meta.slug') is-invalid @enderror"
                                   placeholder="Url"
                                   value="{{ $service['meta']['slug'] ?? '' }}"
                            >
                            @error('meta.slug')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="mb-3">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-8">
                                <label for="attachment">Image</label>
                                <input type="file" name="attachment" id="attachment" class="form-control">
                                @error('attachment')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 col-lg-4 text-end">
                                @if(isset($service['attachment']))
                                <div class="d-block">
                                    <img src="{{$service['attachment']['path']}}" class="image"
                                         alt="{{ $service['meta']['title'] ?? '' }}">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" name="active" id="active"
                               value="{{$service['active']}}"
                               {{ $service['active'] ? 'checked' : '' }}>
                        <label class="form-check-label" for="active">
                            Activate
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-icon-split text-white w-100">
                                        <span class="icon text-white-50">
                                            <i class="fa-solid fa-floppy-disk"></i>
                                        </span>
                        <span class="text">Save</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text"
                       name="name"
                       id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Name"
                       value="{{ $service['name'] ?? '' }}"
                >
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="mb-2">Description</label>
                <textarea style="height:110px"
                          name="description"
                          id="description"
                          placeholder="Description"
                          class="form-control @error('description') is-invalid @enderror"
                >{{ $service['description'] }}</textarea>
                @error('description')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="mb-2">Content</label>
                <textarea name="content"
                          id="content"
                          placeholder="Content"
                          class="form-control textarea-content @error('content') is-invalid @enderror"
                >{{ $service['content'] }}</textarea>
                @error('content')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


        </div>
    </div>


    {!! Form::close() !!}
</div>
@endsection

@push('custom-scripts')
<script>
    function handleCheckboxChange(checkbox) {
        checkbox.value = checkbox.checked ? 1 : 0;
    }

    const activeCheckbox = document.getElementById('active');
    activeCheckbox.addEventListener('change', () => handleCheckboxChange(activeCheckbox));

    const isCommentsCheckbox = document.getElementById('is_comments');
    isCommentsCheckbox.addEventListener('change', () => handleCheckboxChange(isCommentsCheckbox));

    checkbox.addEventListener('change', (event) => {
        if (event.currentTarget.checked) {
            checkbox.value = 1;
        } else {
            checkbox.value = 0;
        }

    })
</script>

<script>
    $(document).ready(function () {
        $('#attachment').change(function () {
            var file = $(this)[0].files[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.image').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        });
    });
</script>
@endpush
