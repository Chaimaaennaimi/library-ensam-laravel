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
                    <h4 class="card-title">Add Category form</h4>


                    <form class="forms-sample" method="post" action="{{url('./uploadcat')}}">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label for="exampleInputEmail1">Label</label>
                        <input type="text" class="form-control"  name="label" id="exampleInputEmail1" placeholder="label">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" class="form-control"  name="description" id="exampleInputEmail1" placeholder="Description">
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
