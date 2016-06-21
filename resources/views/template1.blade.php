<!doctype html>

<head>
    <meta charset="utf-8">
    <title>Building a set of questions for an admin</title>
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css') !!}
</head>

<body>

    <div class="container">
        {!! for( $k = 0; $k< $nbques; $k++ ) { !!}
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{$questionname}}</div>

                            <div class="panel-body">
                                {{$type}}
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</body>


