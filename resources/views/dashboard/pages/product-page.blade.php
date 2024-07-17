@extends('dashboard.layout.app')

@section('content')

    @include('dashboard.component.product.product-list');
    @include('dashboard.component.product.product-create');
    @include('dashboard.component.product.product-update');
    @include('dashboard.component.product.product-delete');
    
@endsection