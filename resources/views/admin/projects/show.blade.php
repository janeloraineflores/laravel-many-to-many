@extends('layouts.app')

@section('page-title', $project->title)

@section('main-content')
<div class="container">

    <div class="row py-5">
        <div class="col-12 bg-light">
            <h1>
                {{ $project->title }}
            </h1>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Content</th>
                <th scope="col">Actions</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">
                    {{ $project->id }}
                </th>
                <td>
                    {{ $project->title }}
                </td>
                <td>
                    {{ $project->slug }}
                </td>
                <td>
                    {{ $project->content }}
                </td>
                <td>
                    <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}" class="btn btn-danger">
                        Update
                    </a>
                </td>
                <td>
                    <form
                        action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                        method="POST"
                        onsubmit="return confirm('Sei sicuro di voler cancellare questo elemento?');">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" class="btn btn-warning">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
      </table>
</div>
@endsection