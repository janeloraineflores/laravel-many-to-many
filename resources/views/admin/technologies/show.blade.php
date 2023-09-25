@extends('layouts.app')

@section('page-title', $technology->title)

@section('main-content')
<div class="container">

    <div class="row mb-4">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
              </table>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h4>
                Projects with this technology:
            </h4>
           <ul>
                @foreach ($technology->projects as $project)
                    <li>
                        <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                            {{ $project->title }}
                        </a>
                    </li>
                @endforeach
           </ul>
        </div>
    </div>

  
</div>
@endsection