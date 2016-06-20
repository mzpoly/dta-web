<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fixed Top Navbar Example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
{{ Html::style('css/bootstrap.min.css') }}


<!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarreduced">
                <span><img src="images/bulle.png" alt="info"></span>
            </button>
            <a class="navbar-brand imgaccueil" href=""><img src="images/icone.png" alt="logo"></a>
        </div>
        <div class="navbar-collapse collapse" id ="navbarreduced">
            <ul class="nav navbar-nav">
                <li><a href="passthetest">Pass a test</a></li>
                <li><a href="aboutthetest">About the tests</a></li>
                <li><a href="myscores">Scores</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li><a href="loginfb">FBLOGIN</a></li>
            </ul>
        </div>
    </div>
</div>
<div>
   <!--  -->
</div>
<div style="text-align:center">
    Foot-note
</div>
</div>
</div>
</body>
</html>