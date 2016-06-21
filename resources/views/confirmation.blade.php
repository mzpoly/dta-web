<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>confirmation page</title>
<body>
	<br>
    <p>
        <?php

        //fonction à mettre dans le controller des questions
        use App;

        public function getQuestionChoices($questionId){
            return $this->belongsToMany('App\Choices')
        }

        $choices = App\Question::find($questionid)->livres;
        foreach ($choices as $choice) {
            echo $choice->answer, '<br>', echo $choice->choicenumber;
        }


    </p>
</body>
</html>