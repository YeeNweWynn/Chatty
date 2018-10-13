@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background:#97ddff;">Friends</div>
                <div class="card-body">
                    @foreach($friends as $friend)
                        <div class="card-block">
                            <div class="col-md-12">   
                                <a href="{{url('chat/'.$friend->id)}}" class="each_list">{{$friend->name}}</a><br>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
