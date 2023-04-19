
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
.carousel{
    background: #2f4357;
    margin-top: 20px;
}
.carousel .item{
    min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
}
.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
    max-height: 280px;
    width:100%;
}
.bs-example{
    margin: 20px;
}
</style>

<div id="kt_app_content" class="app-content flex-column-fluid">
	<div id="kt_app_content_container" class="app-container container-xxl">
		<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
			<div class="col-xxl-6">
				<div class="card card-flush h-md-100">
					<div class="card-body py-9">
						<div class="row gx-9 h-100">
							<div class="col-sm-6 mb-10 mb-sm-0">
								<div class="bs-example">
									<div class='col-md-6'>
									    <div id="myCarousel" class="carousel slide" data-ride="carousel">
									        <!-- Carousel indicators -->
									        <ol class="carousel-indicators">
									            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
									            <li data-target="#myCarousel" data-slide-to="1"></li>
									            <li data-target="#myCarousel" data-slide-to="2"></li>
									        </ol>   
									        <!-- Wrapper for carousel items -->
									        
									        <div class="carousel-inner">
									            <div class="item active">
									                <img src="<?php echo base_url('assets/media/logos/logo2.png');?>" alt="">
									            </div>
									            <?php foreach ($foto as $baris) { ?>
									            <div class="item">
									                <img src="<?php echo base_url('assets/upload/foto_produk/') . $baris->foto_produk; ?>" alt="">
									            </div>

									    		<?php  } ?>
									        </div>
									        <!-- Carousel controls -->
									        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
									            <span class="glyphicon glyphicon-chevron-left"></span>
									        </a>
									        <a class="carousel-control right" href="#myCarousel" data-slide="next">
									            <span class="glyphicon glyphicon-chevron-right"></span>
									        </a>
									    </div>
									</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="d-flex flex-column h-100">
									<form class="user" action="<?php echo site_url('booking_c/jadwal_paket_booking/'. '?id_produk=' . $id_produk. '?&&id_nama_usaha=' . $id_nama_usaha);?>" method="get" enctype="multipart/form-data">

										<input type="hidden" name="id_nama_usaha" value="1">
                                		<input type="hidden" name="id_produk" value="<?=$user['id_produk'];?>">
										
										<div class="mb-7">
											<div class="d-flex flex-stack mb-6">
												<div class="flex-shrink-0 me-5">
													<span class="text-gray-800 fs-1 fw-bold">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDetail Paket</span>
												</div>
											</div>
											<div class="row fv-row mb-7 pt-4">
												<div class="col-md-3 text-md-end">
													<label class="fs-5 fw-semibold form-label mt-3 ">
														<span>Nama Paket :</span>
													</label>
												</div>
												<div class="col-md-9 pt-3">
													<span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$user['nama_produk'];?></span>
												</div>
											</div>
											<div class="row fv-row mb-7">
												<div class="col-md-3 text-md-end">
													<label class="fs-5 fw-semibold form-label mt-3 ">
														<span>Harga Paket :</span>
													</label>
												</div>
												<div class="col-md-9 pt-3">
													<span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$user['harga'];?></span>
												</div>
											</div>
											<div class="row fv-row mb-7">
												<div class="col-md-3 text-md-end">
													<label class="fs-5 fw-semibold form-label mt-3 ">
														<span>Jumlah Orang :</span>
													</label>
												</div>
												<div class="col-md-9 pt-3">
													<span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$user['jumlah_orang'];?></span>
												</div>
											</div>
											<div class="row fv-row mb-7">
												<div class="col-md-3 text-md-end">
													<label class="fs-5 fw-semibold form-label mt-3">
														<span>Deskripsi :</span>
													</label>
												</div>
												<div class="col-md-9 pt-3">
                                				<span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$user['deskripsi'];?></span>
                                			</div>
											</div>
										</div>
										<div class="card-footer d-flex justify-content-end py-6 px-9 pt-10">
			                              <button type="submit" class="btn btn-primary ">Pilih Paket</button>
			                            </div>
			                            </form>
									</div>
								</div>
							</div>
						</div>
					</div>