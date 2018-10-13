@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Friends</div>
                <div class="card-body">
                    @foreach($friends as $friend)
                        <div class="card-block">
                            <div class="col-md-6 ">   
                                <a href="{{url('chat/'.$friend->id)}}">{{$friend->name}}</a><br>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
