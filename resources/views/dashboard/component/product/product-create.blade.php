<!-- resources/views/products/createpage.blade.php -->

@extends('dashboard.layout.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Add</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
    
      @if (Session::has('error'))
      <script>
          document.addEventListener('DOMContentLoaded', function() {
              Toastify({
                  text: "{{ Session::get('error') }}",
                  duration: 3000, // 3 seconds
                  gravity: "top", 
                  position: "right", 
                  backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                  stopOnFocus: true, // Prevents dismissing of toast on hover
              }).showToast();
          });
      </script>
      @endif
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Add New Product</h3>

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
    <form action="{{ route('product.create') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="row">
        <div class="form-group col-md-6">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required maxlength="200">
        </div>

        <div class="form-group col-md-6">
            <label for="short_des">Short Description</label>
            <input type="text" name="short_des" id="short_des" class="form-control" required maxlength="500">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" required maxlength="50">
        </div>

        <div class="form-group col-md-6">
            <label for="discount">Discount</label>
            <select name="discount" id="discount" class="form-control" required>
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
            <label for="discount_price">Discount Price</label>
            <input type="text" name="discount_price" id="discount_price" class="form-control" required maxlength="50">
        </div>

        <div class="form-group col-md-6">
            <label for="image">Product Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
            <label for="stock">Stock</label>
            <select name="stock" id="stock" class="form-control">
                <option value="0">Out of Stock</option>
                <option value="1">In Stock</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="star">Star Rating</label>
            <input type="number" name="star" id="star" class="form-control" step="0.1" min="0" max="5" required>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
            <label for="remark">Remark</label>
            <select name="remark" id="remark" class="form-control">
                <option value="popular">popular</option>
                <option value="new">new</option>
                <option value="top">top</option>
                <option value="special">special</option>
                <option value="trending">trending</option>
                <option value="regular">regular</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="brand_id">Brand</label>
            <select name="brand_id" id="brand_id" class="form-control">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->brandName }}</option>
                @endforeach
            </select>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Create Product</button>
  </form>
  <!-- ফর্ম শেষ -->

        </div>
    </section>
    <!-- /.content -->
  </div>

@endsection
