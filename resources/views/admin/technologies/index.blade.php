@extends('layouts.app')

@section('page-title', 'All Technologies')

@section('main-content')
    <div class="row">
        <div class="col">

            <a href="{{ route('admin.technologies.create') }}" class="btn btn-success w-100 mb-5 ">
                + Add
            </a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                        <tr>
                            <th scope="row">
                                {{ $technology->id }}
                            </th>
                            <td>
                                {{ $technology->title }}
                            </td>
                            <td>
                                {{ $technology->slug }}
                            </td>
                            <td>
                                <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="btn btn-primary">
                                    See
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}" class="btn btn-danger">
                                    Update
                                </a>
                            </td>
                            <td>
                                <form
                                    action="{{ route('admin.technologies.destroy', ['technology' => $technology->id]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-warning">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection