@if($property->id != 1 && $property->id != 5)
<h3>{{ $property->name }}</h3>
<li class="list-group-item">
@foreach($property->values() as $propertyValue)
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="{{ $property->slug }}[]"
               value="{{ $propertyValue->value }}" id="filter-{{$propertyValue->id}}"
               @if(in_array($propertyValue->value, $filters)) checked="checked" @endif
        >
        <label class="custom-control-label" for="filter-{{$propertyValue->id}}">{{ $propertyValue->title }}</label>
    </div>
@endforeach
</li>
@endif
