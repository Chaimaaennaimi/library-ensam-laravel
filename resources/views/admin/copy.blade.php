<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.admincss")
</head>
<body>
<div class="container-scroller">
    @include('admin.navbar')
    <div style="position:relative;top:60px;right:-60px">
    <a href="{{url('/addcopy')}}"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
  Add Book
</button></a>
        <table class="table table-striped table-dark" >
            <tr>
                <th scope="col">Id</th>
                <th scope="col">state</th>
                <th scope="col">Book</th>
                <th scope="col">Actions</th>
            </tr>

            @foreach($data as $data)
            <tr align="center">
                <td scope="row">{{$data->id}}</td>
                <td>{{$data->state}}</td>
                <td>{{$data->book->title}}</td>


                <td><a class="btn btn-danger" href="{{url('/deletebook',$data->id)}}">Delete</a></td>

            </tr>
            @endforeach
    </div>
</div>

    @include('admin.adminscript')
</body>
</html>
