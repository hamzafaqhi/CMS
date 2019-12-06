<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li >
          <a href="{{route('dashboard')}}">
            <i class="fa fa-th"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="label pull-right "></i>
            </span>
          </a>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-th-list"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i>All Categories</a></li>
            <li><a href="{{route('category.create')}}"><i class="fa fa-circle-o"></i>Add New Category</a></li>
          </ul>
        </li>
        <li class="treeview">
              <a href="#"><i class="fa fa-th-list"></i> Catalog
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Product
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                  <li class="active"><a href="{{route('product.index')}}"><i class="fa fa-circle-o"></i>All Products</a></li>
                  <li><a href="{{route('product.create')}}"><i class="fa fa-circle-o"></i>Add New Product</a></li>
                  </ul>
                </li>

                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Manufacture
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                  <li class="active"><a href="{{route('manu.index')}}"><i class="fa fa-circle-o"></i>All Manufactures</a></li>
            <li><a href="{{route('manu.create')}}"><i class="fa fa-circle-o"></i>Add New Manufacturer</a></li>
                  </ul>
                </li>
              </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout </span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Design</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Theme</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Sales </span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
               
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Orders
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                  <li class="active"><a href="{{route('order')}}"><i class="fa fa-circle-o"></i>All Orders</a></li>
                  <li><a href="{{route('returns')}}"><i class="fa fa-circle-o"></i>Returns</a></li>
                  <li><a href="{{route('cancel')}}"><i class="fa fa-circle-o"></i>Cancelled Order</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Vouchers
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                  <li class="active"><a href="{{route('vouchers')}}"><i class="fa fa-circle-o"></i>All Vouchers</a></li>
                  <li><a href="{{route('voucher.create')}}"><i class="fa fa-circle-o"></i>Add New Voucher</a></li>
                  </ul>
                </li>

<!--           
            <li><a href=""><i class="fa fa-circle-o"></i> Returns</a></li>
            <li><a href="{{route('vouchers')}}"><i class="fa fa-circle-o"></i> Vouchers</a></li> --> 

          </ul>
        </li>
        <li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Banners </span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('banner')}}"><i class="fa fa-circle-o"></i> All Banner</a></li>
            <li><a href="{{route('banner.create')}}"><i class="fa fa-circle-o"></i> Add Banner</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Marketing</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Coupons</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Mails</a></li>

          </ul>
        </li>
        <li class="treeview">
              <a href="#"><i class="fa fa-th-list"></i> SEO
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Tags
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                  <li class="active"><a href="{{route('tags')}}"><i class="fa fa-circle-o"></i>All Tags</a></li>
            <li><a href="{{route('tags.create')}}"><i class="fa fa-circle-o"></i>Add New Tags</a></li>
                  </ul>
                </li>
              </ul>
            </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>System</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('setting')}}"><i class="fa fa-circle-o"></i> Settings</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Maintenance</a></li>

</ul>
</li>
         
        
    </section>
    <!-- /.sidebar -->
  </aside>