@if($property->id != 1 && $property->id != 5)
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
