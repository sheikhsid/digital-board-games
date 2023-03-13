<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{ url('/home') }}"><img src="{{ asset('images/logo/logo.png') }}" alt="Logo"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="{{ url('/home') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item  ">
                            <a href="{{ url('/games') }}" class='sidebar-link'>
                            <i class="bi bi-joystick"></i>
                                <span>Games</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{ url('/players') }}" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                                <span>Players</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="https://wordwall.net/account/login" class='sidebar-link' target="_blank">
                            <i class="bi bi-folder2-open"></i>
                                <span>Create Game</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item  ">
                            <a class='sidebar-link' href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-power"></i>  <span>{{ __('Logout') }} </span>
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>