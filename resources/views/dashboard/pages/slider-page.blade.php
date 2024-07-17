@extends('dashboard.layout.app')

@section('content')

    @include('dashboard.component.slider.slider-list');
    @include('dashboard.component.slider.slider-create');
    @include('dashboard.component.slider.slider-update');
    @include('dashboard.component.slider.slider-delete');
    
@endsection