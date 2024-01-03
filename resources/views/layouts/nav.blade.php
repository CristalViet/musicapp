<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="http://127.0.0.1:8000/admin/dashboard" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Home</a>
      </li>
    
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      
     
    
      <!-- Notifications Dropdown Menu -->
      
   {{-- logout-item --}}
      <li class="nav-item">
        <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            Logout
          
            <i class="fas fa-sign-out-alt"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
      </li>
    </ul>
 
    
  </nav>