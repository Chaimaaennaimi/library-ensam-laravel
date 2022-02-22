<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.admincss")
</head>
<body>
<div class="container-scroller">
    @include('admin.navbar')
    <div style="position:relative;top:60px;right:-60px">
    <a href="{{url('/addcat')}}"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
  Add Category
</button></a>
        <table class="table table-striped table-dark">
            <tr>
                <th style="padding:30px">Id</th>
                <th style="padding:30px">label</th>
                <th style="padding:30px">Description</th>
                <th style="padding:30px">Actions</th>
            </tr>
            @foreach($data as $data)
            <tr align="center">
                <th>{{$data->id}}</th>
                <th>{{$data->label}}</th>
                <th>{{$data->description}}</th>
                <td><a class="btn btn-danger" href="{{url('/deletecat',$data->id)}}">Delete</a></td>

            </tr>
            @endforeach
    </div>
</div>

    @include('admin.adminscript')
</body>
</html>
