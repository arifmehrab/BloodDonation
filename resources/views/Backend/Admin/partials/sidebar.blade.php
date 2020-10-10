<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header d-flex align-items-center">
      <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
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
          </li> 
        <!----------------- Admin Sidevar Here --------------------
         --------------------------------------------------------->   
        @if(Request::is('admin*'))  
        
        <li class="nav-item">
          <a class="nav-link" href="#post" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
            <i class="fa fa-list"></i>
            <span class="nav-link-text">Blogs</span>
          </a>
          <div class="collapse collapse-show" id="post">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link active">Categories</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.post.create') }}" class="nav-link">Add Post</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.post.index') }}" class="nav-link">All Post</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.post.pending.list') }}" class="nav-link">Pending Post</a>
              </li>
            </ul>
          </div>
        </li>

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
                  <a href="{{ route('admin.upazila') }}" class="nav-link">Upazila</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#navbar-examples1" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples1">
              <i class="ni ni-world text-primary"></i>
              <span class="nav-link-text">Settings</span>
            </a>
            <div class="collapse collapse-show" id="navbar-examples1">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="{{ route('admin.settings') }}" class="nav-link active">Site Info Setting</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.seo') }}" class="nav-link active">SEO Setting</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples2">
              <i class="ni ni-world text-primary"></i>
              <span class="nav-link-text">Home Page Settings</span>
            </a>
            <div class="collapse collapse-show" id="navbar-examples2">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="{{ route('admin.setting.one') }}" class="nav-link active">Hom Setting One</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.setting.title') }}" class="nav-link active">Hom Page Title Setting</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.count.down.setting') }}" class="nav-link active">Hom Page CountDown Setting</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
              <i class="ni ni-app text-info"></i>
              <span class="nav-link-text">Photo Gallery</span>
            </a>
            <div class="collapse" id="navbar-components">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="{{ route('admin.photo.gallery') }}" class="nav-link">Total Photo Gallery</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#team-member" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="team-member">
              <i class="ni ni-app text-info"></i>
              <span class="nav-link-text">Our Team Member</span>
            </a>
            <div class="collapse" id="team-member">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="{{ route('admin.team.member') }}" class="nav-link">Team Members</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#summary" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="summary">
              <i class="fa fa-atom"></i>
              <span class="nav-link-text">Blood Summary</span>
            </a>
            <div class="collapse" id="summary">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="{{ route('admin.blood.summary') }}" class="nav-link">Blood Summary</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#navbar-components4" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components4">
              <i class="fa fa-medkit text-red"></i>
              <span class="nav-link-text">Blood Request</span>
            </a>
            <div class="collapse" id="navbar-components4">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="{{ route('admin.pending.blood.request') }}" class="nav-link">Pending Request</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.complete.blood.request') }}" class="nav-link">Complete Request</a>
                </li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.blood.donar') }}">
              <i class="ni ni-single-02 text-pink"></i>
              <span class="nav-link-text">Total Donar List</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.subscriber') }}">
              <i class="ni ni-bell-55 text-red"></i>
              <span class="nav-link-text">Sebseriber</span>
            </a>
          </li>

        </ul>
        @endif    
      </div>
    </div>
  </div>
</nav>