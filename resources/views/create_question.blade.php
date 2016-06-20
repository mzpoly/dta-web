<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<title>Question adding form</title>
	</head>

	<body>

	<p> you may enter the question data here </p>
	<br>

	{!! Form::textarea('texte', null, ['class' => 'form-control', 'placeholder' => 'Question type/infos']) !!}
	{!! Form::radio('numbquestions', '3' !!}
	{!! Form::radio('numbquestions', '4' !!}
	{!! Form::radio('numbquestions', '5' !!}
	{!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}

	</body>

</html>