<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">

            {{-- -----------------------------------------------------------------------------------------------------
            SIDEBAR VERTICAL NAVBAR
            ------------------------------------------------------------------------------------------------------- --}}
            <ul class="sidebar-vertical">
                <!-- leads -->
                <li class="menu-title"><span>Main</span></li>
                @can('view dashboard')
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="fe fe-home"></i> <span>Dashboard</span>
                        </a>
                    </li>
                @endcan
                @can('view leads')
                    <li class="submenu">
                        <a href="#"><i class="fe fe-grid"></i> <span>Career Applications</span></a>
                        <ul>
                            <li><a href="{{ route('admin-career-applications') }}">All Applications</a></li>
                        </ul>
                    </li>
                @endcan
                @can('view leads')
                    <li class="submenu">
                        <a href="#"><i class="fe fe-grid"></i> <span>Leads</span></a>
                        <ul>
                            <li><a href="{{ route('admin-leads') }}">Contact Leads</a></li>
                        </ul>
                    </li>
                @endcan
                <!-- /leads -->



                <!-- management -->
                <li class="menu-title"><span>Management</span></li>
                @can('view blog')
                    <li class="submenu">
                        <a href="#"><i class="fe fe-book"></i> <span>Blog</span></a>
                        <ul>
                            <li><a href="{{ route('admin-blogs') }}">All Blogs</a></li>
                        </ul>
                    </li>
                @endcan
                <li>
                    <a href="{{ route('admin-gallery.index') }}">
                        <i class="fe fe-image"></i> <span>Gallery </span>
                    </a>
                </li>

                <!-- <li>
                    <a href="{{ route('admin-partner.index') }}">
                        <i class="fe fe-briefcase"></i> <span>Partner</span>
                    </a>
                </li> -->
                
                <li>
                    <a href="{{ route('admin-slider.index') }}">
                        <i class="fe fe-image"></i> <span>Home Slider </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-service') }}">
                        <i class="fe fe-briefcase"></i> <span>Services</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-technology.index') }}">
                        <i class="fe fe-cpu"></i> <span>Technology</span>
                    </a>
                </li>








                <!-- /management -->


                @can('view privacy policy')
                    <li>
                        <a href="{{ route('admin-privacy-policy.index') }}">
                            <i class="fe fe-shield"></i> <span>Privacy Policy</span>
                        </a>
                    </li>
                @endcan

                @can('view terms conditions')
                    <li>
                        <a href="{{ route('admin-terms-condition.index') }}">
                            <i class="fe fe-file-text"></i> <span>Terms & Conditions</span>
                        </a>
                    </li>
                @endcan

                <!-- /CMS -->



                <!-- User Management -->
                <li class="menu-title"><span>User Management</span></li>
                @can('view users')
                    <li>
                        <a href="{{ route('admin-users.index') }}">
                            <i class="fe fe-user"></i> <span>Users</span>
                        </a>
                    </li>
                @endcan
                @can('view roles permissions')
                    <li>
                        <a href="{{ route('roles.index') }}">
                            <i class="fe fe-clipboard"></i> <span>Roles & Permission</span>
                        </a>
                    </li>
                @endcan

                <!-- /User Management -->






                <!-- /Support -->

                <!-- Pages -->
                <li class="menu-title"><span>Pages</span></li>
                @can('view profile')
                    <li>
                        <a href="{{ route('profile.edit') }}">
                            <i class="fe fe-user"></i> <span>Profile</span>
                        </a>
                    </li>
                @endcan
                <!-- /Pages -->


                <!-- Settings -->
                <li class="menu-title"><span>Settings</span></li>

                @can('view settings')
                    <li>
                        <a href="{{ route('admin-settings.index') }}">
                            <i class="fe fe-settings"></i> <span>Settings</span>
                        </a>
                    </li>
                @endcan
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fe fe-power"></i> <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>


            </ul>
        </div>
    </div>
</div>