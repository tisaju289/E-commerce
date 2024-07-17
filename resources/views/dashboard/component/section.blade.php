<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

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

          <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner text-white">
                        <h3>{{ $brand }}</h3>
                        <p class="text-white">Total Brand</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-tags"></i>
                    </div>
                    <a href="#" class="small-box-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner text-white">
                        <h3>{{ $category }}</h3>
                        <p class="text-white">Total Category</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-box"></i>
                    </div>
                    <a href="#" class="small-box-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner text-white">
                        <h3>{{ $product }}</h3>
                        <p class="text-white">Total Product</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner text-white">
                        <h3>{{ $slider }}</h3>
                        <p class="text-white">Total Slider</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-sliders-h"></i>
                    </div>
                    <a href="#" class="small-box-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
