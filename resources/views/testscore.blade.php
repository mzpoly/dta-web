@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><div>Test results</div></div>

                    <div class="panel-body">
                        @for($i=1;$i<Session::get('nbquestions')+1;$i++)
                            <div>
                                Question {{$i}}
                                Right answer : {{$rightanswerlist[$i]}}.
                                Your answer : {{$useranswerlist[$i]}}.
                            </div>
                        @endfor
                        <br>
                        <div>
                            Final score : {{$score}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
