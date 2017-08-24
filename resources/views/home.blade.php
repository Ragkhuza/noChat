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

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">Messages</div>

                    <div class="panel-body" id="chatBox">
                        {{--<div class="col-md-6 chats chat-from">--}}
                            {{--@foreach($messages as $message)--}}
                                {{--<p>{{$message->from}}</p>--}}
                                {{--<p>{{$message->message}}</p>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}

                        {{--<div class="clearfix"></div>--}}

                        {{--<div class="col-md-6 chats chat-to pull-right">--}}
                            {{--<p>hi</p>--}}
                        {{--</div>--}}


                    </div>
                    <input type="text" class="form-control" style="border-radius: 0;" id="chatText" placeholder="type message">
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
