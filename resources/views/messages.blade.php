@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in! {{$user->name}}
                    </div>
                </div>

                @if($from->id !== Null)
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">{{$from->name}}</div>

                        <div class="panel-body chatBox" id="chatBox">
                            <input type="hidden" id="from" name="from" value="{{$from->id}}" readonly>
                            @foreach($messages as $message)
                                @if( $message->from === Auth::user()->id )
                                    <div class='col-md-6 chats chat-to pull-right'>
                                        @else
                                            <div class="col-md-6 chats chat-from">
                                                @endif

                                                <p>{{ $message->message }}</p>
                                            </div>

                                            <div class="clearfix"></div>
                                            @endforeach
                                    </div>

                                    <input type="text" class="form-control" style="border-radius: 0;" id="chatText" placeholder="type message">

                        </div>
                    </div>

                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
