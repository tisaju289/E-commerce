<aside class="main-sidebar sidebar-dark-primary elevation-4">
 
    <a href="../../index3.html" class="brand-link">
      <img src="adminDashboard/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>


    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="adminDashboard/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Ti Saju</a>
        </div>
      </div>

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
 
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
         


         
          
        
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('brandListPage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand List</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('categoryListPage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categoty List</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('productListPage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('productSliderListPage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('productDetailsListPage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Details</p>
                </a>
              </li>
            </ul>

          </li>


    <!-- Role and Permission Links for Super Admin -->
    
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
          Role And Permission
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('user-list') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>User list</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('permission-list') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Permission List</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('role-list') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Role List</p>
          </a>
        </li>
      </ul>
    </li>








       
        </ul>
      </nav>
     
    </div>
  </aside>