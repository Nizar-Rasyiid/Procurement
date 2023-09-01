@auth
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Admin Panel</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('../assets/vendors/core/core.css') }}  ">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('../assets/vendors/flatpickr/flatpickr.min.css') }} ">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset(' ../assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('../assets/vendors/flag-icon-css/css/flag-icon.min.css') }} ">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('../assets/css/demo2/style.css') }} ">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset('assets/images/logo3.png') }} " />
  <link href="{{ asset('css/custom-pagination.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  @include('sweetalert::alert')
</head>
<body>

	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
    @if (Auth::user()->name == "Admin")
    <nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand fw-bold">
          <img src="{{ asset('assets/images/logo3.png') }}" alt="Logo" width="150">
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{url('/home')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">User</li>
          <li class="nav-item">
            <a href="{{url('/users-table')}}" class="nav-link">
              <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">Tabel User</span>
            </a>
          </li>
        </li>
          <li class="nav-item nav-category">Penjualan</li>
          <li class="nav-item">
            <a href="{{url('/admin-table/store-so')}}" class="nav-link">
              <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">Input Penjualan</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin-table/SO-table')}}" class="nav-link">
              <i class="link-icon" data-feather="layout"></i>
              <span class="link-title">View List Penjualan</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin-table/payment-so')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Payment Penjualan</span>
            </a>
            </li>
          <li class="nav-item nav-category">Pembelian</li>
          <li class="nav-item">
            <a href="{{url('/admin-table/store-do')}}" class="nav-link">
              <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">Input Pembelian</span>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{url('/admin-table/DO-table')}}" class="nav-link">
              <i class="link-icon" data-feather="layout"></i>
              <span class="link-title">View List Pembelian</span>
            </a>
            </li>
            
            {{-- <li class="nav-item">
            <a href="{{url('/')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Update Pembelian</span>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{url('/admin-table/payment-do')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Payment Order</span>
            </a>
          </li>
        <li class="nav-item nav-category">Verifikasi</li>
        <li class="nav-item">
          <a href="{{url('/admin-table/validate-do')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Verifikasi</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('/admin-table/verifikasi-table')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Tabel Verifikasi</span>
          </a>
        </li>

        <li class="nav-item nav-category">Transaction</li>
          <li class="nav-item">
            <a href="{{url('/admin-table/transaksi-table')}}" class="nav-link">
              <i class="link-icon" data-feather="layout"></i>
              <span class="link-title">List Transaction</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin-table/margin-table')}}" class="nav-link">
              <i class="link-icon" data-feather="layout"></i>
              <span class="link-title">View List Margin</span>
            </a>
          </li>
        </li>
          <li class="nav-item nav-category">AR</li>
          <li class="nav-item">
            <a href="{{url('/admin-table/ar-table-customer')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">AR Customer</span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{url('/admin-table/ar-table-supplier')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">AR Suplier</span>
            </a> 
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{url('/admin-table/payment-ar-customer')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Payment AR Customer</span>
            </a> 
          </li>
          <li class="nav-item">
            <a href="{{url('/admin-table/payment-ar-supplier')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Payment AR Suplier</span>
            </a> 
          </li> --}}
          <li class="nav-item nav-category">AP</li>
          {{-- <li class="nav-item">
            <a href="{{url('/admin-table/ap-table-customer')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">AP Customer</span>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{url('/admin-table/ap-table-supplier')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">AP Suplier</span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{url('/admin-table/payment-ap-customer')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Payment AP Customer</span>
            </a
          </li>
          <li class="nav-item">
            <a href="{{url('/admin-table/payment-ap-supplier')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Payment AP Suplier</span>
            </a>
          </li> --}}
          <li class="nav-item nav-category">Customer</li>
          <li class="nav-item">
            <a href="{{url('/admin-table/storeCustomer')}}" class="nav-link">
              <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">Input Customer</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin-table/customer-table')}}" class="nav-link">
              <i class="link-icon" data-feather="layout"></i>
              <span class="link-title">View List Customer</span>
            </a>
          </li>
          <li class="nav-item nav-category">Suplier</li>
          <li class="nav-item">
            <a href="{{url('/admin-table/storeSuplier')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Input Suplier</span>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{url('/admin-table/suplier-table')}}" class="nav-link">
              <i class="link-icon" data-feather="layout"></i>
              <span class="link-title">View List Suplier</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
        @else
        <nav class="sidebar">
          <div class="sidebar-header">
            <a href="#" class="sidebar-brand fw-bold">
              <img src="{{ asset('assets/images/logo3.png') }}" alt="Logo" width="150">
            </a>
            <div class="sidebar-toggler not-active">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <div class="sidebar-body">
            <ul class="nav">
              <li class="nav-item nav-category">Main</li>
              <li class="nav-item">
                <a href="{{url('/home')}}" class="nav-link">
                  <i class="link-icon" data-feather="box"></i>
                  <span class="link-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item nav-category">Penjualan</li>
              <li class="nav-item">
                <a href="{{url('/admin-table/store-so')}}" class="nav-link">
                  <i class="link-icon" data-feather="inbox"></i>
                  <span class="link-title">Input Penjualan</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin-table/SO-table')}}" class="nav-link">
                  <i class="link-icon" data-feather="layout"></i>
                  <span class="link-title">View List Penjualan</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin-table/payment-so')}}" class="nav-link">
                  <i class="link-icon" data-feather="box"></i>
                  <span class="link-title">Payment Penjualan</span>
                </a>
                </li>
              <li class="nav-item nav-category">Pembelian</li>
              <li class="nav-item">
                <a href="{{url('/admin-table/store-do')}}" class="nav-link">
                  <i class="link-icon" data-feather="inbox"></i>
                  <span class="link-title">Input Pembelian</span>
                </a>
              </li>
                <li class="nav-item">
                <a href="{{url('/admin-table/DO-table')}}" class="nav-link">
                  <i class="link-icon" data-feather="layout"></i>
                  <span class="link-title">View List Pembelian</span>
                </a>
                </li>
                
                {{-- <li class="nav-item">
                <a href="{{url('/')}}" class="nav-link">
                  <i class="link-icon" data-feather="box"></i>
                  <span class="link-title">Update Pembelian</span>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{url('/admin-table/payment-do')}}" class="nav-link">
                  <i class="link-icon" data-feather="box"></i>
                  <span class="link-title">Payment Order</span>
                </a>
              </li>
            <li class="nav-item nav-category">Verifikasi</li>
            <li class="nav-item">
              <a href="{{url('/admin-table/validate-do')}}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Verifikasi</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/admin-table/verifikasi-table')}}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Tabel Verifikasi</span>
              </a>
            </li>
    
            <li class="nav-item nav-category">Transaction</li>
              <li class="nav-item">
                <a href="{{url('/admin-table/transaksi-table')}}" class="nav-link">
                  <i class="link-icon" data-feather="layout"></i>
                  <span class="link-title">List Transaction</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin-table/margin-table')}}" class="nav-link">
                  <i class="link-icon" data-feather="layout"></i>
                  <span class="link-title">View List Margin</span>
                </a>
              </li>
            </li>
              <li class="nav-item nav-category">AR</li>
              <li class="nav-item">
                <a href="{{url('/admin-table/ar-table-customer')}}" class="nav-link">
                  <i class="link-icon" data-feather="box"></i>
                  <span class="link-title">AR Customer</span>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{url('/admin-table/ar-table-supplier')}}" class="nav-link">
                  <i class="link-icon" data-feather="box"></i>
                  <span class="link-title">AR Suplier</span>
                </a> 
              </li> --}}
              {{-- <li class="nav-item">
                <a href="{{url('/admin-table/payment-ar-customer')}}" class="nav-link">
                  <i class="link-icon" data-feather="box"></i>
                  <span class="link-title">Payment AR Customer</span>
                </a> 
              </li>
              <li class="nav-item">
                <a href="{{url('/admin-table/payment-ar-supplier')}}" class="nav-link">
                  <i class="link-icon" data-feather="box"></i>
                  <span class="link-title">Payment AR Suplier</span>
                </a> 
              </li> --}}
              <li class="nav-item nav-category">AP</li>
              {{-- <li class="nav-item">
                <a href="{{url('/admin-table/ap-table-customer')}}" class="nav-link">
                  <i class="link-icon" data-feather="box"></i>
                  <span class="link-title">AP Customer</span>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{url('/admin-table/ap-table-supplier')}}" class="nav-link">
                  <i class="link-icon" data-feather="box"></i>
                  <span class="link-title">AP Suplier</span>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{url('/admin-table/payment-ap-customer')}}" class="nav-link">
                  <i class="link-icon" data-feather="box"></i>
                  <span class="link-title">Payment AP Customer</span>
                </a
              </li>
              <li class="nav-item">
                <a href="{{url('/admin-table/payment-ap-supplier')}}" class="nav-link">
                  <i class="link-icon" data-feather="box"></i>
                  <span class="link-title">Payment AP Suplier</span>
                </a>
              </li> --}}
              <li class="nav-item nav-category">Customer</li>
              <li class="nav-item">
                <a href="{{url('/admin-table/storeCustomer')}}" class="nav-link">
                  <i class="link-icon" data-feather="inbox"></i>
                  <span class="link-title">Input Customer</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin-table/customer-table')}}" class="nav-link">
                  <i class="link-icon" data-feather="layout"></i>
                  <span class="link-title">View List Customer</span>
                </a>
              </li>
              <li class="nav-item nav-category">Suplier</li>
              <li class="nav-item">
                <a href="{{url('/admin-table/storeSuplier')}}" class="nav-link">
                  <i class="link-icon" data-feather="box"></i>
                  <span class="link-title">Input Suplier</span>
                </a>
              </li>
                <li class="nav-item">
                <a href="{{url('/admin-table/suplier-table')}}" class="nav-link">
                  <i class="link-icon" data-feather="layout"></i>
                  <span class="link-title">View List Suplier</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
    @endif

		<!-- partial -->
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					{{-- <form class="search-form">
						<div class="input-group">
              <div class="input-group-text">
                <i data-feather="search"></i>
              </div>
							<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
						</div>
					</form> --}}
					<ul class="navbar-nav">
						{{-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="ms-1 me-1 d-none d-md-inline-block">English</span>
							</a>
							<div class="dropdown-menu" aria-labelledby="languageDropdown">
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ms-1"> English </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ms-1"> French </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ms-1"> German </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ms-1"> Portuguese </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ms-1"> Spanish </span></a>
							</div>
            </li> --}}
						{{-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="grid"></i>
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
                <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
									<p class="mb-0 fw-bold">Web Apps</p>
									<a href="javascript:;" class="text-muted">Edit</a>
								</div>
                <div class="row g-0 p-1">
                  <div class="col-3 text-center">
                    <a href="pages/apps/chat.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="message-square" class="icon-lg mb-1"></i><p class="tx-12">Chat</p></a>
                  </div>
                  <div class="col-3 text-center">
                    <a href="pages/apps/calendar.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="calendar" class="icon-lg mb-1"></i><p class="tx-12">Calendar</p></a>
                  </div>
                  <div class="col-3 text-center">
                    <a href="pages/email/inbox.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="mail" class="icon-lg mb-1"></i><p class="tx-12">Email</p></a>
                  </div>
                  <div class="col-3 text-center">
                    <a href="pages/general/profile.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="instagram" class="icon-lg mb-1"></i><p class="tx-12">Profile</p></a>
                  </div>
                </div>
								<div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
									<a href="javascript:;">View all</a>
								</div>
							</div>
						</li> --}}
						{{-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="mail"></i>
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
								<div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
									<p>9 New Messages</p>
									<a href="javascript:;" class="text-muted">Clear all</a>
								</div>
                <div class="p-1">
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Leonardo Payne</p>
                        <p class="tx-12 text-muted">Project status</p>
                      </div>
                      <p class="tx-12 text-muted">2 min ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Carl Henson</p>
                        <p class="tx-12 text-muted">Client meeting</p>
                      </div>
                      <p class="tx-12 text-muted">30 min ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Jensen Combs</p>
                        <p class="tx-12 text-muted">Project updates</p>
                      </div>
                      <p class="tx-12 text-muted">1 hrs ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Amiah Burton</p>
                        <p class="tx-12 text-muted">Project deatline</p>
                      </div>
                      <p class="tx-12 text-muted">2 hrs ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Yaretzi Mayo</p>
                        <p class="tx-12 text-muted">New record</p>
                      </div>
                      <p class="tx-12 text-muted">5 hrs ago</p>
                    </div>	
                  </a>
                </div>
								<div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
									<a href="javascript:;">View all</a>
								</div>
							</div>
						</li> --}}
						{{-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="bell"></i>
								<div class="indicator">
									<div class="circle"></div>
								</div>
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
								<div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
									<p>6 New Notifications</p>
									<a href="javascript:;" class="text-muted">Clear all</a>
								</div>
                <div class="p-1">
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
											<i class="icon-sm text-white" data-feather="gift"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
											<p>New Order Recieved</p>
											<p class="tx-12 text-muted">30 min ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
											<i class="icon-sm text-white" data-feather="alert-circle"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
											<p>Server Limit Reached!</p>
											<p class="tx-12 text-muted">1 hrs ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="flex-grow-1 me-2">
											<p>New customer registered</p>
											<p class="tx-12 text-muted">2 sec ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
											<i class="icon-sm text-white" data-feather="layers"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
											<p>Apps are ready for update</p>
											<p class="tx-12 text-muted">5 hrs ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
											<i class="icon-sm text-white" data-feather="download"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
											<p>Download completed</p>
											<p class="tx-12 text-muted">6 hrs ago</p>
                    </div>	
                  </a>
                </div>
								<div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
									<a href="javascript:;">View all</a>
								</div>
							</div>
						</li> --}}
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="profile">
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
								<div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
									<div class="mb-3">
										<img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
									</div>
									<div class="text-center">
    <!-- Tampilkan nama user atau sesuatu yang berkaitan dengan user login -->
    <p class="tx-16 fw-bolder">{{Auth::user()->name}} </p>
    <p class="tx-12 text-muted">{{Auth::user()->email}}</p>



									</div>
								</div>
                <ul class="list-unstyled p-1">
                  {{-- <li class="dropdown-item py-2">
                    <a href="pages/general/profile.html" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="user"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="javascript:;" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="edit"></i>
                      <span>Edit Profile</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="javascript:;" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="repeat"></i>
                      <span>Switch User</span>
                    </a>
                  </li> --}}
                  <li class="dropdown-item py-2">
                    <a href="{{ route('logout') }}"  class="text-body ms-0"  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                      <i class="me-2 icon-md" data-feather="log-out"></i>
                      <span>Log Out</span>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </a>
                  </li>
                </ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- partial -->

      


      @yield('admin')
			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
				<p class="text-muted mb-1 mb-md-0">Galus <a href="https://www.nobleui.com" target="_blank">Corporate</a>.</p>
			</footer>
			<!-- partial -->
		
		</div>
	</div>

	<!-- core:js -->
	<script src=" {{asset('../assets/vendors/core/core.js')}} "></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{asset(' ../assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
  <script src="{{asset('../assets/vendors/apexcharts/apexcharts.min.js')}} "></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{asset('../assets/vendors/feather-icons/feather.min.js')}} "></script>
	<script src="{{asset('../assets/js/template.js')}} "></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="{{asset('../assets/js/dashboard-dark.js')}} "></script>
	<!-- End custom js for this page -->

</body>
</html>
@endauth
@guest
<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
{{-- <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta
            name="description"
            content="Responsive HTML Admin Dashboard Template based on Bootstrap 5"
        />
        <meta name="author" content="NobleUI" />
        <meta
            name="keywords"
            content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web"
        />

        <title>NobleUI - HTML Bootstrap 5 Admin Dashboard Template</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
            rel="stylesheet"
        />
        <!-- End fonts -->

        <!-- core:css -->
        <link rel="stylesheet" href="../../../assets/vendors/core/core.css" />
        <!-- endinject -->

        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->

        <!-- inject:css -->
        <link
            rel="stylesheet"
            href="../../../assets/fonts/feather-font/css/iconfont.css"
        />
        <link
            rel="stylesheet"
            href="../../../assets/vendors/flag-icon-css/css/flag-icon.min.css"
        />
        <!-- endinject -->

        <!-- Layout styles -->
        <link rel="stylesheet" href="../../../assets/css/demo2/style.css" />
        <!-- End layout styles -->

        <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
    </head>
    <body>
        <div class="main-wrapper">
            <div class="page-wrapper full-page">
                <div
                    class="page-content d-flex align-items-center justify-content-center"
                >
                    <div class="row w-100 mx-0 auth-page">
                        <div
                            class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center"
                        >
                            <img
                                src="../../../assets/images/others/404.svg"
                                class="img-fluid mb-2"
                                alt="404"
                            />
                            <h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">
                                Run Out Time
                            </h1>
                            <h4 class="mb-2">
                                Sesi Anda Sudah Habis
                            </h4>
                            <h6 class="text-muted mb-3 text-center">
                               Anda Harus Login Kembali
                            </h6>
                            <a href="{{route('login')}}">Login First</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- core:js -->
        <script src="../../../assets/vendors/core/core.js"></script>
        <!-- endinject -->

        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->

        <!-- inject:js -->
        <script src="../../../assets/vendors/feather-icons/feather.min.js"></script>
        <script src="../../../assets/js/template.js"></script>
        <!-- endinject -->

        <!-- Custom js for this page -->
        <!-- End custom js for this page -->
    </body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Admin Panel</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('../assets/vendors/core/core.css') }}  ">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('../assets/vendors/flatpickr/flatpickr.min.css') }} ">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset(' ../assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('../assets/vendors/flag-icon-css/css/flag-icon.min.css') }} ">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('../assets/css/demo2/style.css') }} ">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset('../assets/images/favicon.png') }} " />
</head>
<body>
    <div class="row justify-content-center">

        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome To MBU APP</h1>
                                </div>
    
                                <div class="d-flex justify-content-between">
                                    <a class="small"{{route('login')}}>Login</a>
                                    <a href="{{'/register'}}" class="small">Registrasi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
	<!-- core:js -->
	<script src=" {{asset('../assets/vendors/core/core.js')}} "></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{asset(' ../assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
  <script src="{{asset('../assets/vendors/apexcharts/apexcharts.min.js')}} "></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{asset('../assets/vendors/feather-icons/feather.min.js')}} "></script>
	<script src="{{asset('../assets/js/template.js')}} "></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="{{asset('../assets/js/dashboard-dark.js')}} "></script>
	<!-- End custom js for this page -->

</body>
</html>    


@endguest  