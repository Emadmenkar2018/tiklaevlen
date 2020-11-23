@extends('appshell::layouts.default')

@section('title')
    {{ $product->name }}
@stop

@section('content')

    <div class="row">
        <div class="col-sm-6 col-md-4">
            @component('appshell::widgets.card_with_icon', [
                    'icon' => $product->is_active ? 'layers' : 'layers-off',
                    'type' => $product->is_active ? 'success' : 'warning'
            ])
                {{ $product->name }}
                @if (!$product->is_active)
                    <small>
                        <span class="badge badge-secondary">
                            {{ __('inactive') }}
                        </span>
                    </small>
                @endif
                @slot('subtitle')
                    {{ $product->sku }}
                @endslot
            @endcomponent
        </div>

        <div class="col-sm-6 col-md-5">
            @component('appshell::widgets.card_with_icon', [
                    'icon' => 'time-restore',
                    'type' => 'info'
            ])
                {{ $product->state }}

                @slot('subtitle')
                    {{ __('Oluşturma Tarihi') }}
                    {{ $product->created_at->format(__('Y-m-d H:i')) }}
                @endslot
            @endcomponent
        </div>

        <div class="col-sm-6 col-md-3">
            @component('appshell::widgets.card_with_icon', ['icon' => 'mall'])
                {{ $product->units_sold ?: '0' }}
                {{ __('adet satıldı') }}
                @slot('subtitle')
                    @if ($product->last_sale_at)
                        {{ __('Son satış tarihi') }}
                        {{ $product->last_sale_at->format(__('Y-m-d H:i')) }}
                    @else
                        {{ __('Satış yapılmadı') }}
                    @endif
                @endslot
            @endcomponent
        </div>

        <div class="col-sm-6 col-md-9">
            @include('vanilo::website._show_categories')
            @include('vanilo::website._show_properties')
        </div>

        <div class="col-sm-6 col-md-3">
            @include('vanilo::website._show_images')
			@include('vanilo::website._show_html')
        </div>
    </div>

    <div class="card">
        <div class="card-block">
            @can('edit products')
            <a href="{{ route('vanilo.website.edit', $product) }}" class="btn btn-outline-primary">{{ __('Güncelle') }}</a>
            @endcan

            @can('delete products')
                {!! Form::open(['route' => ['vanilo.website.destroy', $product], 'method' => 'DELETE', 'class' => "float-right"]) !!}
                <button class="btn btn-outline-danger">
                    {{ __('Sil') }}
                </button>
                {!! Form::close() !!}
            @endcan

        </div>
    </div>

@stop
