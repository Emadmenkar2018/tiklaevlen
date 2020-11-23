@extends('layouts.main')
@section('styles')
	<link rel="stylesheet" href="{{ asset('css/davet-list.css') }}">
@endsection
@section('scripts')
<script src="{{ asset('js/registry.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".filter-scroll").niceScroll({
		cursorcolor:"#777677",
		cursorborder:"0",
		background:"#DBDBDB"
	});
});
</script>
@endsection
@section('content')
<section class="list-header registry">
	<div class="container">
		<div class="row">
			<h1 class="title">
				Hediye Listesi
			</h1>
			<span class="subtitle">
				Evinizin ihtiyacı olan ürünleri ziyaretçilerinize gösterin.
			</span>
		</div>
	</div>
</section>

<section class="themes">
	<div class="container">
		<div class="row">
			<div class="col-md-3 filters">
				@include('registry._filters', ['properties' => $properties, 'filters' => $filters])
			</div>
			<div class="col-md-9">
				<div class="row">
					@if(!$products->isEmpty())
						@foreach($products as $product)
							@include('registry.index._product')
						@endforeach
					@endif

				</div>
			</div>

		</div>
	</div>
</section>
@endsection
