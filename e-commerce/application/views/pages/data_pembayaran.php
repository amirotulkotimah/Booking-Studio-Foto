
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
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Data Pembayaran <?= $lihat['nama_usaha'] ?></h1>
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
							<!--begin::Search-->
							<div class="d-flex align-items-center position-relative my-1 fw-semibold fs-6">
								<div class="text-muted">
								</div>
								<form action="<?php echo site_url('penjualan_c/search/');?>" method="get">
								<!--end::Svg Icon-->
								<input type="text" class="form-control form-control-solid w-200px ps-10" placeholder="Search" name="order_id"/>
								<input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha;?>">
								</form>
							</div>
						</div>
					<div class="d-flex align-items-center gap-2 gap-lg-3">
					<!--begin::Filter menu-->
					<div class="m-0">
						<!--begin::Menu toggle-->
						<a href="#" class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
							<!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
							<span class="svg-icon svg-icon-6 svg-icon-muted me-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->Filter</a>
							<!--end::Menu toggle-->
							<!--begin::Menu 1-->
							<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_63d12d561698e">
								<!--begin::Menu separator-->
								<div class="separator border-gray-200"></div>
									<!--end::Menu separator-->
									<!--begin::Form-->
									<div class="px-7 py-5">
										<div class="modal-body">
											<form action="<?php echo site_url('penjualan_c/filter_payment/'. '?id_nama_usaha=' . $id_nama_usaha);?>" method="get" >
												<input type="hidden" name="id_nama_usaha" value="<?php echo $id_nama_usaha;?>">
												<label for="" class="form-label fw-bold">Payment Method </label>
												<div class="row pt-2">
													<div class="mb-10">
														<select name="payment_method" class="form-control">
														<option >--pilih--</option>
				                            			<option value="2">Tunai</option>
				                            			<option value="0">Non tunai => Midtrans</option>
				                            			<option value="1">Non tunai => QRIS</option>
		                            				</select>
													</div>
												<div class="d-flex justify-content-end">
													<button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
													<button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Cari</button>
												</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!--end::Filter menu-->
						</div>
					
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
									<!-- <th class="text-end min-w-100px text-center fs-7">Type Pembayaran</th> -->
									<th class="text-end min-w-100px text-center fs-7">Bank</th>
									<th class="text-end min-w-100px text-center fs-7">Payment Method</th>
									<th class="text-end min-w-100px text-center fs-7">Waktu Pembayaran</th>
									<th class="text-end min-w-100px text-center fs-7">Status</th>
									<!-- <th class="text-end min-w-10px fs-7">Actions</th> -->
								</tr>
								</thead>
								<?php foreach ($pay->result() as $baris) { ?>
									<tbody class="fw-semibold text-gray-600">
										<tr>
											<td>
												<div class="form-check form-check-sm form-check-custom form-check-solid">
													<input class="form-check-input" type="checkbox" name="id_payment[]" value='<?php echo $baris->id_payment; ?>'/>
												</div>
											</td>
											<td class="text-end pe-0 text-center">#<?php echo strtoupper($baris->order_id);?></td>
											<td class="text-end pe-0 text-center"><?php echo $baris->nama;?></td>
											<td class="text-end pe-0 text-center"><?php echo number_format("$baris->gross_amount", 2, ",", ".");?></td>
											<!-- <td class="text-end pe-0 text-center"><?php echo $baris->payment_type;?></td> -->
											<td class="text-end pe-0 text-center">
												<?php if ($baris->payment_method == '0') : ?> 
												<?php echo strtoupper($baris->bank);?> => Midtrans
	                                            <?php elseif ($baris->payment_method == '1') : ?>
												<?php echo strtoupper($baris->bank);?> => QRIS
	                                        	<?php elseif ($baris->payment_method == '2') : ?>
	                                            -
	                                            <?php endif ?></td>
											<td class="text-end pe-0 text-center">
												<?php if ($baris->payment_method == '0') : ?>
                                                Non Tunai
	                                            <?php elseif ($baris->payment_method == '1') : ?>
	                                            Non Tunai
	                                        	<?php elseif ($baris->payment_method == '2') : ?>
	                                            Tunai
	                                            <?php endif ?>
											</td>
											<td class="text-end pe-0 text-center"><?php echo date('d-m-Y', strtotime($baris->transaction_time));?></td>
											<td class="text-end pe-0 text-center">
												<?php if ($baris->status_code == '200') : ?>
                                                <div class="badge badge-light-primary fs-7">Lunas</div></a>
	                                            <?php elseif ($baris->status_code == '201') : ?>
	                                                <div class="badge badge-light-warning fs-7">Belum Terbayar</div>
	                                            <?php elseif ($baris->status_code == 'refund') : ?>
	                                                <div class="badge badge-light-danger fs-7">Refund</div>
	                                                <br>
	                                                <br>
	                                                <?php if ($baris->status_refund == '0') : ?>
	                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
												<span class="svg-icon svg-icon-5 m-0">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon--></a>
												<!--begin::Menu-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="<?php echo site_url('penjualan_c/update_status_refund/'. '?kode_order='. $baris->order_id. '&id_nama_usaha='. $id_nama_usaha.'&status_refund='. 1) ?>" class="menu-link px-3" >Pay</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="<?php echo site_url('penjualan_c/update_status_refund/'. '?kode_order='. $baris->order_id. '&id_nama_usaha='. $id_nama_usaha. '&status_refund='. 2) ?>" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row" >Unpay</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu-->
												 <?php elseif ($baris->status_refund == '1') : ?>
												 	<a href="<?php echo site_url('penjualan_c/update_status_refund/'. '?kode_order='. $baris->order_id. '&id_nama_usaha='. $id_nama_usaha.'&status_refund='. 0) ?>" class="menu-link px-3" >
												 	<div class="badge badge-light-danger fs-7">Paid</div></a>
												 <?php elseif ($baris->status_refund == '2') : ?>
												 	<a href="<?php echo site_url('penjualan_c/update_status_refund/'. '?kode_order='. $baris->order_id. '&id_nama_usaha='. $id_nama_usaha.'&status_refund='. 0) ?>" class="menu-link px-3" >
												 	<div class="badge badge-light-danger fs-7">Unpaid</div></a>
	                                            <?php endif ?>
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
								</form>
								<div id="kt_app_toolbar" >
									<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
										<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3"></div>
										<div class="d-flex align-items-center ">
											<?php echo $pagination; ?>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

<!--<?php foreach($user as $baris): ?>
<form class="user" action="<?php echo site_url('penjualan_c/hapus_data/'. $baris->kode_order . '?id_nama_usaha=' .$id_nama_usaha);?>" method="post" enctype="multipart/form-data">
	<div class="modal fade" tabindex="-1" id="delete<?php echo $baris->kode_order; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-body table text-center">
                <div class="row">
                	<i class="fas fa-exclamation-circle text-warning fs-5x pt-5"></i>
                        <div class="pt-5">
                        	<input type="hidden" value="<?php echo $baris->kode_order;?>" name="kode_order">
                        	<input type="hidden" name="id_nama_usaha" value="<?php echo $id_nama_usaha;?>">
                        	<div class="modal-body"><p>Apakah Anda yakin ingin menghapus data ini?</p></div>
                        	<div class="text-center m-t-15">
                        		<button type="submit" class="btn fw-bold btn-danger">Hapus</button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
    </div>
</div>
</form>
<?php endforeach;?>-->