<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ __('SB Admin') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>


    <li class="nav-item active">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-users"></i>
            <span>{{ __('Users') }}</span></a>
    </li>

    
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('profile.index') }}">
            <i class="fas fa-user"></i>
            <span>{{ __('Profile') }}</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('gender.index') }}">
            <i class="fas fa-people-arrows"></i>
            <span>{{ __('Gender') }}</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('profession.index') }}">
            <i class="fas fa-user-graduate"></i>
            <span>{{ __('Profession') }}</span></a>
    </li>
</ul>
