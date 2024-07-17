@extends('dashboard.layout.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Role Page</h1>
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
          <h3 class="card-title">Role List</h3>

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
            <a href="{{ route('role-createPage') }}" class="btn btn-success w-15">Role Create</a>
          </div>
         
          @php
          $index = ($roles->currentPage() - 1) * $roles->perPage() + 1;
          @endphp

            <table class="table table-striped border border-primary">
                <thead class="thead-white text-center bg-gray border border-primary">
                  <tr class="border border-primary">
                    <th class="border border-white"  scope="col">ID</th>
                    <th class="border border-white" scope="col">Role Name</th>
                    <th class="border border-white" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="text-center border border-primary">

                  @foreach ($roles as $role)

                  <tr class="border border-primary" >
                    <th class="border border-primary" scope="row">{{ $index++ }}</th>
                    <td class="border border-primary">{{ $role->name }}</td>
                  
                    <td class="border border-primary">
                      <a href="{{ route('roles-permissions-edit', $role->id) }}" class="btn btn-info">Add / Edit Role Permission</a>
                      <a href="{{ route('role-edit', $role->id) }}" class="btn btn-primary">Edit</a>
                      <form action="{{ route('role-destroy', $role->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                      </form>
                    </td>
                  </tr>
                  
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-end mt-3">
                @if ($roles->previousPageUrl())
                    <a href="{{ $roles->previousPageUrl() }}" class="btn btn-primary mr-2">Previous</a>
                @endif
                @if ($roles->nextPageUrl())
                    <a href="{{ $roles->nextPageUrl() }}" class="btn btn-primary">Next</a>
                @endif
            </div>
        </div>
    </section>
  </div>


@endsection
