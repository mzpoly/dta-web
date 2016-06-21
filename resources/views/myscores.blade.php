<!doctype html>

<head>
    <meta charset="utf-8">
    <title>Scores for a user</title>
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css') !!}
</head>

<body>
    <div class="col-sm-offset-3 col-sm-6">
        <div class = 'alert-success'>
            <h2>Here are your results !</h2>
        </div>


            <?php
            try{
                $bdd = new PDO('mysql:host=localhost;dbname=drivertestapp;charset=utf8', 'root', 'root');
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }

            $req = $bdd->query('SELECT userid, timespent, score, date, testtype FROM testuserhistory ORDER BY date DESC');

            while ($donnees = $req->fetch()){
                ?>
                <div class = 'panel panel-info'>
                    <div class = 'panel-heading'>
                        <?php echo htmlspecialchars($donnees['testtype']); ?>
                        <em> at <?php echo $donnees['date']; ?></em>
                    </div>

                    <div class = 'panel panel-body'>
                        <?php

                            echo 'You did this test in : ' ;
                            $timeinsec = nl2br(htmlspecialchars($donnees['timespent']));
                            $secspent = $timeinsec % 60;
                            $timeinmin = ($timeinsec-$secspent) / 60;
                            $minspent = $timeinmin % 60;
                            $timeinhour = ($timeinmin - $minspent ) / 60;


                            echo $timeinhour . ' h ' . $minspent . ' m ' . $secspent . 'sec' ;
                            echo  ' and you scored ' ;
                            echo nl2br(htmlspecialchars($donnees['score']));
                            echo  '/20' ;

                        ?>
                        <br />

                    </div>
                </div>
                <?php
                }
                $req->closeCursor();
                ?>



    </div>


</body>
</html>