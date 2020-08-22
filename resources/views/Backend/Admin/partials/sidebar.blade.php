<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header d-flex align-items-center">
      <a class="navbar-brand" href="../../pages/dashboards/dashboard.html">
        <img src="{{asset('Backend')}}/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
      <div class="ml-auto">
        <!-- Sidenav toggler -->
        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            @if(Request::is('admin*'))
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="ni ni-shop text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
            @endif
            @if(Request::is('user*'))
            <a class="nav-link" href="{{ route('user.dashboard') }}">
              <i class="ni ni-shop text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
            @endif
          </li> 
        <!----------------- Admin Sidevar Here --------------------
         --------------------------------------------------------->   
        @if(Request::is('admin*'))        
          <li class="nav-item">
            <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
              <i class="ni ni-bag-17 text-orange"></i>
              <span class="nav-link-text"> Address Managment</span>
            </a>
            <div class="collapse collapse-show" id="navbar-examples">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="{{ route('admin.divition') }}" class="nav-link active">Divition</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.district') }}" class="nav-link">District</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.association') }}" class="nav-link">Associations</a>
                </li>
              </ul>
            </div>
          </li>
        @endif
           <!----------------- User Sidevar Here --------------------
            ------------------------------------------------------->     
          <li class="nav-item">
            <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
              <i class="ni ni-app text-info"></i>
              <span class="nav-link-text">Products</span>
            </a>
            <div class="collapse" id="navbar-components">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="../../pages/tables/Orders.html" class="nav-link">Add New Products</a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/tables/Orders.html" class="nav-link">All Products</a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/tables/Orders.html" class="nav-link">Deactivated Products</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-forms">
              <i class="ni ni-single-02 text-pink"></i>
              <span class="nav-link-text">Customers</span>
            </a>
            <div class="collapse" id="navbar-forms">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="../../pages/tables/Orders.html" class="nav-link">Customers List</a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/tables/Orders.html" class="nav-link">Wholesaler List</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
              <i class="ni ni-archive-2 text-default"></i>
              <span class="nav-link-text">Inventory</span>
            </a>
            <div class="collapse" id="navbar-tables">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="../../pages/tables/Orders.html" class="nav-link">Inventory List</a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/tables/Orders.html" class="nav-link">Inventory Recive</a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/tables/Orders.html" class="nav-link">Inventory Move</a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/tables/Orders.html" class="nav-link">Purchase</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/tables/Orders.html">
              <i class="ni ni-archive-2 text-green"></i>
              <span class="nav-link-text">RAM</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/tables/Orders.html">
              <i class="ni ni-badge text-info"></i>
              <span class="nav-link-text">Coupons</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/tables/Orders.html">
              <i class="ni ni-circle-08 text-red"></i>
              <span class="nav-link-text">Manage Staffs</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/tables/Orders.html">
              <i class="ni ni-bell-55 text-red"></i>
              <span class="nav-link-text">Sebseriber</span>
            </a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-maps">
              <i class="ni ni-world text-primary"></i>
              <span class="nav-link-text">Web Settings</span>
            </a>
            <div class="collapse" id="navbar-maps">
              <ul class="nav nav-sm flex-column">
               <li class="nav-item">
                  <a href="#navbar-multilevel" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-multilevel">General Settings</a>
                  <div class="collapse show" id="navbar-multilevel" style="">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="#!" class="nav-link ">Logo</a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link ">Other Page</a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link ">Popup Banner</a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link ">Website Footer</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#navbar-multilevel" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-multilevel">Home Page Settings</a>
                  <div class="collapse show" id="navbar-multilevel" style="">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="#!" class="nav-link ">Slider</a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link ">Featured Links</a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link ">Add Barnd</a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link ">Home Page Customization</a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="nav-item">
                  <a href="#navbar-multilevel" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-multilevel">All Menu</a>
                  <div class="collapse show" id="navbar-multilevel" style="">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="#!" class="nav-link ">Menu</a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link ">Categori</a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link ">Sub Categori</a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </li>
        </ul>

      </div>
    </div>
  </div>
</nav>