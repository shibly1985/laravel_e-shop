@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Blank</h1>
        </div>
        <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Manufacturer Name</th>
                <th>Manufacturer Description</th>
                <th>Publication Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php($sl = 0)
            @foreach($data as $value)
            <tr>
                <td>{{++$sl}}</td>
                <td>{{$value->manufacturerName}}</td>
                <td>{{$value->manufacturerDescription}}</td>
                <td>{{$value->publicationStatus==1?'Published':'Un Published'}}</td>
                <td>
                    <a href="{{url('/manufacturer/edit/'.$value->id)}}">EDIT</a> | 
                    <a href="{{url('/manufacturer/delete/'.$value->id)}}"  onclick="return confirm('Are you Sure to Delete This ??');">DELETE</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>
@endsection