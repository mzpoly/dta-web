@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Question created</div>

                    <div class="panel-body">

                        <a href="{{url('/create_question')}}">Create a new question</a>
                        <a href="{{url('/questionadmin')}}">See questions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
