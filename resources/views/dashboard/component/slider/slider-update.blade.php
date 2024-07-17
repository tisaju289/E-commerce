<!-- resources/views/product_sliders/updatepage.blade.php -->

@extends('dashboard.layout.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Slider Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Slider</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
          <h3 class="card-title">Update Product Slider</h3>

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
           
    <form action="{{ route('productSlider.update', $productSlider->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')


      <div class="row">
        <div class="form-group col-md-6">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control">
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $productSlider->product_id == $product->id ? 'selected' : '' }}>{{ $product->title }}</option>
                @endforeach
            </select>
        </div>
      </div>


      <div class="row">
        <div class="form-group col-md-6">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control"  value="{{ $productSlider->title }}">
        </div>

        <div class="form-group col-md-6">
            <label for="short_des">Short Description</label>
            <input type="text" name="short_des" id="short_des" class="form-control"  value="{{ $productSlider->short_des }}">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ $productSlider->price }}">
        </div>

        <div class="form-group col-md-6">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($productSlider->image)
                <img src="{{ asset('storage/' . $productSlider->image) }}" alt="Product Slider Image" class="img-thumbnail mt-2" width="150">
            @endif
        </div>
      </div>

      

      <button type="submit" class="btn btn-primary">Update Slider</button>
  </form>


        </div>
    </section>

  </div>

@endsection
