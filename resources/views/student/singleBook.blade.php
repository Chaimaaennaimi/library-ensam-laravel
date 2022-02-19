@extends('...layouts.layout')

@section('content')



<div class="super_container">


	<div class="container single_product_container">

		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<img class="single_product_image_background" src="data:image/jpg;base64,{{ chunk_split(base64_encode($book->book_image)) }}"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2>{{$book->title}}</h2>
						<p>{{$book->description}}</p>
					</div>
					<form action="/reserver" method="POST">
						<input type="text" name="tets" value="test">
						<button type="submit">Send</button>
					</form>
					<div class=" d-flex flex-column align-items-center justify-content-center">
						@if( $summary['disponible'] > 0)
                        	<span style="font-size:17px; padding:10px; width:100%" class="badge rounded-pill bg-success">Disponible<span class="badge badge-light" style="margin-left:5px; margin-bottom:2px;">{{$summary['disponible']}}</span></span>
						@else
                        	<span style="font-size:17px; padding:10px; width:100%; color:white;" class="badge rounded-pill bg-danger">Indisponible</span>
							<div class="alert alert-warning" role="alert" style="width: 100%;">
								La date prévue pour que le livre soit disponible : {{$summary['reservee']}}
							</div>
						@endif
                        <!-- <span style="font-size:15px;" class="badge rounded-pill bg-warning text-dark">Perdu</span> -->
					</div>
					<div style="margin-top: 10px">
						<p>Nombre de copies : {{$summary['numberOfCopies']}}<p>
						<p>Rating: 4<p>
						@if( $summary['disponible'] > 0)
							<button type="button" id="reserverButton" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Réserver Livre</button>
						@endif
					</div>
					<!-- Vertically centered modal -->
					
					  <!-- The Modal -->
					<div class="modal fade w-100" id="myModal">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
							
								<!-- Modal Header -->
								<div class="modal-header">
								<h4 class="modal-title">Réservation</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								
								<!-- Modal body -->
								<div class="modal-body">
								<p class="p-100">
										Chèr utilisateur,<br />
								Veuillez lire les informations suivantes convenablement<br />
								Livre demandé : <b>{{$book->title}}</b><br />
								Date de demande (AAAA-MM-JJ): <b id="dateNow"></b><br />
								Date max pour recupération (AAAA-MM-JJ): <b id="dateMaxRecuperation"></b><br />
								Date max pour rétrocéder le livre (AAAA-MM-JJ): <b id="dateMaxRetroceder"></b><br />
								</p>
								
								<div class="alert alert-warning" role="alert">
									Réserver un livre sans se présenter pour le recupérer le livre le jour J sera toujours pris en compte lors de vos prochaines réservations
								</div>
	
									<div class="alert alert-danger" role="alert">
										Une réservation ne peut pas être annulée
									</div>
								</div>
								
								<!-- Modal footer -->
								<div class="modal-footer">
									<button id="sendReservation" type="button" class="genric-btn primary">Confirmer Reservation</button>
									<button type="button" class="genric-btn danger" data-dismiss="modal">Annuler Reservation</button>
								</div>
								
							</div>
				
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<script>
		
		const btn = document.getElementById('reserverButton');
		const dateNow = document.getElementById('dateNow');
		const dateMaxRecuperation = document.getElementById('dateMaxRecuperation');
		const dateMaxRetroceder = document.getElementById('dateMaxRetroceder');
		const sendReservation = document.getElementById('sendReservation');
		const idBook = `{{$book->id}}`;
		const userId = 1;

		btn.addEventListener('click', (e)=>{
			e.preventDefault();
			const today = new Date();
			const todayPlus4 = new Date(today.getTime() + (4*24*60*60*1000));
			const todayPlus4Plus7 = new Date(todayPlus4.getTime() + (7*24*60*60*1000));
			dateNow.innerHTML = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
			dateMaxRecuperation.innerHTML = todayPlus4.getFullYear()+'-'+(todayPlus4.getMonth()+1)+'-'+(todayPlus4.getDate());
			dateMaxRetroceder.innerHTML = todayPlus4Plus7.getFullYear()+'-'+(todayPlus4Plus7.getMonth()+1)+'-'+(todayPlus4Plus7.getDate());
		})

		sendReservation.addEventListener('click', async (e)=>{
			e.preventDefault();

			fetch('http://localhost:8000/reserver', {
				method: 'POST',
				body: JSON.stringify({idBook, dateNow, userId}),
				headers: {
					'Content-Type': 'application/json',
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
					"X-CSRF-TOKEN": "I7MkCzjwdDJ3m9KoXGJn071JXdAMeYV0p4BqNf7b"
				},
				credentials: "same-origin",
			})
			.then((response)=>{
				console.log(response)
			})
			.catch((err)=>{
				console.log(err)
			})

		})

	</script>

	<!-- Tabs -->

	<div class="tabs_section_container">

		<div class="container">
			
			<div class="row">
				<div class="col">

					<!-- Tab Reviews -->

					<div id="tab_3" class="tab_container">
						<div class="row">

							<!-- User Reviews -->

							<div class="col-lg-6 reviews_col mt-5">
								<div class="tab_title reviews_title">
									<h4>Comment (2)</h4>
                                
								</div>

								<!-- User Review -->

								<div class="user_review_container d-flex flex-column flex-sm-row">
									<div class="user" style="width: 35%">
										<div class="user_pic" style="position: relative;"><i class="ti-user" style="position: absolute; left:38%; top:37%;"></i></div>
										<div class="user_rating">
											<ul class="star_rating">
												<!-- <li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li> -->
											</ul>
										</div>
									</div>
									<div class="review">
										<div class="review_date">27 Aug 2016</div>
										<div class="user_name">Brandon William</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</div>

								<!-- User Review -->

								<div class="user_review_container d-flex flex-column flex-sm-row">
									<div class="user" style="width: 35%">
										<div class="user_pic" style="position: relative;"><i class="ti-user" style="position: absolute; left:38%; top:37%;"></i></div>
										<div class="user_rating">
											<ul class="star_rating">
											<!-- 	<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li> -->
											</ul>
										</div>
									</div>
									<div class="review">
										<div class="review_date">27 Aug 2016</div>
										<div class="user_name">Brandon William</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</div>
							</div>

							<!-- Add Review -->

							<div class="col-lg-6 add_review_col">

								<div class="add_review mt-5">
									<form id="review_form" action="post">
										<div>
											<h1>Add Comment</h1>
                                            <div class="mt-20">
									            <input type="text" name="first_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required="" class="single-input">
								            </div>
                                            <div class="mt-10">
									            <input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required="" class="single-input">
								            </div>
										</div>
										<div class="mt-5">
											<h1>Your Comment:</h1>
											<!-- <ul class="user_star_rating">
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
											</ul> -->
                                            <div class="mt-5">
									            <textarea class="single-textarea" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required=""></textarea>
								            </div>
										</div>
										<div class="text-left text-sm-right mt-5 mb-5">
											<button id="review_submit" type="submit" class="genric-btn primary" value="Submit">submit</button>
										</div>
									</form>
								</div>

							</div>

						</div>
					</div>

				</div>
			</div>
		</div>

	</div>


</div>

@endsection


@section('breadcumb')
    <h2>{{$book->title}}</h2>
@endsection