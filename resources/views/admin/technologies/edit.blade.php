@extends('layouts.app')

@section('page-title', 'Edit')

@section('main-content')
<div class="container">
    <div class="row py-5">
        <div class="col bg-light">

            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.technologies.update', ['technology' => $technology->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input technology="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" placeholder="Write here..." required
                        value="{{ old('title', $type->title) }}">
                    @error('title')
                        <div class="alert alert-danger my-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Write here..."
                        value="{{ old('slug', $type->slug) }}">
                    @error('slug')
                        <div class="alert alert-danger my-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <div class="text-center">
                    <button type="submit" class="btn btn-danger w-25">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection