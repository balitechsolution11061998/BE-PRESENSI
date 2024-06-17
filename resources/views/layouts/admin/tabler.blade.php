
<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Bootstrap Gallery - Unify Admin Template</title>
		<!-- Meta -->
		<meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="shortcut icon" href="{{ asset('assetss/images/favicon.svg')}}" />
		<!-- *************
			************ CSS Files *************
		************* -->
		<link rel="stylesheet" href="{{ asset('assetss/fonts/bootstrap/bootstrap-icons.css')}}" />
		<link rel="stylesheet" href="{{ asset('assetss/css/main.min.css')}}" />
		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- Scrollbar CSS -->
		<link rel="stylesheet" href="{{ asset('assetss/vendor/overlay-scroll/OverlayScrollbars.min.css')}}" />

		<link href="{{ asset('tabler/dist/css/tabler.min.css?1674944402') }}" rel="stylesheet" />
		<link href="{{ asset('tabler/dist/css/tabler-flags.min.css?1674944402') }}" rel="stylesheet" />
		<link href="{{ asset('tabler/dist/css/tabler-payments.min.css?1674944402') }}" rel="stylesheet" />
		<link href="{{ asset('tabler/dist/css/tabler-vendors.min.css?1674944402') }}" rel="stylesheet" />
		<link href="{{ asset('tabler/dist/css/demo.min.css?1674944402') }}" rel="stylesheet" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
		<style>
			@import url('https://rsms.me/inter/inter.css');

			:root {
				--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
			}

			body {
				font-feature-settings: "cv03", "cv04", "cv11";
			}
			 .logoo {
				max-width: 200px;
				max-height: 50px;
			}
		</style>
	</head>

	<body>
		<!-- Page wrapper start -->
		<div class="page-wrapper">
			<!-- App header starts -->
			<div class="app-header d-flex align-items-center">

				<!-- Toggle buttons start -->
				<div class="d-flex col">
					<button class="toggle-sidebar" id="toggle-sidebar">
						<i class="bi bi-list lh-1 text-white"></i>
					</button>
					<button class="pin-sidebar" id="pin-sidebar">
						<i class="bi bi-list lh-1 text-white"></i>
					</button>
				</div>
				<!-- Toggle buttons end -->

				<!-- App brand starts -->
				<div class="app-brand py-2 col">
					<a href="index.html">
						<img src="{{ asset('assetss/images/logo1.png')}}" class="logoo" alt="Bootstrap Gallery" />
						{{-- <br><h3 style="color: white; text-align: center">UNIVERSITAS ANNUQAYAH</h3> --}}
					</a>
				</div>
				<!-- App brand ends -->

				<!-- App header actions start -->
				<div class="header-actions col">
					<div class="d-lg-flex d-none align-items-center gap-2">
						<div class="dropdown">
							<a class="dropdown-toggle header-action-icon" href="#!" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								<i class="bi bi-grid fs-5 lh-1 text-white"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-end shadow-lg">
								<!-- Row start -->
								<div class="d-flex gap-2 m-2">
									<a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
										<img src="{{asset('assetss/images/brand-behance.svg')}}" class="img-3x" alt="Admin Themes" />
									</a>
									<a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
										<img src="{{asset('assetss/images/brand-gmail.svg')}}" class="img-3x" alt="Admin Themes" />
									</a>
									<a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
										<img src="{{asset('assetss/images/brand-google.svg')}}" class="img-3x" alt="Admin Themes" />
									</a>
									<a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
										<img src="{{asset('assetss/images/brand-bitcoin.svg')}}" class="img-3x" alt="Admin Themes" />
									</a>
									<a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
										<img src="{{asset('assetss/images/brand-dribbble.svg')}}" class="img-3x" alt="Admin Themes" />
									</a>
								</div>
								<!-- Row end -->
							</div>
						</div>
						<div class="dropdown">
							<a class="dropdown-toggle header-action-icon" href="#!" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								<i class="bi bi-exclamation-triangle fs-5 lh-1 text-white"></i>
								<span class="count-label">7</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end shadow-lg">
								<h5 class="fw-semibold px-3 py-2 text-primary">
									Notifications
								</h5>
								<div class="dropdown-item">
									<div class="d-flex py-2 border-bottom">
										<div class="icon-box md bg-success rounded-circle me-3">
											<i class="bi bi-exclamation-triangle text-white fs-4"></i>
										</div>
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Rosalie Deleon</h6>
											<p class="mb-1 text-secondary">You have new order.</p>
											<p class="small m-0 text-secondary">30 mins ago</p>
										</div>
									</div>
								</div>
								<div class="dropdown-item">
									<div class="d-flex py-2 border-bottom">
										<div class="icon-box md bg-danger rounded-circle me-3">
											<i class="bi bi-exclamation-octagon text-white fs-4"></i>
										</div>
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Donovan Stuart</h6>
											<p class="mb-2">Membership has been expired.</p>
											<p class="small m-0 text-secondary">2 days ago</p>
										</div>
									</div>
								</div>
								<div class="dropdown-item">
									<div class="d-flex py-2">
										<div class="icon-box md bg-warning rounded-circle me-3">
											<i class="bi bi-exclamation-square text-white fs-4"></i>
										</div>
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Roscoe Richards</h6>
											<p class="mb-2">Payment pending. Pay now.</p>
											<p class="small m-0 text-secondary">3 days ago</p>
										</div>
									</div>
								</div>
								<div class="d-grid mx-3 my-1">
									<a href="javascript:void(0)" class="btn btn-info">View all</a>
								</div>
							</div>
						</div>
						<div class="dropdown">
							<a class="dropdown-toggle header-action-icon" href="#!" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								<i class="bi bi-bell fs-5 lh-1 text-white"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-end shadow-lg">
								<h5 class="fw-semibold px-3 py-2 text-primary">Updates</h5>
								<div class="dropdown-item">
									<div class="d-flex py-2 border-bottom">
										<div class="icon-box md border border-success grd-success-light rounded-circle me-3">
											<span class="text-success">DS</span>
										</div>
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Douglass Shaw</h6>
											<p class="mb-1 text-secondary">
												Membership has been ended.
											</p>
											<p class="small m-0 text-secondary">Today, 07:30pm</p>
										</div>
									</div>
								</div>
								<div class="dropdown-item">
									<div class="d-flex py-2 border-bottom">
										<div class="icon-box md border border-danger grd-danger-light rounded-circle me-3">
											<span class="text-danger">WG</span>
										</div>
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Willie Garrison</h6>
											<p class="mb-1 text-secondary">
												Congratulate, James for new job.
											</p>
											<p class="small m-0 text-secondary">Today, 08:00pm</p>
										</div>
									</div>
								</div>
								<div class="dropdown-item">
									<div class="d-flex py-2">
										<div class="icon-box md border border-warning grd-warning-light rounded-circle me-3">
											<span class="text-warning">TJ</span>
										</div>
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Terry Jenkins</h6>
											<p class="mb-1 text-secondary">
												Lewis added new schedule release.
											</p>
											<p class="small m-0 text-secondary">Today, 09:30pm</p>
										</div>
									</div>
								</div>
								<div class="d-grid mx-3 my-1">
									<a href="javascript:void(0)" class="btn btn-info">View all</a>
								</div>
							</div>
						</div>
						<div class="dropdown">
							<a class="dropdown-toggle header-action-icon" href="#!" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								<i class="bi bi-envelope-open fs-5 lh-1 text-white"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-end shadow-lg">
								<h5 class="fw-semibold px-3 py-2 text-primary">Messages</h5>
								<div class="dropdown-item">
									<div class="d-flex py-2 border-bottom">
										<img src="{{ asset('assetss/images/user3.png')}}" class="img-3x me-3 rounded-5" alt="Admin Theme" />
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Angelia Payne</h6>
											<p class="mb-1 text-secondary">
												Membership has been ended.
											</p>
											<p class="small m-0 text-secondary">Today, 07:30pm</p>
										</div>
									</div>
								</div>
								<div class="dropdown-item">
									<div class="d-flex py-2 border-bottom">
										<img src="{{ asset('assetss/images/user1.png')}}" class="img-3x me-3 rounded-5" alt="Admin Theme" />
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Clyde Fowler</h6>
											<p class="mb-1 text-secondary">
												Congratulate, James for new job.
											</p>
											<p class="small m-0 text-secondary">Today, 08:00pm</p>
										</div>
									</div>
								</div>
								<div class="dropdown-item">
									<div class="d-flex py-2">
										<img src="{{ asset('assetss/images/user4.png')}}" class="img-3x me-3 rounded-5" alt="Admin Theme" />
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Sophie Michiels</h6>
											<p class="mb-2 text-secondary">
												Lewis added new schedule release.
											</p>
											<p class="small m-0 text-secondary">Today, 09:30pm</p>
										</div>
									</div>
								</div>
								<div class="d-grid mx-3 my-1">
									<a href="javascript:void(0)" class="btn btn-primary">View all</a>
								</div>
							</div>
						</div>
					</div>
					<div class="dropdown ms-3">
						<a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center text-decoration-none" href="#!"
							role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('uploads/karyawan/' . Auth::user()->foto) }}" class="rounded-2 img-3x" alt="Bootstrap Gallery" />
							<div class="ms-2 text-truncate d-lg-block d-none text-white">
								<span>{{ Auth::user()->name }} </span>
								<span class="d-flex opacity-50 small">{{ ucwords(Auth::user()->getRoleNames()->first()) }}
                                </span>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-end shadow-lg">
							<div class="header-action-links">
								<a class="dropdown-item" href="profile.html"><i
										class="bi bi-person border border-primary text-primary"></i>Profile</a>
								<a class="dropdown-item" href="settings.html"><i
										class="bi bi-gear border border-danger text-danger"></i>Settings</a>
								<a class="dropdown-item" href="widgets.html"><i
										class="bi bi-box border border-success text-success"></i>Widgets</a>
							</div>
							<div class="mx-3 mt-2 d-grid">
								<a href="/proseslogoutadmin" class="btn btn-primary btn-sm">Logout</a>
							</div>
						</div>
					</div>
				</div>
				<!-- App header actions end -->
			</div>

			<!-- App header ends -->

			<!-- Main container start -->
			<div class="main-container">

				<!-- Sidebar wrapper start -->
				<nav id="sidebar" class="sidebar-wrapper">
					<!-- Sidebar profile starts -->
					<div class="sidebar-profile">
						<img src="{{ asset('assetss/images/bahrul.jpg')}}" class="profile-user mb-3" alt="Admin Dashboard" />
						<div class="text-center">
							<h6 class="profile-name m-0 text-nowrap text-truncate">
							{{-- {{ Auth::user()->name }} --}}
							</h6>
						</div>
						<div class="d-flex align-items-center mt-lg-3 gap-2">
							<a href="calendar.html" class="icon-box md grd-success-light rounded-2">
								<i class="bi bi-calendar2-check fs-5 text-success"></i>
							</a>
							<a href="events.html" class="icon-box md grd-info-light rounded-2">
								<i class="bi bi-stickies fs-5 text-info"></i>
							</a>
							<a href="settings.html" class="icon-box md grd-danger-light rounded-2">
								<i class="bi bi-whatsapp fs-5 text-danger"></i>
							</a>
						</div>
					</div>
					<!-- Sidebar profile ends -->
					<div class="sidebarMenuScroll">
						<!-- Sidebar menu starts -->
						<ul class="sidebar-menu">
							<li class="{{ request()->is(['panel/dashboardadmin']) ? 'active' : '' }}">
								<a href="/panel/dashboardadmin">
									<i class="bi bi-pie-chart"></i>
									<span class="menu-text">Dashboard</span>
								</a>
							</li>
							<li class="treeview {{ request()->is(['konfigurasi/jamkerja', 'departemen', 'cabang', 'cuti']) ? 'active' : '' }}">
								<a href="#!">
									<i class="bi bi-stickies"></i>
									<span class="menu-text">Data Master</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a class="{{ request()->is(['konfigurasi/jamkerja']) ? 'active-sub' : '' }}" href="/konfigurasi/jamkerja">Jam Kerja</a>
									</li>
                                {{-- @role('administrator', 'user') --}}
									<li>
										<a class="{{ request()->is(['departemen']) ? 'active-sub' : '' }}" href="/departemen">Departemen</a>
									</li>
									<li>
										<a class="{{ request()->is(['cabang']) ? 'active-sub' : '' }}" href="/cabang">Kantor Cabang</a>
									</li>
									<li>
										<a class="{{ request()->is(['cuti']) ? 'active-sub' : '' }}" href="/cuti">Cuti</a>
									</li>
                                {{-- @endrole --}}
								</ul>
							</li>
							<li class="{{ request()->is('presensi/monitoring') ? 'active current-page' : '' }}">
								<a href="/presensi/monitoring">
									<i class="bi bi-calendar4"></i>
									<span class="menu-text">Monitoring Presensi</span>
								</a>
							</li>
							<li class="{{ request()->is('presensi/izinsakit') ? 'active' : '' }}">
								<a href="/presensi/izinsakit">
									<i class="bi bi-check-circle"></i>
									<span class="menu-text">Data Izin / Sakit</span>
								</a>
							</li>
							<li class="treeview {{ request()->is(['presensi/laporan', 'presensi/rekap']) ? 'active' : '' }}">
								<a href="#!">
									<i class="bi bi-code-square"></i>
									<span class="menu-text">Laporan</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a class="{{ request()->is(['presensi/laporan']) ? 'active-sub' : '' }}"  href="/presensi/laporan">Presensi</a>
									</li>
									<li>
										<a class="{{ request()->is(['presensi/rekap']) ? 'active-sub' : '' }}" href="/presensi/rekap">Rekap Presensi</a>
									</li>
								</ul>
							</li>
							{{-- @role('administrator', 'user') --}}
							<li class="treeview {{ request()->is(['karyawan', 'departemen', 'konfigurasi/users']) ? 'active' : '' }}">
								<a href="#!">
									<i class="bi bi-pie-chart"></i>
									<span class="menu-text">Configurasi</span>
								</a>
								<ul class="treeview-menu">
									<li >
										{{-- @role('administrator|admin departemen', 'user') --}}
										<a href="/karyawan" class="{{ request()->is(['karyawan']) ? 'active-sub' : '' }}">Karyawan</a>
                                        {{-- @endrole --}}
									</li>
									<li>
										<a class="{{ request()->is(['konfigurasi/users']) ? 'active-sub' : '' }}" href="/konfigurasi/users">Users</a>
									</li>
								</ul>
							</li>
							{{-- @endrole --}}
						</ul>
					</div>
					<!-- Sidebar menu ends -->

				</nav>
				<!-- Sidebar wrapper end -->
				<!-- App container starts -->
				<div class="app-container">

					<!-- App hero header starts -->
					<div class="app-hero-header mb-4">

						<!-- Breadcrumb and Stats start -->
						<div class="d-flex align-items-center mb-3">

							<!-- Breadcrumb start -->
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<i class="bi bi-house lh-1"></i>
									<a href="index.html" class="text-decoration-none">Home</a>
								</li>
								<li class="breadcrumb-item" aria-current="page">Dashboard</li>
							</ol>
							<!-- Breadcrumb end -->

							<!-- Sales stats start -->
							<div class="ms-auto d-lg-flex d-none flex-row">
								<div class="d-flex flex-row gap-1">
									<button class="btn btn-sm btn-dark">Today</button>
									<button class="btn btn-sm btn-dark btn-transparent">
										7 Days
									</button>
									<button class="btn btn-sm btn-dark btn-transparent">
										15 Days
									</button>
									<button class="btn btn-sm btn-dark btn-transparent">
										30 Days
									</button>
									<button class="btn btn-sm btn-dark btn-transparent">
										90 Days
									</button>
								</div>
							</div>
							<!-- Sales stats end -->
						</div>
						<!-- Breadcrumb and stats end -->

						<!-- Row start -->
                        @yield('dashboard')
						<!-- Row end -->
					</div>
					<!-- App Hero header ends -->
					<!-- App body starts -->
					<div class="app-body">
						<!-- Row start -->

						<!-- Row end -->

						<!-- Row start -->
                        @yield('content')
					</div>
					<!-- App body ends -->

					<!-- App footer start -->
					<div class="app-footer">
						<span>© Bahrul Ulum 2024</span>
					</div>
					<!-- App footer end -->

				</div>
				<!-- App container ends -->
			</div>
			<!-- Main container end -->

		</div>
    <!-- Libs JS -->
    <script src="{{ asset('tabler/dist/libs/apexcharts/dist/apexcharts.min.js?1674944402') }}" defer></script>
    <script src="{{ asset('tabler/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1674944402') }}" defer></script>
    <script src="{{ asset('tabler/dist/libs/jsvectormap/dist/maps/world.js?1674944402') }}" defer></script>
    <script src="{{ asset('tabler/dist/libs/jsvectormap/dist/maps/world-merc.js?1674944402') }}" defer></script>

    <!-- Tabler Core -->
    <script src="{{ asset('js/jquery.min.js') }}" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script src="{{ asset('tabler/dist/js/tabler.min.js?1674944402') }}" defer></script>
    <script src="{{ asset('tabler/dist/js/demo.min.js?1674944402') }}" defer></script>
    <script src="{{ asset('assets/js/lib/sweetalert.js') }}"></script>
    <script src="{{ asset('assets/js/lib/jquery.mask.min.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    @stack('myscript')

		<!-- Required jQuery first, then Bootstrap Bundle JS -->
        <script src="{{ asset('assets/js/lib/sweetalert.js') }}"></script>
		{{-- <script src="{{ asset('assetss/js/jquery.min.js')}}"></script> --}}
		{{-- <script src="{{ asset('assetss/js/bootstrap.bundle.min.js')}}"></script> --}}
		<!-- Overlay Scroll JS -->
		<script src="{{ asset('assetss/vendor/overlay-scroll/jquery.overlayScrollbars.min.js')}}"></script>
		<script src="{{ asset('assetss/vendor/overlay-scroll/custom-scrollbar.js')}}"></script>
		<!-- Custom JS files -->
		<script src="{{ asset('assetss/js/custom.js')}}"></script>


	</body>


</html>
