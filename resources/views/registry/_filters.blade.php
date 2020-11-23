<form style="margin-bottom:30px;" action="{{
    route('registry')
}}">

        @foreach($properties as $property)
            @include('registry.index._property', ['property' => $property, 'filters' => $filters[$property->slug] ?? []])
        @endforeach
		<button class="btn btn-sm btn-primary">Uygula</button>
</form>
