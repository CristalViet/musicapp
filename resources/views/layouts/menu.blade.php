<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item ">
        <a href="{{route('admin.dashboard')}}" class="nav-link ">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        {{-- <div class="nav nav-treeview">
          {{-- <li class="nav-item"> --}}
          

         
        {{-- </div>  --}}
        
      </li>
           {{-- Quản lí người dùng --}}
      <li class="nav-item">
        <a href="{{route('admin.manageUsers')}}" class="nav-link">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Quản lí người dùng
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        
      </li>
      {{-- Quản lí bài hát --}}
      <li class="nav-item">
        <a href="{{route('admin.manageSongs')}}" class="nav-link">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Quản lí bài hát
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
      
      </li>
      {{-- quản lí genre --}}
      <li class="nav-item">
        <a href="{{route('admin.manageGenres')}}" class="nav-link">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
           Quản lý thể loại
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
      
      </li>
      {{-- Quản lí playlist --}}
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Quản lí playlist
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        
      </li>  
      {{-- Quản lí nghệ sĩ --}}
      <li class="nav-item">
        <a href="{{route('admin.manageArtists')}}" class="nav-link">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Quản lí nghệ sĩ
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
       
      </li> 
      
      
 
    </ul>
    
  </nav>