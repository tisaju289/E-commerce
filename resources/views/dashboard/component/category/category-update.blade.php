@extends('dashboard.layout.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Category</li>
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
          <h3 class="card-title">Edit Category</h3>

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
          <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="categoryName" class="form-label">category Name</label>
                    <input type="text" class="form-control" id="categoryName" name="categoryName" value="{{ $category->categoryName }}" required>
                </div>
                <div class="mb-3">
                    <label for="categoryImg" class="form-label">category Image</label>
                    <input type="file" class="form-control" id="categoryImg" name="categoryImg">
                </div>
                @if($category->categoryImg)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $category->categoryImg) }}" alt="category Image" width="100">
                    </div>
                @endif
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
      </div>

    </section>
    <!-- /.content -->
</div>

@endsection
