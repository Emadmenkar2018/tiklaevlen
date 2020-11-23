@extends('appshell::layouts.default')

@section('title')
    {{ __('Yeni Basılı İş Ekle') }}
@stop

@section('content')

    {!! Form::open(['route' => 'vanilo.paper.store', 'autocomplete' => 'off', 'enctype'=>'multipart/form-data', 'class' => 'row']) !!}

        <div class="col-12 col-lg-8 col-xl-9">
            <div class="card card-accent-success">
                <div class="card-header">
                    {{ __('Basılı İş Detayları') }}
                </div>
                <div class="card-block">
                    @include('vanilo::paper._form')
                </div>
                <div class="card-footer">
                    <button class="btn btn-success">{{ __('Oluştur') }}</button>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 col-xl-3">
			@include('vanilo::paper._create_images')
        </div>

    {!! Form::close() !!}

@stop
