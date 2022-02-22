<!DOCTYPE html>
<html lang="en">
  <head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
   @include("admin.admincss")
  </head>
  <body>
  <div class="container-scroller">
@include("admin.navbar")
<div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Copy form</h4>


                    <form class="forms-sample" method="post" action="{{url('./uploadcopy')}}">
                    {{ csrf_field() }}
                      
                      <div class="form-group">
                          <label for="book">Book</label>

                          <select class="form-control" name="book" id="book">
                          @foreach($data as $data)
                          <option value="{{$data->id}}">{{$data->title}}</option>
                          @endforeach
                          </select>
                      </div>


                      <button type="submit" class="btn btn-primary me-2">Add</button>

                    </form>
                  </div>
                </div>
              </div>
</div>

    @include("admin.adminscript")
  </body>
</html>
