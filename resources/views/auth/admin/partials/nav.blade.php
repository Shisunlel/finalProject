<div class="sidebar">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
-->
  <div class="sidebar-wrapper">
    <div class="logo">
      <a href="javascript:void(0)" class="simple-text logo-mini">
        VV
      </a>
      <a href="javascript:void(0)" class="simple-text logo-normal">
        Vutha Vyrapol
      </a>
    </div>
    <ul class="nav">
      <li class="{{request()->is('dashboard') ? 'active' : ''}}">
        <a href="{{route('dashboard')}}">
          <i class="tim-icons icon-chart-pie-36"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="{{request()->is('dashboard/user') ? 'active' : ''}}">
        <a href="{{route('dashboard-user')}}">
          <i class="tim-icons icon-single-02"></i>
          <p>User</p>
        </a>
      </li>
      <li class="{{request()->is('dashboard/rooms') ? 'active' : ''}}">
        <a href="{{route('dashboard-room')}}">
          <i class="tim-icons icon-istanbul"></i>
          <p>Room</p>
        </a>
      </li>
      <li class="{{request()->is('dashboard/transaction') ? 'active' : ''}}">
        <a href="{{route('dashboard-transc')}}">
          <i class="tim-icons icon-paper"></i>
          <p>Report</p>
        </a>
      </li>
    </ul>
  </div>
</div>
<div class="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-toggle d-inline">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
        <a class="navbar-brand" href="javascript:void(0)">Rentahouse</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <div class="photo">
                <img src="{{'/img/user/' . auth()->id() . '/profile/' .auth()->user()->profile}}" alt="Profile Photo">
              </div>
              <b class="caret d-none d-lg-block d-xl-block"></b>
              <p class="d-lg-none">
                Log out
              </p>
            </a>
            <ul class="dropdown-menu dropdown-navbar">
              <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Log out</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->