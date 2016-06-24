@extends('layouts.app')
@section('content')
    <script src="js/deletecookie.js">

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
                            <?php
                            $timeinsec =$timespent;
                            $secspent = $timeinsec % 60;
                            $timeinmin = ($timeinsec-$secspent) / 60;
                            $minspent = $timeinmin % 60;
                            $timeinhour = ($timeinmin - $minspent ) / 60;
                                ?>
                            Final score : {{$score}}/{{$nbquestions}} <br>
                            Time spent : {{$timeinhour}} h {{($minspent)}} m {{ $secspent}} s
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
