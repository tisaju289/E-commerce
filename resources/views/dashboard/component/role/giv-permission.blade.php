
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

     
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Role Name: {{ $role->name }}</h3>

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
      
              
          <h1>Edit Permissions for Role: {{ $role->name }}</h1>

          <form action="{{ route('roles.permissions.update', $role->id) }}" method="POST">
              @csrf
      
              @foreach($permissions as $category => $perms)
                  <div class="card mb-3">
                      <div class="card-header">
                          <h2>{{ ucfirst($category) }} Permissions</h2>
                      </div>
                      <div class="card-body">
                          @foreach($perms as $permission)
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                      {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                  <label class="form-check-label">{{ $permission->name }}</label>
                              </div>
                          @endforeach
                      </div>
                  </div>
              @endforeach
      
              <button type="submit" class="btn btn-primary">Update Permissions</button>
          </form>

    </section>
    <!-- /.content -->
  </div>




        </div>




@endsection






