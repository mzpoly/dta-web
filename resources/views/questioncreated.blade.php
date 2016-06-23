@extends('layouts.app')

@section('content')

    <div class="col-sm-offset-4 col-sm-4">
        <br>
        <div class="panel panel-primary">
            <div class="panel-heading"><p>WOW</p></div>
            <div class="panel-body">

                <p>question created !</p>

            </div>
        </div>
        <a href="{{url('questionadmin')}}" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Return to list
        </a>
    </div>

@endsection