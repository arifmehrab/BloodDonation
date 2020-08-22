@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
          <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
            <li class="breadcrumb-item active" aria-current="page">Default</li>
          </ol>
        </nav>
      </div>
      <div class="col-lg-6 col-5 text-right">
        <a href="#" class="btn btn-sm btn-neutral">New</a>
      </div>
    </div>
    <!-- Card stats -->
    <div class="row">
      <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Total Sales</h5>
                <span class="h2 font-weight-bold mb-0">$350,897</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                  <i class="ni ni-active-40"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
              <span class="text-nowrap">Last 30 dayes</span>
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                <span class="h2 font-weight-bold mb-0">2,356</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                  <i class="ni ni-chart-pie-35"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
              <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
              <span class="text-nowrap">Since last month</span>
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                <span class="h2 font-weight-bold mb-0">924</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                  <i class="ni ni-money-coins"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
              <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
              <span class="text-nowrap">Since last month</span>
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                <span class="h2 font-weight-bold mb-0">49,65%</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                  <i class="ni ni-chart-bar-32"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
              <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
              <span class="text-nowrap">Since last month</span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content_body')
<div class="card mb-4">
  <!-- Card header -->
  <div class="card-header">
    <h3 class="mb-0">Form group in grid</h3>
  </div>
  <!-- Card body -->
  <div class="card-body">
    <!-- Form groups used in grid -->
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label" for="example3cols1Input">One of three cols</label>
          <input type="text" class="form-control" id="example3cols1Input" placeholder="One of three cols">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label" for="example3cols2Input">One of three cols</label>
          <input type="text" class="form-control" id="example3cols2Input" placeholder="One of three cols">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label" for="example3cols3Input">One of three cols</label>
          <input type="text" class="form-control" id="example3cols3Input" placeholder="One of three cols">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="form-group">
          <label class="form-control-label" for="example4cols1Input">One of four cols</label>
          <input type="text" class="form-control" id="example4cols1Input" placeholder="One of four cols">
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="form-group">
          <label class="form-control-label" for="example4cols2Input">One of four cols</label>
          <input type="text" class="form-control" id="example4cols2Input" placeholder="One of four cols">
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="form-group">
          <label class="form-control-label" for="example4cols3Input">One of four cols</label>
          <input type="text" class="form-control" id="example4cols3Input" placeholder="One of four cols">
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="form-group">
          <label class="form-control-label" for="example4cols3Input">One of four cols</label>
          <input type="text" class="form-control" id="example4cols3Input" placeholder="One of four cols">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="example2cols1Input">One of two cols</label>
          <input type="text" class="form-control" id="example2cols1Input" placeholder="One of two cols">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="example2cols2Input">One of two cols</label>
          <input type="text" class="form-control" id="example2cols2Input" placeholder="One of two cols">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
