@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div id="clockdiv">
                            Time  <span class="hours"></span>
                            : <input class="minutes" name="minutes" type="hidden"/>
                            : <input class="seconds" name="seconds" type="hidden"/>
                        </div>
                        <div><strong>Question n°{{$questionnb}}</strong></div>
                        <div>{{$questiontype}}</div></div>
                    <div class="panel-body">

                        <div>{{$question}}</div>
                        {!! Form::open(['url'=>'testquestion'])  !!}
                        <div>
                            <input checked ="checked" type="radio" name="answer" value=1 />
                            {{$answer[1]}}
                        </div>
                        @for($i=2;$i<$nba+1;$i++)
                            <div>
                                <input type="radio" name="answer" value="{{$i}}" />
                                {{$answer[$i]}}
                            </div>
                        @endfor
                        <input name="nextquestionnb" value="{{$questionnb +1}}" type="hidden"/>
                        <input name="nextquestion" value="{{$nextquestion}}" type="hidden"/>
                        {!! Form::submit('Submit', ['class' => 'btn btn-info pull-right']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Html::script('js/myscripts.js') }}
@endsection
