<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand ml-3 mr-2" href="{{route('dashboard')}}">
        <img src="{{asset('images/logo.png')}}" style="width:110px;height:35px" >
    </a>

    

    <!-- Navbar center -->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-auto">
        <span class="btn btn-danger"><strong>{{($page->title)}}</strong></span>
    </div>

    <!-- Navbar center-right -->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-5">
        <a class="btn btn-primary btn-sm text-white ml-3 px-3" data-toggle="modal" data-target=".bd-example-modal-xl">Images</a>
        <a class="btn btn-primary btn-sm text-white ml-3 px-3" data-toggle="collapse" href="#show-keywords">Keywords</a>
        <button class="btn btn-success btn-sm text-white ml-3 px-3" id="save-page">Save page</button>
    </div>
    
    <!-- Navbar right side -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item">
            <a class="nav-link" href="{{route('main', $page->slug)}}" target="__blank">
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