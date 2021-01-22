@if(Auth::check())



    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="{{route('base.currency')}}">
                <i class="fas fa-fw fa-cog"></i>
                <span>Base Currency {{isset(Auth::user()->base_currency) ? "(".Auth::user()->base_currency.")":""}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.alerts.index')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Alerts</span>
            </a>
        </li>
    </ul>



@endif