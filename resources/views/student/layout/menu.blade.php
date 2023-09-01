
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <span>{{\Illuminate\Support\Facades\Auth::getUser()->name}}</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{route('studentDashboard')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Student Dashbord</span>
                </a>
            </li>

            <li class="nav-item nav-category">Components</li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#forms" role="button" aria-expanded="false" aria-controls="forms">
                        <i class="link-icon" data-feather="inbox"></i>
                        <span class="link-title">Assignments</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('answer.index',1)}}" class="nav-link">List Answer Assignments</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('answer.index',0)}}" class="nav-link">List Unresolved Assignments</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('students.courses.index')}}" class="nav-link">List Courses</a>
                            </li>
                        </ul>
                    </div>
                </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#authPages" role="button" aria-expanded="false" aria-controls="authPages">
                    <i class="link-icon" data-feather="unlock"></i>
                    <span class="link-title">Authentication</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="authPages">
                    <ul class="nav sub-menu" >
                        @guest()
                            <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
                        @endguest
                        <li class="nav-item" name="1"><a href="{{route('show_register')}}" class="nav-link" >Register</a></li>
                        @auth()
                            <li class="nav-item"><a href="{{route('logout')}}" class="nav-link">Logout</a></li>
                        @endauth
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#errorPages" role="button" aria-expanded="false" aria-controls="errorPages">
                    <i class="link-icon" data-feather="cloud-off"></i>
                    <span class="link-title">Error</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="errorPages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/error/404.html" class="nav-link">404</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/error/500.html" class="nav-link">500</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</nav>
