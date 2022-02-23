<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="profile-info">
            <figure class="user-cover-image"></figure>
            <div class="user-info">
                <img src="{{asset('assets/img/download.png')}}" alt="avatar">
                <h6 class="">{{Str::ucfirst(Auth::user()->name)}}</h6>
                <p class="">Admin</p>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu {{ (Request::route()->getName() == 'dash') ? 'active' : ''}}">
                <a href="{{route('dash')}}" aria-expanded="{{ (Request::route()->getName() == 'dash') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ (Request::route()->getName() == 'user') ? 'active' : ''}}">
                <a href="{{route('user')}}" aria-expanded="{{ (Request::route()->getName() == 'user') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>Users</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ (Request::route()->getName() == 'management.term') || (Request::route()->getName() == 'management.theme') || (Request::route()->getName() == 'management.content') ? 'active' : ''}}">
                <a href="#datatables" data-toggle="collapse"
                    aria-expanded="{{ (Request::route()->getName() == 'management.term') || (Request::route()->getName() == 'management.theme') || (Request::route()->getName() == 'management.content') ? 'true' : 'false'}}"
                    class="dropdown-toggle"
                >
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-layers">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                        <span>Management Content</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ (Request::route()->getName() == 'management.term') || (Request::route()->getName() == 'management.theme') || (Request::route()->getName() == 'management.content') ? 'show' : ''}}" id="datatables" data-parent="#accordionExample">
                    <li class="{{ (Request::route()->getName() == 'management.term') ? 'active' : ''}}">
                        <a href="{{route('management.term')}}"> Term  </a>
                    </li>
                    <li class="{{ request()->routeIs('management.theme') && Session::get('flag') == 'dialog' ? 'active' : ''}}">
                        <a href="{{route('management.theme', 'dialog')}}"> Content Dialog </a>
                    </li>
                    <li class="{{ request()->routeIs('management.theme') && Session::get('flag') == 'kamus' ? 'active' : ''}}">
                        <a href="{{route('management.theme', 'kamus')}}"> Content Kamus </a>
                    </li>
                </ul>
            </li>



        </ul>

    </nav>

</div>
