
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
	<!--begin::Content wrapper-->
	<div class="d-flex flex-column flex-column-fluid">
		<!--begin::Toolbar-->
		<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
			<!--begin::Toolbar container-->
			<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
				<!--begin::Page title-->
				<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
					<!--begin::Title-->
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Data Pembayaran Tunai <?= $lihat['nama_usaha'] ?></h1>
					<!--end::Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">
							<a href="<?php echo site_url('home_c');?>" class="text-muted text-hover-primary">Home</a>
						</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">Data Pembayaran <?= $lihat['nama_usaha'] ?></li>
						<!--end::Item-->
					</ul>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Page title-->
			</div>
			<!--end::Toolbar container-->
		</div>
		<!--end::Toolbar-->
		<!--begin::Content-->
		<div id="kt_app_content" class="app-content flex-column-fluid">
			<!--begin::Content container-->
			<div id="kt_app_content_container" class="app-container container-xxl">
				<!--begin::Category-->
				<div class="card card-flush">
					<div class="card-header align-items-center py-5 gap-2 gap-md-5">
						<div class="card-title">
						</div>
					<!--<a href="<?php echo site_url('produk_c/tambah_data/'. '?id_nama_usaha=' . $id_nama_usaha);?>" class="btn btn-primary btn-sm">Tambah Data</a>-->
					
				</div>
				<!--begin::Card body-->
				<div class="card-body pt-0">
					<form method="post" action="<?php echo site_url('penjualan_c/delete_pembayaran/'. '?id_nama_usaha=' . $id_nama_usaha);?>">
						<table class="table align-middle table-row-dashed fs-6 gy-5" id="table" >
							<thead>
								<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
									<th class="w-10px pe-2">
										<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
											<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#table .form-check-input"  />
										</div>
									</th>
									<th class="text-end min-w-100px text-center fs-7">Kode Order</th>
									<th class="text-end min-w-100px text-center fs-7">Nama</th>
									<th class="text-end min-w-100px text-center fs-7">Total Bayar</th>
									<th class="text-end min-w-100px text-center fs-7">Waktu Pembayaran</th>
									<th class="text-end min-w-100px text-center fs-7">Status</th>
								</tr>
								</thead>
								<?php foreach ($user as $baris) { ?>
									<tbody class="fw-semibold text-gray-600">
										<tr>
											<td>
												<div class="form-check form-check-sm form-check-custom form-check-solid">
													<input class="form-check-input" type="checkbox" name="order_id[]" value='<?php echo $baris->order_id; ?>'/>
												</div>
											</td>
											<td class="text-end pe-0 text-center">#<?php echo strtoupper($baris->id_bayar);?></td>
											<td class="text-end pe-0 text-center"><?php echo $baris->nama_pay;?></td>
											<td class="text-end pe-0 text-center"><?php echo number_format("$baris->jumlah_bayar", 2, ",", ".");?></td>
											<td class="text-end pe-0 text-center"><?php echo date_format($created_at,'d-m-Y');?></td>
											<td class="text-end pe-0 text-center">
												<?php if ($baris->type_bayar == '2') : ?>
                                                <div class="badge badge-light-danger fs-7">Lunas</div>
	                                            <?php endif ?>
											</td>
											<!-- <td class="text-end pe-0 text-center"><a href="<?php echo site_url('pdf_c/'. '?kode_order='. $baris->order_id. '&gross_amount='. $baris->gross_amount);?>" class="btn btn-warning btn-sm fs-9" >Download</a></td> -->
												<!--end::Type=-->
										</tr>
										</tbody>
										<?php  } ?>
										<tfoot class="fw-semibold text-gray-600">
											<tr>
												<th>
													<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
														<span class="svg-icon svg-icon-5 m-0">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
															</svg>
														</span>
													</a>
													<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
														<div class="menu-item px-3">
															<button type="submit" class="btn btn-sm" type="button">Delete</button>
														</div>
													</div>
												</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>

