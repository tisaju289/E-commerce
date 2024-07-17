@extends('dashboard.layout.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      @if (Session::has('success'))
      <script>
          Toastify({
              text: "{{ Session::get('success') }}",
              duration: 3000, // 3 seconds
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
              stopOnFocus: true, // Prevents dismissing of toast on hover
          })
          .showToast();
      </script>
      @endif
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">User List</h3>

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
            <a href="{{ route('user-createPage') }}" class="btn btn-success w-15">User Create</a>
          </div>
         
          {{-- @php
          $index = ($users->currentPage() - 1) * $users->perPage() + 1;
          @endphp --}}
         
            <table class="table table-striped">
                <thead class="thead-white text-center bg-gray">
                  <tr>
                    <th class="border border-white" scope="col">ID</th>
                    <th class="border border-white" scope="col">User Name</th>
                    <th class="border border-white" scope="col">Email</th>
                    <th class="border border-white" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="text-center">

                  @foreach ($users as $user)

                  <tr>
                    <th class="border border-primary" scope="row">{{ $user->id }}</th>
                    <td class="border border-primary">{{ $user->name }}</td>
                    <td class="border border-primary">{{ $user->email }}</td>
                    <td class="border border-primary">
                        <a href="{{ route('users-assign-role-edit', $user->id) }}" class="btn btn-info">Add / Edit Assign Role</a>
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>


              </table>
          
        </div>
    </section>
  </div>
@endsection
