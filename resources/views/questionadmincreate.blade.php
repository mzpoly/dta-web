@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">

            <div class="panel-heading"> Add a new question </div>

            <div class="panel-body" id = "divbody">

                {!! Form::open(['url' => 'create_question', 'enctype' => 'multipart/form-data']) !!}


                <br>


                <textarea name="questiontext" rows = "5" cols ="45" class="form-control" placeholder="write the question here: " required></textarea>

                <br> <br>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Test type : </label>
                        <select class="form-control" name="testtype">
                            <option value="BTT">BTT</option>
                            <option value="FTT">FTT</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Question type : </label>
                        <select class="form-control" name="questiontype">
                            <option value="crime">Crime</option>
                            <option value="accidents">Accident</option>
                            <option value="speedlimit">Speed limitation</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div><br>
                <input checked ="checked" type="radio" name="nbq" onclick="handleClick(this);" value="3" />  3 possible anwers  <br>
                <input type="radio" name="nbq" onclick="handleClick(this);" value="4" />  4 possible anwers <br>
                <input type="radio" name="nbq" onclick="handleClick(this);" value="5" />  5 possible anwers <br><br>

                <div id="DA1"><label for='A1'> answer A </label> <input type ="text" name="A1" required/></div> <br>
                <div id="DA2"><label for='A2'> answer B </label> <input type ="text" name="A2" required/></div> <br>
                <div id="DA3"><label for='A3'> answer C </label> <input type ="text" name="A3" required/></div> <br>
                <div id="DA4" style="display:none;"><label for='A4'> answer D </label> <input type ="text" name="A4" id="A4"/></div> <br>
                <div id="DA5" style="display:none;"><label for='A5'> answer E </label> <input type ="text" name="A5" id="A5"/></div> <br>
                <br>

                <script type="text/javascript">
                    var numbans = 3;

                    function handleClick(myRadio) {
                        numbans = myRadio.value;
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

                </script>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Right answer : </label>
                        <select class="form-control" name="rightanswer">
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                            <option value="5">E</option>
                        </select>
                    </div>
                </div>

                <br>
                <div class="row">
                    <label for="imageurl">place file here (JPG, PNG, GIF | max. 1 Mo) :</label>
                    <input type="file" name="imageurl" />
                </div>

                <br><br>
                {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}

                <a href="{{url('questionadmin')}}" class="btn btn-primary">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Return to list
                </a>
            </div>
        </div>
    </div>
@endsection