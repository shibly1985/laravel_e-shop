@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Total Users :: {{$data->total()}}</h3>
            <h3 class="page-header">Total Users in this page :: {{$data->count()}}</h3>
        </div>
        <!-- /.col-lg-12 
        {{$data->total()}} total() is a built in functon of laravel.it used for pagination to get the total row of database.
        count() is a built in function. it shows the total number of every pages
        -->

    </div>
    <!-- /.row -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Serial</th>
                <th>User Name</th>
                <th>User Email</th>                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php($sl = 0)
            @foreach($data as $value)
            <tr>
                <td>{{++$sl}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>

                <td>
                    <a href="{{url('/user/edit/'.$value->id)}}">EDIT</a> | 
                    <a href="{{url('/user/delete/'.$value->id)}}"  onclick="return confirm('Are you Sure to Delete This ??');">DELETE</a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
    <div>
    {{$data->links()}}
    </div>
</div>
@endsection