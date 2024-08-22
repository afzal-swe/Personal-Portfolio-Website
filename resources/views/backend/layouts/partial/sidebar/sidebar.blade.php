<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
       
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Home Slider</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('home.slider') }}">Manage Slider</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>About Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('about.info') }}">Manage About Page</a></li>
                    </ul>
                </li>

             

                <li class="menu-title">Pages</li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-recoverpw.html">Seo Setting</a></li>
                        <li><a href="auth-login.html">Social Setting</a></li>
                        <li><a href="auth-login.html">Website Setting</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="ri-settings-2-line align-middle me-1"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-recoverpw.html">Recover Password</a></li>
                        <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>