@extends('appshell::layouts.default')

@section('title')
    {{ __('Editing') }} {{ $product->name }}
@stop

@section('content')
<div class="row">

    <div class="col-12 col-lg-8 col-xl-9">
        {!! Form::model($product, [
                'route'  => ['vanilo.website.update', $product],
                'method' => 'PUT',
				'enctype'=>'multipart/form-data',
            ])
        !!}
        <div class="card card-accent-secondary">
            <div class="card-header">
                {{ __('Product Daddta') }}
            </div>
            <div class="card-block">
                @include('vanilo::website._form')
				@include('vanilo::website._edit_html')
            </div>

            <div class="card-footer">
                <button class="btn btn-primary">{{ __('Save') }}</button>
                <a href="#" onclick="history.back();" class="btn btn-link text-muted">{{ __('Cancel') }}</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

    <div class="col-12 col-lg-4 col-xl-3">
        @include('vanilo::website._edit_images')
    </div>

</div>
@stop
