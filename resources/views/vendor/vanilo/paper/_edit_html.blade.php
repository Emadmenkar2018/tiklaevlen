<div class="card card-accent-secondary">
	<div class="card-header">{{ __('Html Dosyası') }}
	</div>
	<div class="card-block">
		@if($product->html != 0)
			<a href="/{{$html->path}}" target="_blank">Dosyayı Gör</a>
		@endif
		{{ Form::file('html', ['class' => 'form-control-file']) }}
	</div>
</div>
