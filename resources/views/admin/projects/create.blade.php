@extends('layouts.app')

@section('page-title', 'Create new project')

@section('main-content')
<div class="container">
    <div class="row py-5">
        <div class="col bg-light">

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Write here..."  maxlength= "255" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="alert alert-danger my-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <input type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Write here..." value="{{ old('content') }}" required>
                    @error('content')
                        <div class="alert alert-danger my-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cover_img" class="form-label">Cover Image</label>
                    <input class="form-control" type="file" name="cover_img" accept="image/*">
                </div>
                  

                <div class="mb-3">
                    <label class="form-label d-block">Technology</label>
                    @foreach ($technologies as $technology)
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="technologies[]"
                                id="technology-{{ $technology->id }}"
                                value="{{ $technology->id }}"
                                @if (
                                    in_array(
                                        $technology->id,
                                        old('technologies', [])
                                    )
                                )
                                    checked
                                @endif
                                >
                            <label class="form-check-label" for="technology-{{ $technology->id }}">
                                {{ $technology->title }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success w-25">
                        + Add
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection