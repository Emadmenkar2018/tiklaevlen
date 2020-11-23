<div class="form-group row">
	<div class="col-md-12">
		<label>{{ __('Ülke') }}</label>

	        {{ Form::select('billpayer[address][country_id]', $countries->pluck('name', 'id'),
	                setting('appshell.default.country'), [
	                'class' => 'form-control' . ($errors->has('billpayer.address.country_id') ? ' is-invalid' : '')
	            ])
	        }}

	        @if ($errors->has('billpayer.address.country_id'))
	            <div class="invalid-feedback">{{ $errors->first('billpayer.address.country_id') }}</div>
	        @endif
	</div>


</div>

<div class="form-group row">
	<div class="col-md-12">
	    <label class="">{{ __('Adres') }}</label>
		{{ Form::text('billpayer[address][address]', null, [
				'class' => 'form-control' . ($errors->has('billpayer.address.address') ? ' is-invalid' : '')
			])
		}}
		@if ($errors->has('billpayer.address.address'))
			<div class="invalid-feedback">{{ $errors->first('billpayer.address.address') }}</div>
		@endif
	</div>
</div>

<div class="form-group row">
	<div class="col-md-12">
    	<label>{{ __('Posta Kodu') }}</label>

        {{ Form::text('billpayer[address][postalcode]', null, [
                'class' => 'form-control' . ($errors->has('billpayer.address.postalcode') ? ' is-invalid' : '')
            ])
        }}
        @if ($errors->has('billpayer.address.postalcode'))
            <div class="invalid-feedback">{{ $errors->first('billpayer.address.postalcode') }}</div>
        @endif
	</div>
</div>

<div class="form-group row">
	<div class="col-md-12">
		<label>{{ __('Şehir') }}</label>
		{{ Form::text('billpayer[address][city]', null, [
				'class' => 'form-control' . ($errors->has('billpayer.address.city') ? ' is-invalid' : '')
			])
		}}
		@if ($errors->has('billpayer.address.city'))
			<div class="invalid-feedback">{{ $errors->first('billpayer.address.city') }}</div>
		@endif
	</div>
</div>
