@extends('layouts.main')
@section('styles')
	<link rel="stylesheet" href="{{ asset('css/davet-list.css') }}">
	<style>
		.non-registry-view{
			display:none;
		}
		.registry-view{
			display:none;
		}
	</style>
@endsection
@section('scripts')
<script src="{{ asset('js/product.js') }}"></script>
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
<section class="list-header davet">
	<div class="container">
		<div class="row">
			<h1 class="title">
				{{$taxon->name}}
			</h1>
			<span class="subtitle">
				{{$taxon->meta_description}}
			</span>
		</div>
	</div>
</section>

<section class="themes">
	<div class="container">
		<div class="row">
			<div class="col-md-3 filters"  style="display:none;">
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
			<div class="col-md-12">
				<div class="row">
					@if(!$products->isEmpty())
						@foreach($products as $product)
							@include('product.index._product')
						@endforeach
					@endif
					<div class="col-md-12 theme-pagination">
						{{ $products->links() }}
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
@endsection
