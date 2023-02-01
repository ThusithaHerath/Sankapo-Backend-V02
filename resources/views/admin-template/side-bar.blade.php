 <div class="sidebar-wrapper">
    <div>
      <div class="logo-wrapper"><a href="{{url('/')}}"><img class="img-fluid for-light" src="{{url('assets/images/logo/logo-sankapo.png')}}" height="20%" alt=""><img class="img-fluid for-dark" src="{{url('assets/images/logo/logo-sankapo.png')}}" alt=""></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
      </div>
      <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
          <ul class="sidebar-links" id="simple-bar">
              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>

            <li class="sidebar-list">
              <label class="badge badge-danger">2</label><a class="sidebar-link sidebar-title" href="#"><i class="fa fa-shopping-basket"> </i><span>  Ad Manager</span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{url('/products')}}">Products</a></li>
                <li><a href="{{url('/properties')}}">Properties</a></li>
              </ul>
            </li>
            <li class="sidebar-list">
              <label class="badge badge-danger"></label><a class="sidebar-link sidebar-title" href="#"><i class="icofont icofont-chart-flow-alt-1"></i><span> Category Manager</span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{url('/add-category')}}">Add new category </a></li>
                <li><a href="{{url('/categories')}}">Categories </a></li>
              </ul>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="shopping-bag"></i><span>Auction Manager</span></a>
              <ul class="sidebar-submenu">
              </ul>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="users"></i><span>Users</span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{url('/users')}}">Users</a></li>
              </ul>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="users"></i><span>Admin Users</span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{url('/admin-users')}}">Admin Users</a></li>
                <li><a href="{{url('/add-new-admin')}}">Add New Admin</a></li>
              </ul>
            </li>
           


          </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
    </div>
  </div> 