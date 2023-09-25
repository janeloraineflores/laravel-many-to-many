@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        You're logged in!
                    </h1>
                    <br>
                    The dashboard is a private page (protected by middleware)
                </div>
            </div>
        </div>
    </div>
@endsection