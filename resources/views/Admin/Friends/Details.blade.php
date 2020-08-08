@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $friend->Episode_Title}}</b></h4>
                        <p class="card-text"><b>Season: </b> {{ $friend->Season }} Minutes</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Summary: </b> {{ $friend->Summary }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/friends/" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Back</a>
                        <a href="/admin/friends/edit/{{ $friend->_id }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/friends/delete/{{ $friend->_id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
