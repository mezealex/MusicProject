@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Friends</h1>
                <a class="text-right" href="/admin/friends/create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Season</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($friends as $friend)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $friend->Episode_Title }}</td>
                        <td>{{ $friend->Season }}</td>
                        <td>
                            <a href="/admin/friends/{{ $friend->_id }}">Details</a> |
                            <a href="/admin/friends/edit/{{ $friend->_id }}">Edit</a> |
                            <a href="/admin/friends/delete/{{ $friend->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection