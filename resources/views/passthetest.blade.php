@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url' => 'inittest']) !!}
                        <input type="submit" class="btn btn-default" name="testtype" value="BTT">
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url' => 'inittest']) !!}
                        <input type="submit" class="btn btn-default" name="testtype" value="FTT">
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
