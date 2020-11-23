@extends('layouts.main')
@section('styles')
	<link rel="stylesheet" href="{{ asset('css/website-list.css') }}">
@endsection
@section('scripts')
	<script src="{{ asset('js/product.js') }}"></script>
@endsection
@section('content')
<section class="list-header website">
	<div class="container">
		<div class="row">
			<h1 class="title">
				Düğün Web Sitesi<br/>Şablonlar
			</h1>
		</div>
	</div>
</section>

<section class="themes">
	<div class="container">
		<div class="row">
			<div class="col-md-3 filters">
				<form  style="margin-bottom:30px;" action="{{
				    $taxon ?
				    route('product.category', [$taxon->taxonomy->slug, $taxon])
				    :
				    route('product.index')
				}}">
				        @foreach($properties as $property)
							@if($property->id == 7 || $property->id == 8)
								<div class="filter prop-filter">
									<h3>{{ $property->name }}</h3>
									<div>
										<ul>
											@foreach($property->values() as $propertyValue)
												<li>
													<div class="custom-control custom-checkbox">
												        <input type="checkbox" class="custom-control-input" name="{{ $property->slug }}[]"
												               value="{{ $propertyValue->value }}" id="filter-{{$propertyValue->id}}"
												               @if(in_array($propertyValue->value, $filters)) checked="checked" @endif
												        >
												        <label class="custom-control-label" for="filter-{{$propertyValue->id}}">{{ $propertyValue->title }}</label>
												    </div>
												</li>
											@endforeach

										</ul>
									</div>
								</div>
							@endif
				        @endforeach
						<button class="btn btn-sm btn-primary">UYGULA</button>
				</form>

			</div>
			<div class="col-md-9">
				<div class="row">
					@if(!$products->isEmpty())
						@foreach($products as $product)
							@include('product.index._website-product')
						@endforeach
					@endif

				</div>

				<div class="col-md-12 theme-pagination">
					{{ $products->links() }}
				</div>
			</div>

		</div>


	</div>
</section>
@endsection
