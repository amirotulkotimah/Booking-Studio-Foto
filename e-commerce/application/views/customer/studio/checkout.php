<!--begin::Content-->
              <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-fluid">
                  <!--begin::Row-->
                  <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <!--begin::Col-->
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10 ">
                      <!--begin::Card widget 7-->
                      <div class="card card-flush overflow-hidden h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-4">
                          <div class="card-title">
                            <h1 class="page-heading d-flex text-dark fw-bold fs-1 flex-column justify-content-center my-0">Data Pembayaran</h1>

                            <!--begin::Alert-->
                          </div>
                          <br>
                          <div class="pt-4">
                          <form class="user" action="<?php echo site_url('cetak_pdf_c');?>" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="kode_order" value="<?=$order_id;?>" >
                              <input type="hidden" name="gross_amount" value="<?=$gross_amount;?>">
                                <button type="submit" class="btn btn-primary btn-sm">Cetak PDF</button> 
                          </div>
                          </div>
                          
                        <div class="card-body pt-3">
                          <div class="mb-10 fv-row">

                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Kode Booking :</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted">#<?php echo strtoupper($order_id);?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Nama :</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$nama;?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Paket :</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$user['nama_produk'];?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Tanggal Booking :</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?php echo date_format($created_at,'d-m-Y');?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Waktu Booking :</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$user['waktu_booking'];?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Total Bayar :</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted">Rp <?php echo number_format("$gross_amount", 2, ",", ".");?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Bank :</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$bank;?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>VA Number :</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$va_number;?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Tanggal Transaksi :</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$transaction_time;?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Status :</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <?php if ($status_code == '200') : ?>
                                    <span class="fs-5 fw-semibold form-label mt-3 text-muted">Lunas</span>
                                  <?php endif ?>
                                  
                                </div>
                              </div>
                            </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    <!--end::Col-->