@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="{{ url('/') }}">BTT</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        FTT
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
