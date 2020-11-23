<div class="card card-accent-success">
	<div class="card-header">{{ __('Html Dosyası') }}</div>
	<div class="card-block">
		@can('create media')
			<div class="card">
				<div class="card-body p-0 d-flex align-items-center">
					<div class="p-3 bg-secondary">
						<div class="align-content-center text-center">
							<i class="zmdi font-2xl zmdi-file"></i>
						</div>
					</div>
					<div class="p-2">
						{{ Form::file('html', ['class' => 'form-control-file']) }}
					</div>
				</div>
			</div>
		@endcan
		@if ($errors->has('html'))
			<div class="sinvalid-feedback">{{ $errors->first('html') }}</div>
		@endif
	</div>
</div>
