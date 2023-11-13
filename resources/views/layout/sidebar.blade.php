<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #3C2317;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('template/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-tex font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" >
        <div class="image">
          <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-light">Admin </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group " data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" style="background-color: #9F8772;" placeholder="Search" aria-label="Search">
          <div class="input-group-append" >
            <button class="btn btn-sidebar " style="background-color: #9F8772;">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               
          <!-- Sidebar Dashboard -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p class="text-light">
                Dashboard
              </p>
            </a>
          </li>
        

          <li class="nav-item">
            <a href="/education" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p class="text-light">
                Education
              </p>
            </a>
          </li>

           
          <!-- Sidebar Hobby -->
          <li class="nav-item">
            <a href="/hobby" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p class="text-light">
               Hobby
              </p>
            </a>
          </li>

          <!-- Sidebar Skill -->
          <li class="nav-item">
            <a href="/skill" class="nav-link">
              <i class="nav-icon fas fas fa-users"></i>
              <p class="text-light">
                Skill
              </p>
            </a>
           

          <li class="nav-header">EXAMPLES</li>

          <!-- Sidebar Register -->
          <li class="nav-item">
            <a href="/register" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p class="text-light">
                Register
              </p>
            </a>
          </li>

          <!-- Sidebar Logout -->
          <li class="nav-item">
            <a href="{{ route('action_logout') }}" class="nav-link">
              <i class="nav-icon  fas fa-sign-out-alt"></i>
              <p class="text-light">
                Logout
              </p>
            </a>
          </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  