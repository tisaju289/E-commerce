<!-- resources/views/product_details/createpage.blade.php -->

@extends('dashboard.layout.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Details Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Details Add</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Add New Product Details</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
              <!-- ফর্ম শুরু -->
    <form action="{{ route('productDetails.create') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="row">
        <div class="form-group col-md-6">
            <label for="img1">Image 1</label>
            <input type="file" name="img1" id="img1" class="form-control" required>
        </div>

        <div class="form-group col-md-6">
            <label for="img2">Image 2</label>
            <input type="file" name="img2" id="img2" class="form-control">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
            <label for="img3">Image 3</label>
            <input type="file" name="img3" id="img3" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="img4">Image 4</label>
            <input type="file" name="img4" id="img4" class="form-control">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-12">
            <label for="des">Description</label>
            <textarea name="des" id="des" class="form-control" required maxlength="2000"></textarea>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control" required maxlength="100">
        </div>

        <div class="form-group col-md-6">
            <label for="size">Size</label>
            <input type="text" name="size" id="size" class="form-control" required maxlength="50">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                @endforeach
            </select>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Create Product Details</button>
  </form>
  <!-- ফর্ম শেষ -->

        </div>
    </section>
    <!-- /.content -->
  </div>

@endsection
