@extends('layouts.app')

@section('content')

<div class="hero-wrap js-fullheight" style="background-image: url('{{asset('assets/images/image_2.jpg')}}');"
>
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
				data-scrollax-parent="true">
				<div class="col-md-7 ftco-animate">
					<h2 class="subheading">Welcome to Vacation Rental</h2>
					<h1 class="mb-4">Rent an appartment for your vacation</h1>
					<p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact
							us</a></p>
				</div>
			</div>
		</div>
	</div>




	<section class="ftco-section bg-light">
		<div class="container-fluid px-md-0">
			<div class="row no-gutters justify-content-center pb-5 mb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2>Apartment Room</h2>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col-lg-6">
                    @foreach ($getrooms as $rooms)
                        
                  
					<div class="room-wrap d-md-flex">
						<a href="{{route('hotel.room.details',$rooms->id)}}" class="img" style="background-image: url({{asset('assets/images/'.$rooms->image.'')}});"></a>
						<div class="half left-arrow d-flex align-items-center">
							<div class="text p-4 p-xl-5 text-center">
								<p class="star mb-0"><span class="fa fa-star"></span><span
										class="fa fa-star"></span><span class="fa fa-star"></span><span
										class="fa fa-star"></span><span class="fa fa-star"></span></p>
								 <p class="mb-0"><span class="price mr-1">${{$rooms->price}}</span> <span class="per">per night</span></p> 
								<h3 class="mb-3"><a href="{{route('hotel.room.details',$rooms->id)}}">{{$rooms->name}}</a></h3>
								<ul class="list-accomodation">
									<li><span>Max:</span> {{$rooms->max_persons}}persons</li>
									<li><span>Size:</span>{{$rooms->size}} m2</li>
									<li><span>View:</span>{{$rooms->view}}</li>
									<li><span>Bed:</span>{{$rooms->num_beds}}</li>
								</ul>
								<p class="pt-1"><a href="{{route('hotel.room.details',$rooms->id)}}" class="btn-custom px-3 py-2">View Room
										Details <span class="icon-long-arrow-right"></span></a></p>
							</div>
						</div>
					</div>
                    @endforeach
				</div>
		
			</div>
		</div>
	</section>



	

	<section class="ftco-intro" style="background-image: url(images/image_2.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-9 text-center">
					<h2>Ready to get started</h2>
					<p class="mb-4">It’s safe to book online with us! Get your dream stay in clicks or drop us a line
						with your questions.</p>
					<p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Learn More</a> <a href="#"
							class="btn btn-white px-4 py-3">Contact us</a></p>
				</div>
			</div>
		</div>
	</section>


@endsection