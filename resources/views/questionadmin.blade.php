@extends('layouts.app')

@section('content')
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
                    <td><a href ="{{url('/questionadmin.show/'. $question->id )}}"> <input class = 'btn btn-success pull-block' value="see question" >  </a></td>
                    <td><a href ="{{url('/questionadmin.edit/'. $question->id )}}"> <input class = 'btn btn-warning pull-block' value="update question">  </a></td>
                    <td><a href ="{{url('/questionadmin.delete/'. $question->id )}}"> <input class = 'btn btn-danger btn-block' value="delete question">  </a></td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <a href ="{{url('/questionadmin.create/')}}"> <input class = 'btn btn-info pull-right' value ='add a question'> </a>

    </div>
@endsection