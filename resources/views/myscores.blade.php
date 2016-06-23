@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-3 col-sm-6">
        <div class = 'alert-success'>
            <h2>Here are your results !</h2>
        </div>

        @foreach($alldata as $donnees)
            <div class = 'panel panel-info'>
                <div class = 'panel-heading'>
                    <?php echo htmlspecialchars($donnees->testtype); ?>
                    <em> at <?php echo $donnees->date; ?></em>
                </div>

                <div class = 'panel panel-body'>
                    <?php
                    echo 'You did this test in : ' ;
                    $timeinsec = nl2br(htmlspecialchars($donnees->timespent));
                    $secspent = $timeinsec % 60;
                    $timeinmin = ($timeinsec-$secspent) / 60;
                    $minspent = $timeinmin % 60;
                    $timeinhour = ($timeinmin - $minspent ) / 60;
                    echo $timeinhour . ' h ' . $minspent . ' m ' . $secspent . 'sec' ;
                    echo  ' and you scored ' ;
                    echo nl2br(htmlspecialchars($donnees->score));
                    echo  '/20' ;
                    ?>
                    <br />

                </div>
            </div>
        @endforeach
    </div>
@endsection
