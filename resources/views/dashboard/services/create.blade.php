@extends('dashboard.layout')
@section('title', 'Create service')
@section('content')
<div class="container-fluid">
    <div class="mb-3">
        <a class="d-inline-block align-middle me-2"
           href="{{ route('services.index') }}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h2 class="d-inline-block align-middle m-0">Create service</h2>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Uh-oh!</strong> It looks like there were some issues with the information you entered.
    </div>
    @endif

    {!! Form::model(null, ['method' => 'POST','route' => ['services.store'], 'enctype'=>'multipart/form-data']) !!}

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
                                   value="{{ old('meta.title') }}"
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
                            >{{ old('meta.description') }}</textarea>
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
                            >{{ old('meta.keywords') }}</textarea>
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
                                   value="{{ old('meta.slug') }}"
                            >
                            @error('meta.slug')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="mb-3">
                        <label for="attachment">Images</label>
                        <input type="file" name="attachments[]" id="attachment" class="form-control">
                        @error('attachments')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" name="active" id="active" value="1" checked>
                        <label class="form-check-label" for="active">
                            Activate
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-icon-split text-white w-100">
                        <span class="icon text-white-50">
                            <i class="fa-solid fa-floppy-disk"></i>
                        </span>
                        <span class="text">Create</span>
                    </button>
                </div>
            </div>

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text"
                       name="name"
                       id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Name"
                       value="{{ old('name') }}"
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
                >{{ old('description') }}</textarea>
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
                >{{ old('content') }}</textarea>
                @error('content')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


        </div>
    </div>

    {!! Form::close() !!}
</div>
@endsection
