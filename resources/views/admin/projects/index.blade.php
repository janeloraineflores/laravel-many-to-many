@extends('layouts.app')

@section('page-title', 'All Projects')

@section('main-content')
    <div class="row">
        <div class="col">

            <a href="{{ route('admin.projects.create') }}" class="btn btn-success w-100 mb-5 ">
                + Add
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">
                                {{ $project->id }}
                            </th>
                            <td>
                                {{ $project->title }}
                            </td>
                            <td>
                                {{ $project->content }}
                            </td>
                            <td>
                                <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}" class="btn btn-primary">
                                    See
                                </a>
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
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection