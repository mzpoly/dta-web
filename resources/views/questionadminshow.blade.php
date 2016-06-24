@extends('layouts.app')

@section('content')

    <div class="col-sm-offset-4 col-sm-4">
        <br>
        <div class="panel panel-primary">
            <div class="panel-heading"> <strong>{{ $question->questiontext }}</strong></div>
            <div class="panel-body">

                <p><strong>question type</strong> : {{ $question->questiontype }} <br>
                    <strong>test type</strong> : {{ $question->testtype }}</p>

                @foreach ($choices as $choice)
                    <td><strong>answer {{$choice->choicenumber}} </strong> : {{$choice->answer}}</td><br>
                @endforeach

                <p><strong>Right answer</strong> : {{ $question->rightanswer }} </p>

                <p><strong>question image/gif</strong> <img src={{url('questionadminimages/image-question-'.$question->id)}} alt="illustration" style="width:304px;height:228px;"> </p>

            </div>
        </div>
        <br>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>

@endsection