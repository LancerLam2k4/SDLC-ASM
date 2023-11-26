<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
  
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Our Music<sup>2</sup></div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('userdashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Home</span></a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{ route('usersongs') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Songs</span></a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="/userprofile">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Profile</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('createusersongs') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Create New Song</span></a>
      </li>
    
    
  </ul>
  <style>
    #accordionSidebar {
      position: fixed;
      height: 100%;
      width: 220px; /* Điều chỉnh chiều rộng theo mong muốn */
      top: 0;
      left: 0;
      z-index: 1;
      padding-top: 56px; /* Điều chỉnh theo chiều cao của navbar (nếu có) */
      background-color: #000; /* Điều chỉnh màu sắc theo mong muốn */
    }
  
    #accordionSidebar a {
      width: 100%;
      padding: 12px;
      text-align: left;
      text-decoration: none;
      color: #fff;
    }
  
    #accordionSidebar .sidebar-divider {
      background-color: #fff; /* Màu sắc đường chia sidebar */
    }
  
    #sidebarToggle {
      position: absolute;
      top: 0;
      left: 220px; /* Điều chỉnh khoảng cách từ nút toggle đến lề trái của sidebar */
      background-color: #000; /* Màu sắc nút toggle */
      border: none;
      color: #fff;
      padding: 10px;
      cursor: pointer;
    }
  
    #sidebarToggle:hover {
      background-color: #555; /* Màu sắc khi hover nút toggle */
    }
  </style>
  