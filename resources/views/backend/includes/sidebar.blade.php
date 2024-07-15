<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center pt-5 py-5" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('backend/img/HR_logo.jpg') }}" alt="{{ __('HR Logo') }}" style="width: 100%; border-radius: 50%;">
        </div>
        <div class="sidebar-brand-text mx-3" style="font-size: 12px;">{{ __('HR Management') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>


   @if (auth()->user()->can('user-list'))
   <li class="nav-item active">
    <a class="nav-link" href="{{ route('user.index') }}">
        <i class="fas fa-users"></i>
        <span>{{ __('Users') }}</span></a>
    </li>
   @endif


    <li class="nav-item active">
        <a class="nav-link" href="{{ route('profile.index') }}">
            <i class="fas fa-user"></i>
            <span>{{ __('Profile') }}</span></a>
    </li>
    @if(auth()->user()->can('gender-list'))
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('gender.index') }}">
            <i class="fas fa-venus-mars"></i>
            <span>{{ __('Gender') }}</span></a>
    </li>
    @endif

    @if (auth()->user()->can('profession-list'))
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('profession.index') }}">
            <i class="fas fa-user-graduate"></i>
            <span>{{ __('Profession') }}</span></a>
    </li>
    @endif
    @if (auth()->user()->can('role-list'))
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('role.index') }}">
            <i class="fas fa-user-shield"></i>
            <span>{{ __('Role') }}</span></a>
    </li>
    @endif
    @if (auth()->user()->can('permission-list'))
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('permission.index') }}">
            <i class="fas fa-user-lock"></i>
            <span>{{ __('Permission') }}</span></a>
    </li>
    @endif
    @if (auth()->user()->can('shift-list'))
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('shift.index') }}">
            <i class="fas fa-hourglass-half"></i>
            <span>{{ __('Shift') }}</span></a>
    </li>
    @endif
</ul>
