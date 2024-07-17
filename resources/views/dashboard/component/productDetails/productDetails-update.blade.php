<!-- resources/views/product_details/updatepage.blade.php -->

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
              <li class="breadcrumb-item active">Product Details Update</li>
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
          <h3 class="card-title">Update Product Details</h3>

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
    <form action="{{ route('productDetails.update', $productDetails->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="row">
        <div class="form-group col-md-6">
            <label for="img1">Image 1</label>
            <input type="file" name="img1" id="img1" class="form-control">
            @if($productDetails->img1)
                <img src="{{ Storage::url($productDetails->img1) }}" alt="Image 1" width="100">
            @endif
        </div>

        <div class="form-group col-md-6">
            <label for="img2">Image 2</label>
            <input type="file" name="img2" id="img2" class="form-control">
            @if($productDetails->img2)
                <img src="{{ Storage::url($productDetails->img2) }}" alt="Image 2" width="100">
            @endif
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
            <label for="img3">Image 3</label>
            <input type="file" name="img3" id="img3" class="form-control">
            @if($productDetails->img3)
                <img src="{{ Storage::url($productDetails->img3) }}" alt="Image 3" width="100">
            @endif
        </div>

        <div class="form-group col-md-6">
            <label for="img4">Image 4</label>
            <input type="file" name="img4" id="img4" class="form-control">
            @if($productDetails->img4)
                <img src="{{ Storage::url($productDetails->img4) }}" alt="Image 4" width="100">
            @endif
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-12">
            <label for="des">Description</label>
            <textarea name="des" id="des" class="form-control" required maxlength="2000">{{ $productDetails->des }}</textarea>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control" required maxlength="100" value="{{ $productDetails->color }}">
        </div>

        <div class="form-group col-md-6">
            <label for="size">Size</label>
            <input type="text" name="size" id="size" class="form-control" required maxlength="50" value="{{ $productDetails->size }}">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control">
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $productDetails->product_id == $product->id ? 'selected' : '' }}>{{ $product->title }}</option>
                @endforeach
            </select>
        </div>
    </div>

      <button type="submit" class="btn btn-primary">Update Product Details</button>
  </form>
  <!-- ফর্ম শেষ -->

        </div>
    </section>
    <!-- /.content -->
  </div>

@endsection
