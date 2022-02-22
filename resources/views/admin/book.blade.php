<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.admincss")
</head>
<body>
<div class="container-scroller">
    @include('admin.navbar')
    <div style="position:relative;top:60px;right:-60px">
    <a href="{{url('/addbook')}}"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
  Add Book
</button></a>
        <table class="table table-striped table-dark" >
            <tr>
                <th scope="col">Id</th>
                <th scope="col">title</th>
                <th scope="col">author</th>
                <th scope="col">edition</th>
                <th scope="col">dateEdition</th>
                <th scope="col">ISBN</th>
                <th scope="col">category </th>
                <th scope="col">Actions</th>
            </tr>

            @foreach($data as $data)
            <tr>
                <td scope="row">{{$data->id}}</td>
                <td>{{$data->title}}</td>
                <td>{{$data->author}}</td>
                <td>{{$data->edition}}</td>
                <td>{{$data->date_edition}}</td>
                <td>{{$data->ISBN}}</td>
                <td>{{$data->category->label}}</td>

                <td><a class="btn btn-danger" href="{{url('/deletebook',$data->id)}}">Delete</a></td>

            </tr>
            @endforeach
    </div>
</div>

    @include('admin.adminscript')
</body>
</html>
