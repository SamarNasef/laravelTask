@extends('layouts.app')

@section('content')
<!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
-->
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <form method="get" action="/employee/search">
                <input type="text" class="form-control" name="searchByName" placeholder="Search By First Name">
                <button type="submit" class="btn btn-success">Search</button>
                
            </form>
            
            </div>
        </div>
    </div>

    
    <table class="table table-bordered table-striped">
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Job</th>
            <th>Image</th>
            <th>Status</th>
            <th>Location</th>
            <th>actions</th>
        </tr>
        
        @foreach($response->getData()->data as $key => $value)
        <tr>
            <td>{{$value->firstname}}</td>
            <td>{{$value->secondname}}</td>
            <td>{{$value->job}}</td>
            <td><img width="100" height="100" src="{{Storage::disk('local')->url($value->image)}}" ></td>
            <td>{{$value->status}}</td>
            <td>{{$value->location}}</td>
            <td>
                <a href="/employee/update/{{$value->id}}">update</a>
                <a href="/employee/delete/{{$value->id}}">delete</a>
            </td>
        </tr>
        @endforeach
       
        
</table>
    

</div>

@endsection
