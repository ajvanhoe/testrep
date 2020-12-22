<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand ml-3 mr-2" href="{{route('dashboard')}}">
        <img src="{{asset('images/logo.png')}}" style="width:110px;height:35px" >
    </a>
    <!-- Navbar left side -->
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar center -->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-md-0"></div>
    
    <!-- Navbar right side -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item">
            <a class="nav-link" href="{{route('welcome')}}" target="__blank">
            <i class="fas fa-fw fa-globe"></i>
            <span>Website</span>
            </a>
        </li>

        <li class="nav-item pr-3">
            <a class="nav-link" href="{{route('logout')}}" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

    </ul>
</nav>