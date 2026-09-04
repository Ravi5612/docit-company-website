<div class="header header-one">
    @php
        $websiteSetting = App\Models\WebsiteSetting::where('is_active', true)->first();
        $socialSetting = App\Models\SocialSetting::where('is_active', true)->first();
    @endphp
    @php
        $logo = optional($websiteSetting)->logo
            ? asset('storage/' . $websiteSetting->logo)
            : asset('website/images/main-logo.png');
        $logoWhite = optional($websiteSetting)->logo_white
            ? asset('storage/' . $websiteSetting->logo_white)
            : asset('website/images/main-logo.png');
    @endphp

    <a href="{{ route('dashboard') }}"
        class="d-inline-flex d-sm-inline-flex align-items-center d-md-inline-flex d-lg-none align-items-center device-logo">
        <img src="{{ $logo }}" class="img-fluid logo2" alt="Logo"
            style="max-height: 50px;" />
    </a>
    <div class="main-logo d-inline float-start d-lg-flex align-items-center d-none d-sm-none d-md-none">
        <div class="logo-white">
            <a href="{{ route('dashboard') }}">
                <img src="{{ $logo }}" class="img-fluid logo-blue"
                    alt="Logo" style="max-height: 50px;" />
            </a>
            <a href="{{ route('dashboard') }}">
                <img src="{{ $logo }}" class="img-fluid logo-small"
                    alt="Logo" />
            </a>
        </div>
        <div class="logo-color">
            <a href="{{ route('dashboard') }}">
                <img src="{{ $logo }}" class="img-fluid logo-blue"
                    alt="Logo" style="max-height: 50px;" />
            </a>
            <a href="{{ route('dashboard') }}">
                <img src="{{ $logo }}" class="img-fluid logo-small"
                    alt="Logo" />
            </a>
        </div>
    </div>

    <!-- Sidebar Toggle -->
    <a href="javascript:void(0);" id="toggle_btn">
        <span class="toggle-bars">
            <span class="bar-icons"></span>
            <span class="bar-icons"></span>
            <span class="bar-icons"></span>
            <span class="bar-icons"></span>
        </span>
    </a>
    <!-- /Sidebar Toggle -->

    <!-- Search -->
    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here" />
            <button class="btn" type="submit">
                <img src="{{ asset('admin/assets/img/icons/search.svg') }}" alt="img" />
            </button>
        </form>
    </div>
    <!-- /Search -->

    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Menu -->
    <ul class="nav nav-tabs user-menu">


        <li class="nav-item has-arrow dropdown-heads">
            <a href="javascript:void(0);" class="toggle-switch">
                <i class="fe fe-moon"></i>
            </a>
        </li>

        <li class="nav-item has-arrow dropdown-heads">
            <a href="javascript:void(0);" class="win-maximize">
                <i class="fe fe-maximize"></i>
            </a>
        </li>
        <!-- User Menu -->
        <li class="nav-item dropdown">
            <a href="javascript:void(0)" class="user-link nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img src="{{ asset('admin/assets/img/profiles/avatar-07.jpg') }}" alt="img"
                        class="profilesidebar" />
                    <span class="animate-circle"></span>
                </span>
                <span class="user-content">
                    <span class="user-details">Admin</span>
                    <span class="user-name">{{ Auth::user()->name }}</span>
                </span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilemenu">
                    <div class="subscription-menu">
                        <ul>
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin-settings.index') }}">Settings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="subscription-logout">
                        <ul>

                            <li class="pb-0">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span>Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </li>
        <!-- /User Menu -->
    </ul>

    <!-- /Header Menu -->
</div>