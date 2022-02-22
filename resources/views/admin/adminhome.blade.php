<!DOCTYPE html>
<html lang="en">
  <head>
   @include("admin.admincss")
   <style>
       .cards{
           display: flex;
           justify-content: space-between;
           wrap: wrap
       }
       .card{
           font-size: 2em;
            text-align: center;
            margin-inline: 10px;
            width: 400px;
            height: 300px;
            border: 2 gray;
            border-radius: 12px;
       }
        .mdi-48px { font-size: 48px; float: left;}

    </style>
  </head>
  <body>
      <div class="container-scroller">
    @include("admin.navbar")
        <!-- partial -->
        <div class="main-panel">
            <h1 style="text-align: center; margin-bottom: 3%">Bibliothèque ENSAM Casablanca</h1>
            <div class="content-wrapper" style="border-radius: 20px">
              <div class="row">
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                              @if(!$etudiants->isEmpty())
                                <h3 class="mb-0">{{ count($etudiants) }}</h3>
                              @endif

                            <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-success ">
                            <span class="mdi mdi-account"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Nombre des étudiants</h6>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                              @if(!$books->isEmpty())
                                <h3 class="mb-0">{{ count($books) }}</h3>
                              @endif

                            <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-success">
                            <span class="mdi mdi-book"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Nombre des oeuvres</h6>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                              @if(!$categories->isEmpty())
                                <h3 class="mb-0">{{ count($categories) }}</h3>
                              @endif

                            <p class="text-danger ms-2 mb-0 font-weight-medium"></p>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-danger">
                            <span class="mdi mdi-format-align-justify"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Nombre des catégories</h6>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                              @if(!$copies->isEmpty())
                                <h3 class="mb-0">{{ count($copies) }}</h3>
                              @endif

                            <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-success ">
                            <span class="mdi mdi-library-books"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Nombre des copies</h6>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- content-wrapper ends -->
            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Nombre de reservations: </h4>

                    <div  style="display: block; height: 150px; width: 300px; font-size: 2em;" width="269" height="134">
                        @if(!$reservations->isEmpty())
                            <span>{{ count($reservations) }}</span>
                            @else
                            <span>0</span>
                        @endif
                    </div>


                      <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                        <div class="text-md-center text-xl-left">
                          <h6 class="mb-1" style="padding-left: 21px">Dernière reservation: </h6>
                          @if(!$reservations->isEmpty())
                            <p class="text-muted mb-0">{{ $reservations[count($reservations)-1]->date_reservation }}</p>
                          @endif

                        </div>
                        <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                          <h6 class="font-weight-bold mb-0"></h6>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-md-8 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title mb-1">Etudiants</h4>
                        <p class=" mb-1"></p>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="preview-list">
                            <div class="preview-item border-bottom">
                              <div class="preview-thumbnail">
                                <div class="preview-icon bg-primary">
                                  <i class="mdi mdi-file-document"></i>
                                </div>
                              </div>
                              <div class="preview-item-content d-sm-flex flex-grow">
                                <div class="flex-grow">
                                  <h6 class="preview-subject">
                                      Nombre de suggestions:
                                    </h6>
                                    @if(!$suggestions->isEmpty())
                            <p class="mb-0" style="font-size: 2em">{{ count($suggestions) }}</p>
                                    @else
                                    <p class="mb-0" style="font-size: 2em">0</p>
                                    @endif

                                </div>
                                <div class="me-auto text-sm-right pt-2 pt-sm-0">

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

    </div>
    @include("admin.adminscript")
  </body>
</html>
