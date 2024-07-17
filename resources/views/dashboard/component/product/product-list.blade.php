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
            <li class="breadcrumb-item active">Product Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    @if (Session::has('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Toastify({
                text: "{{ Session::get('success') }}",
                duration: 3000, // 3 seconds
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                stopOnFocus: true, // Prevents dismissing of toast on hover
            }).showToast();
        });
    </script>
    @endif
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
        <h3 class="card-title">Product List</h3>

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
        <div class="mb-2">
          <a href="{{ url('productCreatePage') }}" class="btn btn-success w-15">Product Create</a>
        </div>
       
        @php
          $index = 1;
        @endphp
        
        <table class="table table-striped border border-primary">
          <thead class="thead-white text-center bg-gray border border-primary">
            <tr class="border border-primary">
              <th class="border border-white" scope="col">ID</th>
              <th class="border border-white" scope="col">Product Name</th>
              <th class="border border-white" scope="col">Prodcut Image</th>
              <th class="border border-white" scope="col">Action</th>
            </tr>
          </thead>
          <tbody class="text-center border border-primary">

            @foreach ($products as $product)
            <tr class="border border-primary">
                <th class="border border-primary" scope="row">{{ $index++ }}</th>
                <td class="border border-primary">{{ $product->title }}</td>
                <td class="border border-primary">
                  <img src="{{ asset('storage/' . $product->image) }}" alt="product Image" width="50">
                </td>
                <td class="border border-primary">
                  <a href="{{ route('product.update.page', $product->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            

          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

@endsection
