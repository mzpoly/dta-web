@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">

            <div class="panel-heading"> update question </div>

            <div class="panel-body" id = "divbody">

                {!! Form::open(['url' => 'modify_question']) !!}


                <br>

                <input type="hidden" name="questionid" value= {{$question->id}} >
                <textarea name="questiontext" rows = "5" cols ="45" class="form-control" required>{{$question->questiontext}}</textarea>

                <br> <br>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Test type : </label>
                        <select class="form-control" name="testtype">
                            <option value="BTT" id="BTTop" selected>BTT</option>
                            <option value="FTT" id="FTTop">FTT</option>
                        </select>
                    </div>
                </div>

                <script>
                    if( '{{$question->testtype}}' == 'FTT' )
                    {
                        document.getElementById("FTTop").selected = true;
                        document.getElementById("BTTop").selected = false;
                    }
                </script>


                <div class="row">
                    <div class="col-sm-3">
                        <label>Question type : </label>
                        <select class="form-control" name="questiontype">
                            <option value="crime" id ='crimeop' selected>Crime</option>
                            <option value="accidents" id = 'accidentsop'>Accident</option>
                            <option value="speedlimit" id = 'speedlimitop'>Speed limitation</option>
                            <option value="other" id = 'otherop'>Other</option>
                        </select>
                    </div>
                </div>

                <script>

                    if( '{{$question->questiontype}}' == 'accidents' )
                    {
                        document.getElementById("crimeop").selected = false;
                        document.getElementById("accidentsop").selected = true;
                        document.getElementById("speedlimitop").selected = false;
                        document.getElementById("otherop").selected = false;
                    }

                    if( '{{$question->questiontype}}' == 'speedlimit' )
                    {
                        document.getElementById("crimeop").selected = false;
                        document.getElementById("accidentsop").selected = false;
                        document.getElementById("speedlimitop").selected = true;
                        document.getElementById("otherop").selected = false;
                    }

                    if( '{{$question->questiontype}}' == '' )
                    {
                        document.getElementById("crimeop").selected = false;
                        document.getElementById("accidentsop").selected = false;
                        document.getElementById("speedlimitop").selected = false;
                        document.getElementById("otherop").selected = true;
                    }

                </script>

                <br>
                <input checked ="checked" type="radio" name="nbanswer" onclick="handleClick(this);" value="3" id="r1op"/>  3 possible anwers  <br>
                <input type="radio" name="nbanswer" onclick="handleClick(this);" value="4" id="r2op"/>  4 possible anwers <br>
                <input type="radio" name="nbanswer" onclick="handleClick(this);" value="5" id="r3op"/>  5 possible anwers <br><br>

                <div id="DA1"><label for='A1'> answer A </label> <input type ="text" name="A1" value="{{$answer1->answer}}" required/></div> <br>
                <div id="DA2"><label for='A2'> answer B </label> <input type ="text" name="A2" value="{{$answer2->answer}}" required/></div> <br>
                <div id="DA3"><label for='A3'> answer C </label> <input type ="text" name="A3" value="{{$answer3->answer}}" required/></div> <br>
                <div id="DA4" style="display:none;"><label for='A4'> answer D </label> <input type ="text" name="A4" id="A4" /></div> <br>
                <div id="DA5" style="display:none;"><label for='A5'> answer E </label> <input type ="text" name="A5" id="A5" /></div> <br>
                <br>



                <script type="text/javascript">

                    function chooseNbAns(numbans) {

                        if (numbans == 3){
                            var div4 = document.getElementById('DA4');
                            div4.style.display = "none";
                            var div5 = document.getElementById('DA5');
                            div5.style.display = "none";
                        }
                        if (numbans == 4){
                            var div4 = document.getElementById('DA4');
                            div4.style.display = "block";
                            var div5 = document.getElementById('DA5');
                            div5.style.display = "none";
                        }
                        if (numbans == 5) {
                            var div4 = document.getElementById('DA4');
                            div4.style.display = "block";
                            var div5 = document.getElementById('DA5');
                            div5.style.display = "block";
                        }

                    }

                    chooseNbAns({{$question->nbofchoices}});



                    function handleClick(myRadio) {
                        chooseNbAns(myRadio.value);
                    }

                </script>

                <script>
                    if({{$question->nbofchoices}} == 4 )
                    {
                        document.getElementById("r1op").checked = false;
                        document.getElementById("r2op").checked = true;
                        document.getElementById("r3op").checked = false;
                        var div4 = document.getElementById('A4');
                        div4.value="$answer4->answer";

                    }

                    if({{$question->nbofchoices}} == 5 )
                    {
                        document.getElementById("r1op").checked = false;
                        document.getElementById("r2op").checked = false;
                        document.getElementById("r3op").checked = true;
                        var div4 = document.getElementById('A4');
                        div4.value="$answer4->answer";
                        var div5 = document.getElementById('A5');
                        div5.value="$answer5->answer";
                    }
                </script>


                <div class="row">
                    <div class="col-sm-3">
                        <label>Right answer : </label>
                        <select class="form-control" name="rightanswer">
                            <option value="1" id="1op" selected>A</option>
                            <option value="2" id="2op">B</option>
                            <option value="3" id="3op">C</option>
                            <option value="4" id="4op">D</option>
                            <option value="5" id="5op">E</option>
                        </select>
                    </div>
                </div>

                <script>

                    if( {{$question->rightanswer}} == 2 )
                    {
                        document.getElementById("1op").selected = false;
                        document.getElementById("2op").selected = true;
                        document.getElementById("3op").selected = false;
                        document.getElementById("4op").selected = false;
                        document.getElementById("5op").selected = false;
                    }

                    if( '{{$question->rightanswer}}' == 3 )
                    {
                        document.getElementById("1op").selected = false;
                        document.getElementById("2op").selected = false;
                        document.getElementById("3op").selected = true;
                        document.getElementById("4op").selected = false;
                        document.getElementById("5op").selected = false;
                    }

                    if( '{{$question->rightanswer}}' == 4 )
                    {
                        document.getElementById("1op").selected = false;
                        document.getElementById("2op").selected = false;
                        document.getElementById("3op").selected = false;
                        document.getElementById("4op").selected = true;
                        document.getElementById("5op").selected = false;
                    }

                    if( '{{$question->rightanswer}}' == 5 )
                    {
                        document.getElementById("1op").selected = false;
                        document.getElementById("2op").selected = false;
                        document.getElementById("3op").selected = false;
                        document.getElementById("4op").selected = false;
                        document.getElementById("5op").selected = true;
                    }

                </script>

                <br>
                <div class="row">
                    <input type="file" name="imageurl" /> <div id="prev"></div>
                </div>

                <br><br>
                {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
                <a href="javascript:history.back()" class="btn btn-primary">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Back to questions
                </a>
            </div>
        </div>
    </div>
@endsection