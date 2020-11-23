@extends('layouts.main')
@section('styles')
	<link rel="stylesheet" href="{{ asset('css/website-edit.css') }}">
@endsection
@section('content')

<div class="container page-list guests">
	<section class="guests-list">
		<h1 class="guests-list-title">Kayıt Listesi</h1>
		@foreach($guests as $guest)
			<div class="col-md-12 page-row">
				<div class="row">
					<div class="col d-flex align-items-center">
						<h3 class="rsvp_name">{{$guest->name}}</h3>
					</div>
					<div class="col d-flex align-items-center">
						<label>{{$guest->email}}</label>
					</div>
					<div class="col d-flex justify-content-center align-items-center">
						<label>{{$guest->guests}} Kişi</label>
					</div>
					<div class="col d-flex justify-content-center align-items-center">
						<a  class="rsvp_message" href="#" data-toggle="tooltip" title="{{$guest->messages}}">Mesajı Gör</a>
					</div>
					<div class="col">
						<a href="{{route('delete_guest',$guest->id)}}" class="btn btn-danger">Sil</a>
					</div>
				</div>
			</div>
		@endforeach

	</section>
</div>

@endsection
