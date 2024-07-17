@extends('dashboard.layout.app')

@section('content')

    @include('dashboard.component.category.category-list');
    @include('dashboard.component.category.category-create');
    @include('dashboard.component.category.category-update');
    @include('dashboard.component.category.category-delete');
    
@endsection