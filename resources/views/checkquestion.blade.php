<!doctype html>

<head>
    <meta charset="utf-8">
    <title>Building a set of questions for an admin</title>
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css') !!}
</head>


<body>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Question List</h3>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Number</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($questionlist as $question)
                <tr>
                    <td>{!! $question->id !!}</td>
                    <td class="text-primary"><strong>{!! $question->questiontext !!}</strong></td>
                    <td>{!! link_to_route('questionadmin.show', 'look', [$question->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                    <td>{!! link_to_route('questionadmin.edit', 'update', [$qustion->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
                        {!! Form::submit('Remove', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Do you really wish to remove that question ?\')']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {!! link_to_route('questionadmin.create', 'add a question', [], ['class' => 'btn btn-info pull-right']) !!}
    {!! $links !!}
    </div>



</body>

