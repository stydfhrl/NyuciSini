<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Nyuci Sini</title>
  <!-- base:css -->
  <link rel="stylesheet" href={{ asset('template/vendors/mdi/css/materialdesignicons.min.css') }}>
  <link rel="stylesheet" href={{ asset('template/vendors/css/vendor.bundle.base.css') }}>
  <!-- endinject -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href={{ asset('template/css/style.css') }}>
  <!-- endinject -->
  <link rel="shortcut icon" href={{asset('asset/logolaundry.png')}} />
  <!-- Toastr Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @stack('style')
</head>
<body>
  <div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item d-flex justify-content-center">
            <a class="" href=""><img src={{asset('asset/logolaundry.png')}} alt="logo" style="width: 60px;height: 60px; border-radius: 50%" /></a>
        </li>
        <li class="nav-item sidebar-category">
          <p>Navigation</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard">
            <i class="fa-solid fa-house-chimney menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item sidebar-category">
          <p>Components</p>
          <span></span>
        </li>
          @if(auth()->user()->level == 'admin')
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="fa-solid fa-users-gear menu-icon"></i>
              <span class="menu-title">Management User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href={{ url('/data-owner')}}>Owner</a></li>
                <li class="nav-item"> <a class="nav-link" href={{ url('/data-karyawan')}}>Karyawan</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url ('/data-outlet')}}">
              <i class="fa-solid fa-shop menu-icon"></i>
              <span class="menu-title">Outlet</span>
            </a>
          </li>
          @endif
        @if(auth()->user()->level == 'admin')
          <li class="nav-item">
            <a class="nav-link" href="{{ url ('/data-laundry')}}">
              <i class="fa-solid fa-house-chimney menu-icon"></i>
              <span class="menu-title">Paket Laundry</span>
            </a>
          </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{ url ('/data-customer')}}">
            <i class="fa-solid fa-users menu-icon"></i>
            <span class="menu-title">Customers</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/data-transaksi')}}">
            <i class="fa-solid fa-money-bill-transfer menu-icon"></i>
            <span class="menu-title">Transaksi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/icons/mdi.html">
            <i class="fa-solid fa-book menu-icon"></i>
            <span class="menu-title">Laporan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/identitas-aplikasi') }}">
            <i class="fa-solid fa-address-card menu-icon"></i>
            <span class="menu-title">Identitas Aplikasi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/auth/profile') }}">
            <i class="fa-solid fa-user menu-icon"></i>
            <span class="menu-title">User Profile</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end navbar-search-wrapper">
          <div class="navbar-menu-wrapper d-none d-lg-flex align-items-center">
            <button class="navbar-toggler navbar-toggler align-self-center mr-3" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu" style="color: black"></span>
            </button>
            <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1 text-dark">Welcome back, {{ Auth::user()->nama }}</h4>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                  <img src="{{asset('asset/orang1.png')}}" alt="profile"/>
                  <span class="nav-profile-name">{{ Auth::user()->nama }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="{{ url('/auth/profile') }}">
                    <i class="mdi mdi-settings text-primary"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="{{ url('logout') }}">
                    <i class="mdi mdi-logout text-primary"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
          <!-- row end -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
        <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- External script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- End External script -->
  @stack('scripts')
  <!-- base:js -->
  <script src={{asset('template/vendors/js/vendor.bundle.base.js')}}></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src={{asset('template/vendors/chart.js/Chart.min.js')}}></script>
  <script src={{asset('template/js/jquery.cookie.js')}} type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src={{asset('template/js/off-canvas.js')}}></script>
  <script src={{asset('template/js/hoverable-collapse.js')}}></script>
  <script src={{asset('template/js/template.js')}}></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
    <script src={{asset('template/js/jquery.cookie.js')}} type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src={{asset('template/js/dashboard.js')}}></script>
  <!-- End custom js for this page-->
  {{-- Kits FontAwesome --}}
  <script src="https://kit.fontawesome.com/4d8cfff1ae.js" crossorigin="anonymous"></script>
</body>

</html>