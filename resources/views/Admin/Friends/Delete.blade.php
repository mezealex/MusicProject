@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/admin/friends/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="friendid" id="friendid" value="{{ $friend->_id }}">
                <div class="form-group">
                        <label for="Episode_Title">Title</label>
                        <input class="form-control" type="text" name="Episode_Title" id="Episode_Title" value="{{ $friend->Episode_Title }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Season">Season</label>
                        <input type="number" name="Season" id="Season" class="form-control" value="{{ $friend->Season }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Summary">Summary</label>
                        <input class="form-control" type="text" name="Summary" id="Summary" value="{{ $friend->Summary }}" disabled>
                    </div>
                    <a href="/admin/friends/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection