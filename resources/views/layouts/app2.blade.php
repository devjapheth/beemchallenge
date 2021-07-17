<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/jquery.easing.min.js') }}" defer></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

  <!-- Custom scripts for Datatables-->
<!-- DataTables CSS -->



  <!-- Custom fonts for this template-->
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!-- Custom styles for this template-->
<link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion dark" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/Dashboard">
        <div class="sidebar-brand-icon ">
        <img class="img1" src="images/mocu.png">
        </div>
      </a>

      <!--user information card-->
<hr>
@can('isAdmin')


      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/Dashboard" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>


        <!-- Nav Item - Report -->
        <li class="nav-item active">
        <a class="nav-link" href="/Students" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
        <i class="fas fa-user-graduate"></i>
          <span>Students</span></a>
        </li>

     
        <li class="nav-item active">
                    <a class="nav-link" href="/accountantinfo" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
                      <i class="fas fa-user"></i>
                      <span>My Information</span></a>
                  </li>

        <li class="nav-item active">
            <a class="nav-link" href="/Security" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
            <i class="fas fa-cogs"></i>
              <span>Security</span></a>
            </li>

      @endcan

      @can('isSuper')
      <li class="nav-item active">
            <a class="nav-link" href="/Dashboard" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
          </li>

          <li class="nav-item active">
                <a class="nav-link" href="/Academic" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
                  <i class="fas fa-user-graduate"></i>
                  <span>ACADEMIC</span></a>
              </li>
          <li class="nav-item active">
                <a class="nav-link" href="/Program" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
                  <i class="fas fa-book"></i>
                  <span>PROGRAM </span></a>
              </li>

          <li class="nav-item active">
                <a class="nav-link" href="/Hostel" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
                  <i class="fas fa-building"></i>
                  <span>HOSTEL MANAGEMENT</span></a>
              </li>

              <li class="nav-item active">
                    <a class="nav-link" href="/Payment" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
                      <i class="fas fa-credit-card"></i>
                      <span>PAYMENT SETTING</span></a>
                  </li>

      <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-cog"></i>
              <span style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;">User</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage User:</h6>
                <a class="collapse-item" href="/Accountant">Accountant</a>
                <a class="collapse-item" href="/Add Operator">Add Operator</a>
                <a class="collapse-item" href="/Librarian">Librarian</a>
                <!--<a class="collapse-item" href="/Accomodation">Matron/Patron</a>-->


              </div>
            </div>

          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/accountantinfo" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
              <i class="fas fa-user"></i>
              <span>My Information</span></a>
          </li>
           <!-- Nav Item - Report -->
        <li class="nav-item active">
                <a class="nav-link" href="/Security" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
                <i class="fas fa-cogs"></i>
                  <span>Security</span></a>
                </li>
      @endcan

      @can('isStudent')


      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/Dashboard" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>My Information</span></a>
      </li>


        <!-- Nav Item - Report -->
        <li class="nav-item active">
        <a class="nav-link" href="/Security" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
        <i class="fas fa-cogs"></i>
          <span>Security</span></a>
        </li>


      @endcan

      
      @can('isLibrarian')


      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/Dashboard" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!--<li class="nav-item active">
            <a class="nav-link" href="/AccountSearch" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
            <i class="fas fa-search"></i>
              <span>Search</span></a>
            </li>-->

            <li class="nav-item active">
                    <a class="nav-link" href="/libdebtor" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
                      <i class="fas fa-credit-card"></i>
                      <span>Add Debtors</span></a>
                  </li>

                  <li class="nav-item active">
                      <a class="nav-link" href="/property_debtor" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
                        <i class="fas fa-book"></i>
                        <span>add Property Debtors</span></a>
                    </li>

                    <li class="nav-item active">
                      <a class="nav-link" href="/accountantinfo" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
                        <i class="fas fa-user"></i>
                        <span>My Information</span></a>
                    </li>

        <!-- Nav Item - Report -->
        <li class="nav-item active">
        <a class="nav-link" href="/Security" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
        <i class="fas fa-cogs"></i>
          <span>Security</span></a>
        </li>

      @endcan

         <!-- Nav Item - Contact -->

      @can('isAccountant')


      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/Dashboard" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!--<li class="nav-item active">
            <a class="nav-link" href="/AccountSearch" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
            <i class="fas fa-search"></i>
              <span>Search</span></a>
            </li>-->

            <li class="nav-item active">
                    <a class="nav-link" href="/adddebtor" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
                      <i class="fas fa-credit-card"></i>
                      <span>Add Debtors</span></a>
                  </li>

            <li class="nav-item active">
                    <a class="nav-link" href="/accountantinfo" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
                      <i class="fas fa-user"></i>
                      <span>My Information</span></a>
                  </li>

        <!-- Nav Item - Report -->
        <li class="nav-item active">
        <a class="nav-link" href="/Security" style="color:rgb(242, 156, 43);font-weight:bold;text-transform:uppercase;font-size:20px;">
        <i class="fas fa-cogs"></i>
          <span>Security</span></a>
        </li>

      @endcan

         <!-- Nav Item - Contact -->


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand  topbar mb-4 static-top shadow" style="background:black;">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <h3 style="color:#f29c2b;font-weight:bold;">MoCU Digital Clearance System</h3>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" style="font-weight:bold;color:white;" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray"> {{ Auth::user()->name }} </span>
                <!--<img class="img-profile rounded-circle" src="images/user.png">-->
                <i class="fas fa-user"></i>
              </a>
               <!-- Dropdown - User Information -->
               <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item"  style="font-weight:bold;" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-black"></i>
                  Logout
                </a>
            </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

          @yield('bred')
        <!-- Begin Page Content -->
        <div class="container-fluid">


          <main class="py-4">
            @yield('content')
        </main>
        <br>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-dark dark2" >
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy;JAPHETH OBADIA - PROJECT Bsc BICT III</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="/login"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                 </form>
        </div>
      </div>
    </div>
  </div>




<!--TAWK TO WIDGET-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/5cd8133ed07d7e0c63932938/1dc2a5n7q';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->


  @yield('script')
  
</body>

</html>
