@extends('layouts.app')
@section('content')
    <script>
        var name='myClock';
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2)
            begin=parts.pop().split(";").shift();
        if(document.cookie && document.cookie.match('myClock')){
            document.cookie = 'myClock=' + begin + '; path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div><h3>Test results</h3></div>
                        <div>
                            <a href="{{url('/myscores')}}">See my scores</a>
                        </div>
                        <div>
                            <a href="{{url('/passthetest')}}">Pass a test</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div>
                            Final score : {{$score}}/{{$nbquestions}}
                        </div>
                        <br>

                        @for($i=1;$i<$nbquestions+1;$i++)
                            <div>

                                <strong>Question {{$i}}</strong><br>
                                @if($rightanswerlist[$i]==$useranswerlist[$i])
                                    <div class="text-success">True</div>
                                @else
                                    <div class = "text-danger">False</div>
                                @endif
                                <br>
                                {{$questiontext[$i]}}<br><br>
                                <ul>
                                @for($j=1;$j<$nba[$i]+1;$j++)
                                    <li>
                                    @if($j==$rightanswerlist[$i])
                                        <div class = "alert-success">{{$answerlist[$i][$j]}}</div>
                                    @elseif($j==$useranswerlist[$i])
                                        <div class = "alert-danger">{{$answerlist[$i][$j]}}</div>
                                    @else
                                        <div>{{$answerlist[$i][$j]}}</div>
                                    @endif
                                    </li>
                                @endfor
                                </ul>
                            </div>
                            <br>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
