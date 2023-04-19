<body id="kt_app_body"  class="app-default">
	<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
	<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
		<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
			<div id="kt_app_header" class="app-header">
					<!--begin::Header container-->
					<div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
						<!--begin::Sidebar mobile toggle-->
						<div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
							<div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
								<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
								<span class="svg-icon svg-icon-2 svg-icon-md-1">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
										<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</div>
						</div>
						<!--end::Sidebar mobile toggle-->
						
						<!--begin::Header wrapper-->
						<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
							<!--begin::Menu wrapper-->
							<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
								<!--begin::Menu-->
								<!--<div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
									<div class="menu-item">
										<a class="menu-link" href="<?php echo site_url('home_studio_c');?>">
											
											<span class="menu-title">Dashboard</span>
										</a>
									</div>
									<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
										<span class="menu-link">
											<span class="menu-title">Paket</span>
											<span class="menu-arrow d-lg-none"></span>
										</span>
										<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">

										<?php
										foreach ($role_paket as $item)
											{?>
											<div class="menu-item">
												<a class="menu-link" href="<?php echo site_url('booking_c/data_paket/'.'?id_produk=' . $item->id_produk.'?&&id_nama_usaha=' . $item->id_nama_usaha);?>"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
													<span class="menu-title"><?= $item->nama_produk ?></span>
												</a>
											</div>
											<?php } ?>
										</div>
										
									</div>
									<div class="menu-item">
										<a class="menu-link" href="<?php echo site_url('booking_c');?>">
											
											<span class="menu-title">Booking</span>
										</a>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="<?php echo site_url('booking_c/riwayat_booking');?>">
											
											<span class="menu-title">Riwayat</span>
										</a>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="<?php echo site_url('booking_c/hubungi');?>">
											
											<span class="menu-title">Hubungi Kami</span>
										</a>
									</div>
								</div>-->
								<!--end::Menu-->
							</div>
							<!--end::Menu wrapper-->
							<!--begin::Navbar-->
							<div class="app-navbar flex-shrink-0">

								
								<!--begin::Theme mode-->
								<div class="app-navbar-item ms-1 ms-md-3">
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link" href="<?php echo site_url('home_studio_c');?>">
											
											<span class="menu-title fs-6 fw-semibold text-dark">Home</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--begin::Menu toggle-->
									<a href="#" class="btn btn-icon btn-custom btn-icon-muted  w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
										<span class="menu-title">Paket</span>
									</a>
									<!--begin::Menu toggle-->
									<!--begin::Menu-->
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-muted menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
										<?php
										foreach ($role_paket as $item)
											{?>
										<!--begin::Menu item-->
										<div class="menu-item px-3 my-0">
											<a href="<?php echo site_url('booking_c/data_paket/'.'?id_produk=' . $item->id_produk.'?&&id_nama_usaha=' . $item->id_nama_usaha);?>" class="menu-link px-3 py-2" >
												<span class="menu-title"><?= $item->nama_produk ?></span>
											</a>
										</div>
										<!--end::Menu item-->
										<?php } ?>
									</div>
									<!--end::Menu-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link" href="<?php echo site_url('booking_c/jadwal_booking');?>">
											
											<span class="menu-title text-dark fs-6 fw-semibold">Booking</span>
										</a>
										<!--end:Menu link-->
									</div>
								</div>
								<!--end::Theme mode-->

							</div>
							<!--end::Navbar-->
						</div>
						<!--end::Header wrapper-->
					</div>
					<!--end::Header container-->
				</div>
				<!--end::Header-->
				
				