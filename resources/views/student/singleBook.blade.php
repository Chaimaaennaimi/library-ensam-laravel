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
					<!-- <form action="/reserver" method="POST">
						<input type="text" name="tets" value="test">
						<button type="submit">Send</button>
					</form> -->
					<div class=" d-flex flex-column align-items-center justify-content-center">
						@if( $summary['disponible'] > 0)
                        	<span style="font-size:17px; padding:10px; width:100%" class="badge  bg-success">Disponible<span class="badge badge-light" style="margin-left:5px; margin-bottom:2px;">{{$summary['disponible']}}</span></span>
						@else
                        	<span style="font-size:17px; padding:10px; width:100%; color:white;" class="badge  bg-danger">Indisponible</span>
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
							<button type="button" id="reserverButton" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
								Réserver Livre
							</button>
						@endif
					</div>
					
					<!-- Vertically centered modal -->
					
					  <!-- The Modal -->
					<div class="modal fade w-100" id="myModal"  >
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
							
								<!-- Modal Header -->
								<div class="modal-header">
								<h4 class="modal-title">Réservation</h4>
								<button type="button" class="close" id="close" data-dismiss="modal">&times;</button>
								</div>
								
								<!-- Modal body -->
								<div class="modal-body">

									<div id="reserv-msg">
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
									

									<div id="success-msg" class="alert alert-success" role="alert"  style="display: none;">
										<h4 class="alert-heading">Réservation réussie !</h4>
										<p>Présentez-vous le plus tôt possible pour recupérer le livre</p>
										<p class="mb-0">Ramenez avec vous votre carte d'étudiant ! </p>
									</div>

									<div id="error-msg" class="alert alert-danger" role="alert" style="display: none;">
										<h4 class="alert-heading">Réservation échouée !</h4>
										<p>Une erreur a été rencontré lors de votre réservation !</p>
										<p class="mb-0">Réessayer une autre fois !</p>
									</div>

								</div>
								
								<!-- Modal footer -->
								<div id="modal-footer" class="modal-footer">
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
		const today = new Date();
		const dateToSend = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		const todayPlus4 = new Date(today.getTime() + (4*24*60*60*1000));
		const todayPlus4Plus7 = new Date(todayPlus4.getTime() + (7*24*60*60*1000));

		btn.addEventListener('click', (e)=>{
			e.preventDefault();
			dateNow.innerHTML = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
			dateMaxRecuperation.innerHTML = todayPlus4.getFullYear()+'-'+(todayPlus4.getMonth()+1)+'-'+(todayPlus4.getDate());
			dateMaxRetroceder.innerHTML = todayPlus4Plus7.getFullYear()+'-'+(todayPlus4Plus7.getMonth()+1)+'-'+(todayPlus4Plus7.getDate());
		})

		sendReservation.addEventListener('click', async function(e){
			e.preventDefault();

			await fetch('http://localhost:8000/reserver', {
				method: 'POST',
				body: JSON.stringify({idBook, userId,dateToSend}),
				mode: 'cors',
				headers: {
					'Content-Type': 'application/json',
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
					"X-CSRF-TOKEN": "I7MkCzjwdDJ3m9KoXGJn071JXdAMeYV0p4BqNf7b"
				},
				credentials: "include",
			})
			.then((response)=>{
				console.log(response.status)
				document.getElementById('reserv-msg').style.display = 'none';
				document.getElementById('modal-footer').style.display='none'; 
				document.getElementById('close').style.display='none';
				if(response.status ==200){
					document.getElementById('success-msg').style.display = 'block';
				}else{

					document.getElementById('error-msg').style.display = "block";
				}
				setTimeout(function() {
					location.reload();
				}, 3000);
			})
			.catch((err)=>{
				window.location.href = "http://localhost:8000";
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
									<h4>Comment ({{ $summary['nbComments'] }}) </h4>
                                
								</div>

								<!-- User Review -->
								@if($summary['nbComments'] > 0)

									@foreach($summary['comments'] as $data)
										<div class="user_review_container d-flex flex-column flex-sm-row" style="width: 100%;">
											<div class="user" style="width: 15%">
												<div class="user_pic" style="position: relative;"><i class="ti-user" style="position: absolute; left:38%; top:37%;"></i></div>
											</div>
											<div class="review">
												<div class="review_date">{{$data['date_comment']}}</div>
												<div class="user_name">{{$data['nom']}} {{$data['prenom']}}</div>
												<p>{{ $data['comment'] }}</p>
											</div>
										</div>
									@endforeach

								@else
									<p class="text-center">Aucun commentaire</p>
								@endif


								

							</div>

							<!-- Add Review -->

							<div class="col-lg-6 add_review_col">

								<div class="add_review mt-5">
									
										<!-- <div>
											<h1>Add Comment</h1>
                                            <div class="mt-20">
									            <input type="text" name="first_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required="" class="single-input">
								            </div>
                                            <div class="mt-10">
									            <input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required="" class="single-input">
								            </div>
										</div> -->
										<div class="mt-5">
											<h1>Ajoutez un commentaire :</h1>
											<!-- <ul class="user_star_rating">
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
											</ul> -->
                                            <div class="mt-5">
									            <textarea id="comment" class="single-textarea" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required=""></textarea>
								            </div>
										</div>
										<div class="text-left text-sm-right mt-5 mb-5">
											<button id="review_submit" type="submit" class="genric-btn primary" value="Submit">submit</button>
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
<script>
	const reviewSubmit = document.getElementById('review_submit');
 
	reviewSubmit.addEventListener('click', async function (e){
		e.preventDefault();

		const idBook = `{{$book->id}}`;
		const userId = 1;
		const comment = document.getElementById('comment').value;
		const dateToSend = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();


		alert(comment);

		fetch('http://localhost:8000/sendComment', {
			method : 'POST',
			headers: {
					'Content-Type': 'application/json',
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
					"X-CSRF-TOKEN": "I7MkCzjwdDJ3m9KoXGJn071JXdAMeYV0p4BqNf7b"
			},
			body : JSON.stringify({idBook, userId, comment, dateToSend})
		})
		.then((r)=>{
			console.log(r);
			if(r.status===200){
				location.reload();
			}
		})
		.catch((err)=>{
			console.log(err);
		})

	})  
</script>

@endsection


@section('breadcumb')
    <h2>{{$book->title}}</h2>
@endsection