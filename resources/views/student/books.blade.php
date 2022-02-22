@extends('...layouts.app')

@section('content')
<main>
        <!--? Hero Start -->
       
        <!-- Hero End -->
        <!-- all-course Start -->
        <section class="all-course section-padding30">
            <div class="container">
                <div class="row">
                    <div class="all-course-wrapper">
                        <!-- Heading & Nav Button -->
                        <div class="row mb-15">
                            <div class="col-lg-12">
                                <div class="properties__button mb-90">
                                    <!--Nav Button  -->                                            
                                    <nav>                                                                             
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Maths</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Physique</a>
                                            <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Chime</a>
                                            <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Informatique</a>
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!--  one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">       
                                        <div class="row">
                                            @foreach($data as $book)
                                            <div class="col-xl-3 col-lg-3 col-md-4" style=" transform:scale(0.9)">
                                                <!-- Single course -->
                                                <div class="single-course mb-70">
                                                    <div class="course-img">
                                                    <a href="{{ url('/books',$book->id) }}">
                                                     <img src="data:image/jpg;base64,{{ chunk_split(base64_encode($book->book_image)) }}">
                                                    </a>  
                                                    </div>
                                                    <div class="course-caption" style="padding: 20px; text-align:center">
                                                        <div class="course-cap-top">
                                                            <h4><a href="{{ url('/books',$book->id) }}"  style="font-size: 23px;">{{$book->title}}</a></h4>
                                                        </div>
                                                        <div class="course-cap-mid d-flex justify-content-between">
                                                            <div class="course-ratting">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                            <ul><li>0 Review</li></ul>
                                                        </div>
                                                        <div class="course-cap-bottom d-flex justify-content-between">
                                                            <ul>
                                                                <li><i class="ti-user"></i>0</li>
                                                                @php ($i = 0)
                                                                @foreach($fav as $f)
                                                                @if($f->book_id==$book->id)
                                                                <li><a href="{{url('/like',$book->id)}}"><i class="fa fa-heart text-danger" aria-hidden="true"></i></a> {{!!$book->nb ? $book->nb: 0}}</li>
                                                                @php ($i = 1)
                                                                @endif
                                                                @endforeach
                                                                @if($i==0)
                                                                <li><a href="{{url('/like',$book->id)}}"><i class="fa fa-heart text-secondary" aria-hidden="true"></i></a> {{!!$book->nb ? $book->nb: 0}}</li>
                                                                @endif
                                                                
                                                            </ul>
                                                            @php ($j = 0)
                                                            @foreach($copy as $c)
                                                            @if($c->book_id == $book->id)
                                                            <span>Disponible</span>
                                                            @php ($j = 1)
                                                            @break
                                                            @endif
                                                            @endforeach
                                                            @if($j==0)
                                                            <span class="text-danger">Indisponible</span>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            @endforeach                                        
                                        </div>
                                    </div>
                                    <!--  Two -->
                                  
                                </div>
                            <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- all-course End -->
    </main>
@endsection


@section('breadcumb')
<h2>{{$pageTitle}}</h2>
@endsection