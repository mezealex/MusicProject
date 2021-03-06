@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Friends</h1>
                <div class="row">
                        @foreach($friends as $friend)
                        <div class="card col-md-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $friend->Episode_Title }}</h5>
                                <p class="card-text">Season: {{ $friend->Season }}</p>
                                <a href="/friends/{{ $friend->_id }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-12 ">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mx-auto" role="group" aria-label="First group">
                                    @php 
                                        $cpage = request('pg') == 0 ? 1 : request('pg');
                                    @endphp

                                    <a href ="/friends?pg={{ $cpage - 1 }}" class="btn btn-secondary {{ $cpage == 1 ? 'disabled' : '' }}">&lt</a>
                                    @for ($i = 1; $i <= ceil($friendCount/10); $i++)
                                    <a href="/friends?pg={{$i}}" class="btn btn-secondary {{ $cpage == $i ? 'disabled' : ''}}">{{$i}}</a>
                                    @endfor
                                    <a href="/friends?pg={{ $cpage + 1}}" class="btn btn-secondary {{$cpage == ceil($friendCount/10) ? 'disabled' : '' }}">&gt</a>
                                </div>
                          </div>
                     </div>
                 </div>
                 <br>
            </div>
        </div>
    </div>
@endsection
