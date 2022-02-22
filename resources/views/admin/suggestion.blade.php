<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.admincss")
</head>
<body>
<div class="container-scroller">
    @include('admin.navbar')
    <div style="position:relative;top:60px;right:-60px">
        <table  class="table table-striped table-dark">
            <tr>
                <th style="padding:30px">Id</th>
                <th style="padding:30px">text</th>
                <th style="padding:30px">user</th>
                <th style="padding:30px">Actions</th>
            </tr>
            @foreach($data as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->content}}</td>
                <td>{{$data->user->name}} {{$data->user->surname}}</td>
                <td><a class="btn btn-danger" href="{{url('/deletesuggestion',$data->id)}}">Delete</a></td>

            </tr>
            @endforeach
    </div>
</div>

    @include('admin.adminscript')
</body>
</html>
