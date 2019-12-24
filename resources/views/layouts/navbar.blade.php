<header class="main-header">
    <!-- Logo -->
    <a href="{{route('dashboard')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>HF</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SHF</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Notifications: style can be found in dropdown.less -->
       
          <!-- User Account: style can be found in dropdown.less -->
          <li class=" user user-menu">
            <a href="{{route('logout')}}" class="" data-toggle="">
              <span class="hidden-xs">Log out</span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>