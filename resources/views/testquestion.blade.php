@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><div>Question n°{{$questionnb}}</div><div>{{$questiontype}}</div></div>

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
                        {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
