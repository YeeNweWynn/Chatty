@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
	    <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background:#97ddff;">{{$friend->name}}</div>
                <div class="card-body" >                        
                    <div id="app">
                        <chat v-bind:userid="{{Auth::id()}}" v-bind:friendid="{{$friend->id}}"></chat>
                    </div>
                </div>
	        </div>
	    </div>
	</div>
</div>
@endsection
