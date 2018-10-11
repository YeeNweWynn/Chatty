@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
	    <div class="col-md-8">
            <div class="card">

                 <div class="card-body">
                    @foreach($chats as $chat)
                        <div class="row">
                            <div>
                                {{$chat->message}}<br/>
                            </div>
                        </div>
                    @endforeach
                </div>
	        </div>
	    </div>
	</div>
</div>
@endsection
