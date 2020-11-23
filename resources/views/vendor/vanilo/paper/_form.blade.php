

<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon">
            <i class="zmdi zmdi-layers"></i>
        </span>
        {{ Form::text('name', null, [
                'class' => 'form-control form-control-lg' . ($errors->has('name') ? ' is-invalid' : ''),
                'placeholder' => __('Websitesi İsmi')
            ])
        }}
        @if ($errors->has('name'))
            <div class="invalid-tooltip">{{ $errors->first('name') }}</div>
        @endif
    </div>
</div>

<hr>

<div class="form-row">
    <div class="form-group col-12 col-md-6 col-xl-4">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="zmdi zmdi-code-setting"></i>
            </span>
            {{ Form::text('sku', null, [
                    'class' => 'form-control' . ($errors->has('sku') ? ' is-invalid' : ''),
                    'placeholder' => __('Ürün Kodu')
                ])
            }}
        </div>
        @if ($errors->has('sku'))
            <input hidden class="form-control is-invalid">
            <div class="invalid-feedback">{{ $errors->first('sku') }}</div>
        @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-12 col-md-6 col-xl-4">
        <div class="input-group">
            {{ Form::text('price', null, [
                    'class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''),
                    'placeholder' => __('Fiyat')
                ])
            }}
            <span class="input-group-addon">
                {{ config('vanilo.framework.currency.code') }}
            </span>
        </div>
        @if ($errors->has('price'))
            <input hidden class="form-control is-invalid">
            <div class="invalid-feedback">{{ $errors->first('price') }}</div>
        @endif
    </div>
</div>

<hr>

<div class="form-group row">
    <label class="form-control-label col-md-2">{{ __('Durum') }}</label>
    <div class="col-md-10">
        <?php /*$errors->has('state') ? ' is-invalid' : ''; */ ?>

        @foreach($states as $key => $value)
            <label class="radio-inline" for="state_{{ $key }}">
                {{ Form::radio('state', $key, $product->state == $value, ['id' => "state_$key"]) }}
                {{ $value }}
                &nbsp;
            </label>
        @endforeach

        @if ($errors->has('state'))
            <input hidden class="form-control is-invalid">
            <div class="invalid-feedback">{{ $errors->first('state') }}</div>
        @endif
    </div>
</div>

<hr>

<div class="form-group">
    <label>{{ __('Açıklama') }}</label>

    {{ Form::textarea('description', null,
            [
                'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),
                'placeholder' => __('Ürün açıklamasını buraya yazabilirsiniz...')
            ]
    ) }}

    @if ($errors->has('description'))
        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
    @endif
</div>

<div class="form-group">
    <?php $seoHasErrors = any_key_exists($errors->toArray(), ['ext_title', 'meta_description', 'meta_keywords']) ?>
    <h5><a data-toggle="collapse" href="#product-form-seo" class="collapse-toggler-heading"
           @if ($seoHasErrors)
               aria-expanded="true"
           @endif
        ><i class="zmdi zmdi-chevron-right"></i> {{ __('SEO') }}</a></h5>

    <div id="product-form-seo" class="collapse{{ $seoHasErrors ? ' show' : '' }}">
        <div class="callout">

            @include('vanilo::paper._form_seo')

        </div>
    </div>
</div>

<div class="form-group">
    <?php $extraHasErrors = any_key_exists($errors->toArray(), ['slug', 'excerpt']) ?>
    <h5><a data-toggle="collapse" href="#product-form-extra" class="collapse-toggler-heading"
           @if ($extraHasErrors)
           aria-expanded="true"
                @endif
        ><i class="zmdi zmdi-chevron-right"></i> {{ __('Ekstra Ayarlar') }}</a></h5>

    <div id="product-form-extra" class="collapse{{ $extraHasErrors ? ' show' : '' }}">
        <div class="callout">

            @include('vanilo::paper._form_extra')

        </div>
    </div>
</div>
