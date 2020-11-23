@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="card shadow-sm">
					<div class="card-body">
						Ali & Ayşe Hediye Listesi<br/>
						<a href="{{route('registry')}}">Yönet</a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card shadow-sm">
					<div class="card-body">
						Ali & Ayşe Web Sitesi<br/>
						<a href="{{route('website_manage')}}">Yönet</a>
						<a href="/website/{{$website->slug}}/home" target="_blank">Göster</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
