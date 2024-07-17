<!-- resources/views/product_sliders/createpage.blade.php -->

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
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Add Product Slider</h3>

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
       
    <form action="{{ route('productSlider.create')}}" method="POST" enctype="multipart/form-data">
      @csrf




      <div class="row">
        <div class="form-group col-md-6">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control">
                <option value="">Select Product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                @endforeach
            </select>
        </div>
      </div>

      
      <div class="row">
        <div class="form-group col-md-6">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="short_des">Short Description</label>
            <input type="text" name="short_des" id="short_des" class="form-control">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control" >
        </div>
      </div>

      

      <button type="submit" class="btn btn-primary">Create Slider</button>
  </form>
 

        </div>
    </section>
    
  </div>

@endsection
