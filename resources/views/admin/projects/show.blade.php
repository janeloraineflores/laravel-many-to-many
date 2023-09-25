@extends('layouts.app')

@section('page-title', $project->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h1>
                            {{ $project->title }}
                        </h1>
                        <h6>
                            Slug: {{ $project->slug }}
                        </h6>
                        <div>

                            <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}" class="btn btn-warning">
                                Modifica
                            </a>
                            <form class="d-inline-block" action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}" method="project" onsubmit="return confirm('Sei sicuro di voler eliminare questo project?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    Elimina
                                </button>
                            </form>
                        </div>
                    </div>

                    <hr>

                    <p>
                        {{ $project->content }}
                    </p>

                    <hr>

                    <div>
                        <h3>
                            Tags:
                        </h3>
                        <div>
                            @forelse ($project->technologies as $technology)
                                <span class="badge rounded-pill text-bg-primary">
                                    {{ $technology->title }}
                                </span>
                            @empty
                                No technology associated with this project
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection