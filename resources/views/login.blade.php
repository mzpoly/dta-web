<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>login page</title>
<body>
	<br>
    <div class="col-sm-offset-4 col-sm-4">
		<div class="panel panel-info">
			<div class="panel-heading">write here your facebook login</div>
			<div class="panel-body"> 
				{!! Form::open(array('url' => 'login/form')) !!}
					<div class="form-group {!! $errors->has('login') ? 'has-error' : '' !!}">
						{!! Form::text('login', null, array('class' => 'form-control', 'placeholder' => 'write your login')) !!}
						{!! $errors->first('login', '<small class="help-block">:message</small>') !!}
					</div>

					<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
						{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'write your email']) !!}
						{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
					</div>

					{!! Form::submit('Envoyer !', array('class' => 'btn btn-info pull-right')) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</body>
</html>