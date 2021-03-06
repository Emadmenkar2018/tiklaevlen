<div class="card">
    <div class="card-block">
        <h6 class="card-title">{{ __('Özellikler') }}</h6>

        <table class="table">
            <tr>
                <td>
                    @foreach($product->propertyValues as $propertyValue)
                        <span class="badge badge-pill badge-dark">
                            {{ $propertyValue->property->name }}:
                            {{ $propertyValue->title }}
                        </span>
                    @endforeach
                </td>
                <td class="text-right">
                    <button type="button" data-toggle="modal"
                            data-target="#properties-assign-to-model-modal"
                            class="btn btn-outline-success btn-sm">{{ __('Yönet') }}</button>
                </td>
            </tr>
        </table>
    </div>
</div>

@include('vanilo::property-value.assign._form', [
    'for' => 'product',
    'forId' => $product->id,
    'assignments' => $product->propertyValues,
    'properties' => $properties
])
