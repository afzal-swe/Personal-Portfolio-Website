
@php
    $contact = DB::table('contacts')->get();
    $progress = DB::table('progress_bar')->get();
@endphp

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
                        <i class="ri-dashboard-line"></i>
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
                        <li><a href="{{ route('about_multi.image') }}">Manage Multi Images</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Project Portfolio</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('project_portfolio.create') }}">Add New Project</a></li>
                        <li><a href="{{ route('all_project_portfolio') }}">Manage Project Portfolio</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Blog Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('blog_category.create') }}">Add Blog Category</a></li>
                        <li><a href="{{ route('all_blog_category.view') }}">Manage Blog Category</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Blog Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('blog.create') }}">Add Blog</a></li>
                        <li><a href="{{ route('view_all_blog') }}">Manage Blog</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i><span class="badge rounded-pill bg-success float-end">{{ count($contact) }}</span>
                        <span>Contact </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('message.view') }}">All Message</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i><span class="badge rounded-pill bg-success float-end">{{ count($progress) }}</span>
                        <span>Skills Progress Bar</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('progress.view') }}">Manage Progress</a></li>
                    </ul>
                </li>

             

                <li class="menu-title">Pages</li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('seos') }}">Seo Setting</a></li>
                        <li><a href="{{ route('socials') }}">Social Setting</a></li>
                        <li><a href="{{ route('website_settings') }}">Website Setting</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="ri-settings-2-line align-middle me-1"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('change.password') }}">Change Password</a></li>
                        <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>