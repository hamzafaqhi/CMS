<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="{{route('homepage')}}">
            <i class="fa fa-globe fw"></i> <span>Your Site</span>
            <span class="pull-right-container">
              <i class="label pull-right "></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags fw"></i>
            <span>Catalog </span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">              
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Products
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
                  <a href="#"><i class="fa fa-circle-o"></i>Categories
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                  <li class="active"><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i>All Categories</a></li>
            <li><a href="{{route('category.create')}}"><i class="fa fa-circle-o"></i>Add New Category</a></li>
                  </ul>
                </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-television fw"></i>
            <span>Layout </span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href=""><i class="fa fa-circle-o"></i> Design</a></li> -->
            <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>Pages
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="active"><a href="{{route('pages')}}"><i class="fa fa-circle-o"></i>All Pages</a></li>
                    <li><a href="{{route('create-page')}}"><i class="fa fa-circle-o"></i>Add New Page</a></li>
                  </ul>
            </li>
            <li><a href=""><i class="fa fa-circle-o"></i> Theme</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart fw"></i>
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
                
          </ul>
        </li>
       

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
            <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>Sliders
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="active"><a href="{{route('manu.index')}}"><i class="fa fa-circle-o"></i>All Sliders</a></li>
                    <li><a href="{{route('manu.create')}}"><i class="fa fa-circle-o"></i>Add New Slider</a></li>
                  </ul>
            </li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-share-alt fw"></i>
            <span>Marketing</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('news.index')}}"><i class="fa fa-circle-o"></i> Newsletters</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i>Vouchers
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{route('vouchers')}}"><i class="fa fa-circle-o"></i>All Vouchers</a></li>
                <li><a href="{{route('voucher.create')}}"><i class="fa fa-circle-o"></i>Add New Voucher</a></li>
              </ul>
            </li>
          </ul>
          
        </li>
        
        <li class="treeview">
              <a href="#">
                <i class="fa fa-share-alt fw"></i> 
                <span>SEO</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>
                  <span>Tags</span>
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
            <i class="fa fa-user-o"></i>
            <span>User</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href=""><i class="fa fa-circle-o"></i> Design</a></li> -->
            <li class="treeview">
            <li><a href="{{route('users')}}"><i class="fa fa-circle-o"></i> Users</a></li>
            <li><a href="{{route('admin.users')}}"><i class="fa fa-circle-o"></i> Admins</a></li>
            <li><a href="{{route('profile',['id' => Auth::user()->id])}}"><i class="fa fa-circle-o"></i> Profile</a></li>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog fw"></i>
            <span>System</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('setting')}}"><i class="fa fa-circle-o"></i> Settings</a></li>
            <li><a href="{{route('maintenance')}}"><i class="fa fa-circle-o"></i> Maintenance</a></li>
          </ul>
        </li>
         
        
    </section>
    <!-- /.sidebar -->
  </aside>