@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Question n°{{$questionnb}}</div>

                    <div class="panel-body">

                        <div>{{$question}}</div>
                        {!! Form::open(['url'=>'testquestion'])  !!}
                        <div>
                            <input checked ="checked" type="radio" name={{"A".$questionnb}} value="1" />
                            {{$answer[1]}}
                        </div>
                        @for($i=1;$i<$nbq+1,$i++)
                            <div>
                                <input type="radio" name={{"A".$questionnb}} value="{{$i}}" />
                                {{$answer[$i]}}
                            </div>
                        @endfor
                        <input name="nextquestion" value="{{$questionnb +1}}" style="display:none;"/>
                        {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
