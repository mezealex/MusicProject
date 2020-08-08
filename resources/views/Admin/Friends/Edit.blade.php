@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit</h1>
                <form action="/admin/friends/edit" method= "POST">
                @csrf
                <input type="hidden" name="friendid" id="friendid" value="{{ $friend->_id }}">
                <div class="form-group">
                        <label for="Episode_Title">Title</label>
                        <input class="form-control" type="text" name="Episode_Title" id="Episode_Title" value="{{ $friend->Episode_Title }}">
                    </div>
                    <div class="form-group">
                        <label for="Season">Season</label>
                        <input type="number" name="Season" id="Season" class="form-control" value="{{ $friend->Season }}">
                    </div>
                    <div class="form-group">
                        <label for="Summary">Summary</label>
                        <input class="form-control" type="text" name="Summary" id="Summary" value="{{ $friend->Summary }}">
                    </div>
                <a href="/admin/friends/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection