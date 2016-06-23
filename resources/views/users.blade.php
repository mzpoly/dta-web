@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-3 col-sm-6">
        <div class='panel panel-default'>
            <div class="panel-heading">Users</div>
        </div>

        @foreach($userlist as $user)

            <div class = 'panel panel-info'>
                <div class = 'panel-heading'>
                    {{$user->fblogin}}
                </div>
                <div class = 'panel panel-body'>
                    Registered since the {{$user->date}} /
                    Email : {{$user->email}} <br>
                    Profile questions : {{$user->profilequestions}}
                </div>
            </div>
        @endforeach
    </div>
@endsection
