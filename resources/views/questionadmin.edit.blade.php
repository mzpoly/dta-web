@extends('template')

@section('contenu')



    <div class="col-sm-offset-4 col-sm-4">
        <br>
        <div class="panel panel-primary">
            <div class="panel-heading">question number : {{$question->id}}</div>
            <div class="panel-body">
                <p>{{ $question->questiontext }}</p>
                <p>number of answers : {{ $question->nbofchoices }}</p>

                <?php

                    //fonction à mettre dans le controller des questions
                    use App;

                    public function getQuestionChoices($questionId){
                        return $this->belongsToMany('App\Choices')
                    }

                    //permet d'afficher tous les choix des questions
                    $choices = App\Question::find($questionid)->livres;
                    foreach ($choices as $choice) {
                        echo $choice->answer, '<br>', echo $choice->choicenumber;
                    }

                ?>

            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>

@stop