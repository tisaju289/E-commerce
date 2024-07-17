





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
          <h3 class="card-title">User Name: {{ $user->name }}</h3>

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
      
              
          <h1>Assign Roles to User: {{ $user->name }}</h1>

          <form action="{{ route('users-assign-role-update', $user->id) }}" method="POST">
              @csrf
          
              <div class="card mb-3">
                  <div class="card-header">
                      <h2>Roles</h2>
                  </div>
                  <div class="card-body">
                      @foreach($roles as $role)
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->name }}"
                                  {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                              <label class="form-check-label">{{ $role->name }}</label>
                          </div>
                      @endforeach
                  </div>
              </div>
          
              <button type="submit" class="btn btn-primary">Update Roles</button>
          </form>

    </section>
    <!-- /.content -->
  </div>




        </div>




      
    {{-- <h1>Edit Permissions for Role: {{ $role->name }}</h1>

    <form action="{{ route('roles.permissions.update', $role->id) }}" method="POST">
        @csrf

        <div>
            @foreach($permissions as $permission)
                <div>
                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                    <label>{{ $permission->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit">Update Permissions</button>
    </form>

    </section>
    <!-- /.content -->
  </div> --}}


@endsection













{{-- 
@extends('backend.layout.app')

@section('content')
    <h1>Edit Permissions for Role: {{ $role->name }}</h1>

    <form action="{{ route('roles.permissions.update', $role->id) }}" method="POST">
        @csrf

        <div>
            @foreach($permissions as $permission)
                <div>
                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                    <label>{{ $permission->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit">Update Permissions</button>
    </form>
@endsection --}}
