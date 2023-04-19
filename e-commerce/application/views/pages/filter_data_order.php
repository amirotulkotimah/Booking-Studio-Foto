
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
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Data Booking <?= $lihat['nama_usaha'] ?></h1>
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
						<li class="breadcrumb-item text-muted">Data Order <?= $lihat['nama_usaha'] ?></li>
						<!--end::Item-->
					</ul>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Page title-->
				<!--begin::Actions-->
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
											<form action="<?php echo site_url('penjualan_c/filter_tanggal/'. '?id_nama_usaha=' . $id_nama_usaha);?>" method="get" >
												<input type="hidden" name="id_nama_usaha" value="<?php echo $id_nama_usaha;?>">
												<label for="" class="form-label fw-bold">Filter Tanggal </label>
												<div class="row pt-2">
														<div class="mb-10">
															<label for="inputMulaiTanggal" class="form-label fw-semibold">Tanggal :</label>
															<input type="date" id="" name="tanggal" class="form-control" required>
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
							<span class="fs-5">Tanggal <?php echo date_format($created_at,'d-m-Y');?></span>
							<div class="d-flex align-items-center position-relative my-1 fw-semibold fs-6">
								<div class="text-muted">
								</div>
							</div>
						</div>
						
					<!--begin::Card body-->
					<div class="card-body pt-0">
						
							<table class="table align-middle table-row-dashed fs-6 gy-5" id="table" >
								<!--begin::Table head-->
								<thead>
									<!--begin::Table row-->
									<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
										<!-- <th class="w-10px pe-2">
											<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
												<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#table .form-check-input"  />
											</div>
										</th> -->
										<?php if ($id_nama_usaha == 1) : ?>
										<th class="text-end min-w-100px text-center fs-7">Kode Booking</th>
										<?php endif;?>
										<?php if ($id_nama_usaha >= 2) : ?>
										<th class="text-end min-w-100px text-center fs-7">ID</th>
										<?php endif;?>
										<th class="text-end min-w-100px text-center fs-7">Nama Customer</th>
										<th class="text-end min-w-100px text-center fs-7">Paket</th>
										<!-- <th class="text-end min-w-100px text-center fs-7">Tanggal</th> -->
										<?php if ($id_nama_usaha == 1) : ?>
										<th class="text-end min-w-100px text-center fs-7">Waktu Booking</th>
										<th class="text-end min-w-100px text-center fs-7">Tambahan Orang</th>
										<?php endif; ?>
										<?php if ($id_nama_usaha >= 2) : ?>
										<th class="text-end min-w-100px text-center fs-7">Jumlah Item</th>
										<?php endif;?>
										<th class="text-end min-w-100px text-center fs-7">
											Status
										</th>
										<th class="w-10px pe-2 text-center">Cetak Pembayaran</th>
										<th class="w-10px pe-2 text-center">Action</th>
										<!-- <th class="text-end min-w-100px text-center fs-7">Status</th> -->
									</tr>
									<!--end::Table row-->
								</thead>
								<!--end::Table head-->
								<!--begin::Table body-->
								<?php 
								//$no = 1; //no default 1
								foreach ($order->result() as $baris) { //
								?>
								<tbody class="fw-semibold text-gray-600">
									<!--begin::Table row-->
									<tr>
										<!--begin::Checkbox-->
										<!-- <td>
											<form method="post" action="<?php echo site_url('penjualan_c/delete_filter/'. '?id_nama_usaha=' . $id_nama_usaha. '&tanggal=' . $tanggal);?>">
											<div class="form-check form-check-sm form-check-custom form-check-solid">
												<input class="form-check-input" type="checkbox" name="kode_order[]" value='<?php echo $baris->kode_order; ?>'/>
											</div>
											</form>
										</td> -->							
										<td class="text-end pe-0 text-center"><a href="<?php echo site_url('penjualan_c/lihat_data_order/'.'?kode_order='.$baris->kode_order . '&id_nama_usaha=' . $id_nama_usaha);?>">#<?php echo strtoupper($baris->kode_order);?></a></td>
										<td class="text-end pe-0 text-center"><?php echo $baris->nama_customer;?></td>
										<td class="text-end pe-0 text-center"><?php echo $baris->nama_produk;?></td>
										<!-- <td class="text-end pe-0 text-center"><?php echo $baris->tanggal_order;?></td> -->
										<?php if ($id_nama_usaha == 1) : ?>
										<td class="text-end pe-0 text-center"><?php echo $baris->waktu_booking;?></td>
										<td class="text-end pe-0 text-center"><?php echo $baris->tambahan_orang;?></td>
										<?php endif;?>
										<td class="text-end pe-0 text-center">
											<?php if ($id_nama_usaha == 1 && $baris->status_order == 'selesai') : ?>
												<form method="post" action="<?php echo site_url('penjualan_c/change_filter/');?>">
													<input type="hidden" name="kode_order" value="<?=$baris->kode_order;?>">
													<input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha;?>">
													<input type="hidden" name="tanggal" value="<?=$tanggal?>">

													<button type="submit" class="btn badge badge-light-primary fs-7">Selesai</button>
												</form>
											<?php elseif ($id_nama_usaha == 1 && $baris->status_order == 'cancel') : ?>
												<a href="<?= site_url('penjualan_c/change_filter_cancel/' . $baris->kode_order. '?id_nama_usaha=' . $id_nama_usaha. '&tanggal=' . $tanggal) ?>" class="menu-link px-3">
													<div class="badge badge-light-danger fs-7">Cancel</div>
												</a> 
											<?php elseif ($id_nama_usaha == 1 && $baris->status_order == '') : ?>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
												<div class="menu-item px-3">

				                                </div>
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
												<span class="svg-icon svg-icon-5 m-0">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon--></a>
											<?php endif ?>
											
												<!--begin::Menu-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
													<form method="post" action="<?php echo site_url('penjualan_c/forward_filter/');?>">
														<input type="hidden" name="kode_order" value="<?=$baris->kode_order;?>">
														<input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha;?>">
														<input type="hidden" name="nama" value="<?=$baris->nama_customer;?>" >
														<input type="hidden" name="no_hp" value="<?=$baris->no_hp;?>">
														<input type="hidden" name="email" value="<?=$baris->email;?>">
														<input type="hidden" name="bank" value="<?=$baris->name_bank;?>">
														<input type="hidden" name="pembayaran" value="<?=$baris->pembayaran;?>">
														<input type="hidden" name="tanggal_bayar" value="<?php echo date('Y-m-d');?>">
														<input type="hidden" name="tanggal" value="<?=$tanggal;?>">

													<div class="menu-item px-3">
						                                <?php if ($id_nama_usaha == 1 && $baris->status_order == '') : ?>
						                                <button type="submit" class="menu-link px-3">
						                                Selesai
						                            </button>   
						                            <?php endif ?>
													</div>
													</form>

				                                   	<div class="menu-item px-3">
				                                        <?php if ($id_nama_usaha == 1 && $baris->status_order == '') : ?>
				                                            <a href="<?= site_url('penjualan_c/forward_filter_cancel/' . $baris->kode_order. '?id_nama_usaha=' . $id_nama_usaha. '&tanggal=' . $tanggal) ?>"><button type="button"  class="menu-link px-3">
				                                            	Cancel
				                                            </button>
															</a> 
				                                        <?php endif ?>
				                                    </div>
													<!--end::Menu item-->
												</div>
										<!-- <?php if ($id_nama_usaha == 1 && $baris->status_order == 'selesai') : ?>
											<a href="<?= site_url('penjualan_c/change_filter/' . $baris->kode_order. '?id_nama_usaha=' . $id_nama_usaha. '&tanggal=' . $tanggal) ?>">
											<img src="<?php echo base_url('assets/media/logos/checkmark-16.png');?>"  /></a>
                                        <?php elseif ($id_nama_usaha == 1 && $baris->status_order == '') : ?>
                                            <a href="<?= site_url('penjualan_c/forward_filter/'. $baris->kode_order.'?id_nama_usaha=' . $id_nama_usaha. '&tanggal=' . $tanggal) ?>">
                                            	<div class="form-check form-check-sm form-check-custom form-check-solid me-3">&nbsp&nbsp&nbsp&nbsp&nbsp
                                            		<button type="button" class="form-check-input" type="checkbox"></button>
												</div>
											</a>
                                        <?php endif ?> -->
                                    	</td>
                                    	<td class="text-end pe-0 text-center">
                                    		<?php if ($id_nama_usaha == 1 && $baris->status_order == 'selesai') : ?>
                                    			<a href="<?php echo site_url('pdf_c/'. '?kode_order='. $baris->kode_order);?>" class="btn btn-warning btn-sm fs-9" >Download</a>
                                    		<?php endif?>
		                                </td>
		                                <td class="text-end pe-0 text-center">
		                                	<a href="#" data-bs-toggle="modal" data-bs-target="#delete<?php echo $baris->kode_order; ?>">
		                                		<img src="<?php echo base_url('assets/media/logos/delete.jpg');?>" class="w-15px">
		                                	</a>
		                                </td>

										<?php if ($id_nama_usaha >= 2) : ?>
										<td class="text-end pe-0 text-center"><?php echo $baris->total_barang;?></td>
										<?php endif;?>
										<?php if ($id_nama_usaha >= 2) : ?>
										<td class="text-end pe-0 text-center"><?php echo number_format("$baris->total_harga", 2, ",", ".");?></td>
										<td class="text-end pe-0 text-center"><?php echo $baris->status_order;?></td>
										<?php endif ?>
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

<?php foreach($user as $baris): ?>
<form class="user" action="<?php echo site_url('penjualan_c/delete/'.'?id_nama_usaha=' . $id_nama_usaha);?>" method="post" enctype="multipart/form-data">
	<div class="modal fade" tabindex="-1" id="delete<?php echo $baris->kode_order; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body table text-center">
            	<span class="svg-icon ">
                <div class="swal2-icon swal2-warning swal2-icon-show " style="display: flex;"><div class="swal2-icon-content">!</div></div>
                </span>
                <div class="row">
                        <div class="pt-5">
                        	<input type="hidden" value="<?php echo $baris->kode_order;?>" name="kode_order">
                        	<div class="modal-body"><p>Apakah Anda yakin ingin menghapus data ini?</p></div>
                        	<div class="text-center m-t-15">
                        		<button type="submit" class="btn fw-bold btn-danger">Hapus</button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="modal-footer">-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>
</form>
<?php endforeach;
    ?>


