<!--begin::Main-->
          <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">
              <!--begin::Toolbar-->
              <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                  <!--begin::Page title-->
                  <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Order #<?php echo strtoupper($kode_order);?></h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                      <!--begin::Item-->
                      <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                      </li>
                      <!--end::Item-->
                      <!--begin::Item-->
                      <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                      </li>
                      <!--end::Item-->
                      <!--begin::Item-->
                      <li class="breadcrumb-item text-muted">Data Order</li>
                      <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                  </div>
                  <!--end::Page title-->
                  <!--begin::Actions-->
                  <div class="d-flex align-items-center gap-2 gap-lg-3">
                  </div>
                  <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
              </div>
              <!--end::Toolbar-->
              <!--begin::Content-->
              <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-fluid">
                  <!--begin::Row-->
                  <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <!--begin::Col-->
                      
                  </div>
                  <!--end::Row-->

                  <div class="row gy-5 g-xl-10 mb-xl-10">
                      <div class="col-xl-6">
                        <!--begin::Chart Widget 35-->
                      <div class="card card-flush">
                        <!--begin::Header-->
                        <div class="card-header pt-5 mb-6">
                          <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Data Pelanggan</span>
                          </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-0 px-0">
                          
                          <!--begin::Tab Content-->
                          <div class="tab-content mt-n6">
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade active show" id="kt_charts_widget_35_tab_content_1">
                              <!--begin::Chart-->
                              <div id="" data-kt-chart-color="primary" class=""></div>
                              <!--end::Chart-->
                              <div class="table-responsive">
                              <table class="table table-rounded table-striped border gy-4 gs-4">
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Nama</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?=$user['nama_customer'];?></td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Email</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?=$user['email'];?></td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    No. HP</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?=$user['no_hp'];?></td>
                                  </tr>
                                  <?php if ($id_nama_usaha >= 2) : ?>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Alamat</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-7"><?=$user['alamat'];?></td>
                                  </tr>
                                <?php endif ?>
                              </table>
                            </div>
                            </div>
                            <!--end::Tap pane-->
                            
                          </div>
                          <!--end::Tab Content-->
                        </div>
                        <!--end::Body-->
                      </div>
                      <!--end::Chart Widget 35-->
                    </div>

                  <div class="col-xl-6">
                      <div class="card card-flush h-xl-90">
                          <div class="card-header pt-7">
                              <h3 class="card-title align-items-start flex-column">
                                  <span class="card-label fw-bold text-dark">Data Pembayaran</span>
                              </h3>
                          </div>
                          <!--end::Header-->
                        <div class="card-body py-0 px-0">
                        <!--begin::Body-->
                          <div class="table-responsive">
                              <table class="table table-rounded table-striped border gy-4 gs-4">

                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Total Bayar</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">Rp <?= number_format($total_harga_awal, 2, ",", ".");?></td>
                                  </tr>
                                  <?php if ($status_order == '') : ?>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Terbayar</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">Rp <?= number_format($gross_amount, 2, ",", ".");?></td>
                                  </tr>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Belum Terbayar</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">Rp <?= number_format($bayar_tunai, 2, ",", ".");?></td>
                                  </tr>
                                  <?php elseif ($status_order == 'selesai') : ?>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Status Bayar</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">
                                    <div class="badge badge-light-primary fs-6">Lunas</div>
                                    </td>
                                  </tr>
                                  <?php endif ?>

                              </table>
                            </div>
                        </div>
                      </div>
                  </div>

                  <div class="col-xl-8">
                        <!--begin::Chart Widget 35-->
                      <div class="card card-flush">
                        <!--begin::Header-->
                        <div class="card-header pt-5 mb-6">
                          <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Data Booking</span>
                          </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-0 px-0">
                          
                          <!--begin::Tab Content-->
                          <div class="tab-content mt-n6">
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade active show" id="kt_charts_widget_35_tab_content_1">
                              <!--begin::Chart-->
                              <div id="" data-kt-chart-color="primary" class=""></div>
                              <!--end::Chart-->
                              <div class="table-responsive">
                              <table class="table table-rounded table-striped border gy-4 gs-4">
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Jenis Paket</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?=$user['nama_produk'];?></td>
                                  </tr>
                                   <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Tanggal</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?php echo date_format($created_at,'d-m-Y');?></td>
                                  </tr>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Waktu</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?=$user['waktu_booking'];?></td>
                                  </tr>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Tambahan Orang</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?=$user['tambahan_orang'];?></td>
                                  </tr>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Tambahan Cetak</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?=$user['tambahan_cetak'];?></td>
                                  </tr>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Tambahan Waktu</td>
                                    <?php if ($tambahan_waktu == '0') : ?>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">0</td>
                                    <?php elseif ($tambahan_waktu == '1') : ?>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">5 menit</td> 
                                    <?php elseif ($tambahan_waktu == '2') : ?>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">10 menit</td>
                                    <?php elseif ($tambahan_waktu == '3') : ?>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">15 menit</td>
                                    <?php elseif ($tambahan_waktu == '4') : ?>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">20 menit</td>
                                    <?php elseif ($tambahan_waktu == '5') : ?>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">25 menit</td>
                                    <?php elseif ($tambahan_waktu == '6') : ?>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">30 menit</td>
                                    <?php elseif ($tambahan_waktu == '7') : ?>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">35 menit</td>
                                    <?php elseif ($tambahan_waktu == '8') : ?>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">40 menit</td>
                                    <?php elseif ($tambahan_waktu == '10') : ?>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">45 menit</td>
                                    <?php elseif ($tambahan_waktu == '11') : ?>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">50 menit</td>
                                    <?php elseif ($tambahan_waktu == '12') : ?>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">55 menit</td>
                                    <?php elseif ($tambahan_waktu == '13') : ?>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">1 jam</td>
                                    <?php endif ?></td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Status</td>
                                    <td>
                                    <?php if ($status_order == 'selesai') : ?>
                                      <div class="badge badge-light-primary fs-6">Selesai</div>
                                     <?php elseif ($status_order == 'cancel') : ?>
                                      <div class="badge badge-light-danger fs-6">Cancel</div>
                                    <?php elseif ($status_order == '') : ?>
                                      <div class="badge badge-light-warning fs-6">Pending</div>
                                    <?php endif ?>
                                    </td>
                                  </tr>
                                  <?php if ($status_order == 'cancel') : ?>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Keterangan</td>
                                      <form action="<?php echo site_url('penjualan_c/update_ket/'. '?id_nama_usaha=' . $id_nama_usaha);?>" method="post">
                                        <input type="hidden" name="kode_order" value="<?=$kode_order;?>">
                                        <td class="text-gray-400 fw-semibold d-block fs-6">
                                          <input type="text" class="form-control text-gray-400 fw-semibold d-block fs-6 col-xl-6" name="ket" value="<?=$user['ket'];?>">
                                          <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                        </td>
                                      </form>
                                  </tr>
                                  <?php endif ?>


                                  <?php if ($id_nama_usaha >= 2) : ?>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Jumlah</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">tes</td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Harga</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">Rp <?= number_format($user['total_harga'], 2, ",", ".");?></td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Metode Pembayaran</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">tes</td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Kurir</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">tes</td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">No. Resi</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">tes</td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Status</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">tes</td>
                                  </tr>
                                <?php endif ?>
                              </table>
                            </div>
                            </div>
                            <!--end::Tap pane-->
                            
                          </div>
                          <!--end::Tab Content-->
                        </div>
                        <!--end::Body-->
                      </div>
                      <!--end::Chart Widget 35-->
                    </div>

        <?php if ($status_order == '') : ?>
        <div class="col-xl-4">
            <div class="card card-flush h-xl-90">
                <div class="card-header pt-7">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Tambah Data</span>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('penjualan_c/update/'. '?id_nama_usaha=' . $id_nama_usaha);?>" method="post">
                      <input type="hidden" name="kode_order" value="<?=$kode_order;?>">
                      <input type="hidden" name="tambah_orang_awal" id="tambah_orang_awal" value="<?=$user['tambahan_orang'];?>">
                      <input type="hidden" name="total_harga_orang" id="total_harga_orang" value="">
                      <input type="hidden" name="total_harga_cetak" id="total_harga_cetak" value="">
                      <input type="hidden" name="total_harga_waktu" id="total_harga_waktu" value="">
                      <input type="hidden" name="total_orang" id="total_orang" value="">
                      <input type="hidden" name="total_waktu" id="total_waktu" value="">
                      <input type="hidden" name="total_cetak" id="total_cetak" value="">
                      <input type="hidden" name="metode_bayar" value="<?=$user['pembayaran'];?>">
                      <input type="hidden" name="name_bank" value="<?=$user['name_bank'];?>">
                    
                      <div class="col-md-15">
                      <div class="form-group">
                          <label class="required form-label" for="">Tambah Orang</label>
                          <div class="row">
                            <div class="col-md-15">
                              <select name="tambah_orang" id="tambah_orang" class="form-control">
                                <option >--pilih--</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                              </select>
                            </div>
                          </div>
                          <div class="text-muted fs-7">Jika tidak ingin menambah orang, pilih angka 0.</div>
                        </div>
                        <div class="form-group pt-5">
                          <label class="required form-label" for="">Tambah Cetak</label>
                          <div class="row pt-2">
                            <div class="col-md-15">
                              <select name="tambah_cetak" id="tambah_cetak" class="form-control">
                                <option >--pilih--</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                              </select>
                            </div>
                          </div>
                          <div class="text-muted fs-7">Jika tidak ingin menambah cetak, pilih angka 0.</div>
                        </div>
                        <div class="form-group pt-5">
                          <label class="required form-label" for="">Tambah Waktu</label>
                          <div class="row pt-2">
                            <div class="col-md-15">
                              <select name="tambah_waktu" id="tambah_waktu" class="form-control">
                                <option >--pilih--</option>
                                <option value="0">0</option>
                                <option value="1">5 menit</option>
                                <option value="2">10 menit</option>
                                <option value="3">15 menit</option>
                                <option value="4">20 menit</option>
                                <option value="5">25 menit</option>
                                <option value="6">30 menit</option>
                                <option value="7">35 menit</option>
                                <option value="8">40 menit</option>
                                <option value="9">45 menit</option>
                                <option value="10">50 menit</option>
                                <option value="11">55 menit</option>
                                <option value="12">1 jam</option>
                              </select>
                            </div>
                          </div>
                          <div class="text-muted fs-7">Jika tidak ingin menambah waktu, pilih angka 0.</div>
                        </div>
                        <!-- <div class="form-group pt-5">
                          <label class="required form-label" for="">Tambah Orang</label>
                          <input type="" name="tambah_orang" id="tambah_orang" value="" class="form-control" required="" >
                          <div class="text-muted fs-7">Jika tidak ingin menambah orang, masukkan angka 0.</div>
                        </div> -->
                        <!-- <div class="form-group pt-5">
                          <label class="required form-label" for="">Tambah Cetak</label>
                          <input type="" name="tambah_cetak" id="tambah_cetak" value="" class="form-control" required="" >
                          <div class="text-muted fs-7">Jika tidak ingin menambah cetak, masukkan angka 0.</div>
                        </div> -->
                        <div class="form-group pt-5">
                          <label class="required form-label" for="harga">Harga Awal</label>
                          <div class="input-group mb-8">
                            <span class="input-group-text">Rp</span>
                            <input class="form-control" type="text" value="<?=$total_harga_awal;?>" readonly="" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="required form-label" for="harga">Total Harga</label>
                          <div class="input-group mb-8">
                            <span class="input-group-text">Rp</span>
                            <input class="form-control" type="text" value="" name="total" id="total"  readonly="" >
                          </div>

                          <input type="hidden" id="harga_awal" name="harga_awal" value="<?=$total_harga_awal;?>" class="form-control" >
                          <input type="hidden" id="harga_tambah_perorang" name="harga_tambah_perorang" value="<?=$user['harga_tambah_perorang'];?>" class="form-control" >
                          <input type="hidden" id="harga_tambah_cetak" name="harga_tambah_cetak" value="<?=$user['harga_tambah_cetak'];?>" class="form-control" >
                          <input type="hidden" id="harga_tambah_waktu" name="harga_tambah_waktu" value="<?=$user['harga_tambah_waktu'];?>" class="form-control" >

                          <script type="text/javascript">
                            $(document).ready(function() {
                              $("#tambah_orang, #tambah_cetak, #tambah_waktu, #harga_awal, #harga_tambah_perorang, #harga_tambah_cetak, #harga_tambah_waktu, #tambah_orang_awal, #tambah_cetak_awal, #tambah_waktu_awal").change(function() {
                                var tambah_orang  = $("#tambah_orang").val();
                                var tambah_cetak = $("#tambah_cetak").val();
                                var tambah_waktu = $("#tambah_waktu").val();
                                var harga_awal = $("#harga_awal").val();
                                var harga_tambah_perorang = $("#harga_tambah_perorang").val();
                                var harga_tambah_cetak = $("#harga_tambah_cetak").val();
                                var harga_tambah_waktu = $("#harga_tambah_waktu").val();
                                var tambah_orang_awal = <?=$user['tambahan_orang'];?>;
                                var tambah_cetak_awal = <?=$user['tambahan_cetak'];?>;
                                var tambah_waktu_awal = <?=$user['tambahan_waktu'];?>;

                                var total = parseInt(tambah_waktu) * parseInt(harga_tambah_waktu) + parseInt(tambah_orang) * parseInt(harga_tambah_perorang) + parseInt(tambah_cetak) * parseInt(harga_tambah_cetak) + parseInt(harga_awal);

                                var total_harga_orang = parseInt(tambah_orang) * parseInt(harga_tambah_perorang);
                                var total_harga_cetak = parseInt(tambah_cetak) * parseInt(harga_tambah_cetak);
                                var total_harga_waktu = parseInt(tambah_waktu) * parseInt(harga_tambah_waktu);
                                var total_orang = parseInt(tambah_orang_awal) + parseInt(tambah_orang);
                                var total_cetak = parseInt(tambah_cetak_awal) + parseInt(tambah_cetak);
                                var total_waktu = parseInt(tambah_waktu_awal) + parseInt(tambah_waktu);

                                $("#total_harga_orang").val(total_harga_orang);
                                $("#total_harga_cetak").val(total_harga_cetak);
                                $("#total_harga_waktu").val(total_harga_waktu);
                                $("#total_orang").val(total_orang);
                                $("#total_cetak").val(total_cetak);
                                $("#total_waktu").val(total_waktu);
                                $("#total").val(total);
                              });
                            });
                          </script>
                        </div>
                    </div>
                    <?php if ($pembayaran == 0):?>
                    <div class="form-group">
                      <label class="required form-label" for="harga">Metode Bayar</label>
                        <select name="metode_bayar" id="metode_bayar" class="form-control" required="">
                          <option value="" hidden disabled selected>--pilih--</option>
                            <option value="2">Tunai</option>
                          <option value="1">Non Tunai</option>
                        </select>

                        <script type="text/javascript">
                         $(document).ready(function(){
                          $('#metode_bayar').change(function(){
                            var metode_bayar =$(this).val();

                            $("#bank, #bank1").hide()
                            if($(this).val() == '1'){
                              $("#bank, #bank1").show();
                            }
                          });
                        });
                        </script>
                    </div>
                    <div class="form-group">
                    <label class="required form-label" for="paket" id="bank1">Bank</label>
                      <div class="col-sm-14">
                        <select class="form-control" name="name_bank" id="bank">
                          <option value="" hidden disabled selected>--Pilih--</option>
                          <?php foreach($role_bank as $row):?>
                          <option value="<?php echo $row->nama_bank;?>"><?php echo $row->nama_bank;?></option>
                          <?php endforeach;?>
                          </select>
                      </div>
                  </div>
                    <?php endif?>
                  <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <div class="col-md-1 px-8">
                      <button type="submit" class="btn btn-primary btn-sm">&nbspSave&nbsp</button>
                    </div>
                  </div>
                  </div>
                  </form>
                </div>
            </div>
        </div>
      <?php endif?>
    </div>





                  <!--
                  <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="col-xl-4">
                      <div class="card card-flush">
                        <div class="card-header pt-5 mb-6">
                          <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Data Pelanggan</span>
                          </h3>
                        </div>
                        <div class="card-body py-0 px-0">
                          <div class="tab-content mt-n6">
                            <div class="tab-pane fade active show" id="kt_charts_widget_35_tab_content_1">
                              <div id="" data-kt-chart-color="primary" class=""></div>
                              <div class="table-responsive">
                              <table class="table table-rounded table-striped border gy-4 gs-4">
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Nama</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?=$user['nama_customer'];?></td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Email</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?=$user['email'];?></td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    No. HP</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?=$user['no_hp'];?></td>
                                  </tr>
                                  <?php if ($id_nama_usaha >= 2) : ?>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Alamat</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-7"><?=$user['alamat'];?></td>
                                  </tr>
                                <?php endif ?>
                              </table>
                            </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-8">
                      <div class="card card-flush h-md-100">
                        <div class="card-header pt-7">
                          <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Data Order</span>
                          </h3>
                        </div>
                        <div class="card-body py-0 px-0">
                          <div class="table-responsive">
                              <table class="table table-rounded table-striped border gy-4 gs-4">

                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Jenis Paket</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?=$user['nama_produk'];?></td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Tanggal Booking</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?php echo date_format($created_at,'d-m-Y');?></td>
                                  </tr>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Waktu Booking</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?=$user['waktu_booking'];?></td>
                                  </tr>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Tambahan Orang</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?=$user['tambahan_orang'];?></td>
                                  </tr>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Tambahan Cetak</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?=$user['tambahan_cetak'];?></td>
                                  </tr>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Tambahan Waktu</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6"><?=$user['tambahan_waktu'];?></td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Status</td>
                                    <td>
                                    <?php if ($status_order == 'selesai') : ?>
                                      <div class="badge badge-light-primary fs-6">Selesai</div>
                                     <?php elseif ($status_order == 'cancel') : ?>
                                      <div class="badge badge-light-danger fs-6">Cancel</div>
                                    <?php elseif ($status_order == '') : ?>
                                      <div class="badge badge-light-warning fs-6">Pending</div>
                                    <?php endif ?>
                                    </td>
                                  </tr>
                                  <?php if ($status_order == 'cancel') : ?>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">&nbsp&nbsp&nbsp&nbsp
                                    Keterangan</td>
                                      <form action="<?php echo site_url('penjualan_c/update_ket/'. '?id_nama_usaha=' . $id_nama_usaha);?>" method="post">
                                        <input type="hidden" name="kode_order" value="<?=$kode_order;?>">
                                        <td class="text-gray-400 fw-semibold d-block fs-6"><input type="text" class="form-control text-gray-400 fw-semibold d-block fs-6" name="ket" value="<?=$user['ket'];?>">
                                          <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                        </td>
                                      </form>
                                  </tr>
                                  <?php endif ?>


                                  <?php if ($id_nama_usaha >= 2) : ?>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Jumlah</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">tes</td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Harga</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">Rp <?= number_format($user['total_harga'], 2, ",", ".");?></td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Metode Pembayaran</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">tes</td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Kurir</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">tes</td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">No. Resi</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">tes</td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Status</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">tes</td>
                                  </tr>
                                <?php endif ?>
                              </table>
                            </div>
                        </div>
                        <?php if ($id_nama_usaha >= 2) : ?>
                        <div class="card-footer">
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                              <input type="text" name="kode_produk" value="" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-1">
                            <div class="text-right">
                              <a href="<?php echo site_url('produk_c/data_produk/'. '?id_nama_usaha=' . $id_nama_usaha);?>"><button type="button" class="btn btn-danger btn-sm">&nbspCek&nbsp</button></a> 
                            </div>
                          </div>
                          <div class="col-md-1 px-8">
                            <div class="">
                              <a href="<?php echo site_url('produk_c/data_produk/'. '?id_nama_usaha=' . $id_nama_usaha);?>"><button type="button" class="btn btn-primary btn-sm">&nbspSave&nbsp</button></a> 
                            </div>
                          </div>
                      </div>
                    </div>
                  <?php endif;?>

                  <?php if ($status_order == '') : ?>
                  <div class="card-footer">
                    <form action="<?php echo site_url('penjualan_c/update/'. '?id_nama_usaha=' . $id_nama_usaha);?>" method="post">
                      <input type="hidden" name="kode_order" value="<?=$kode_order;?>">
                      <input type="hidden" name="tambah_orang_awal" id="tambah_orang_awal" value="<?=$user['tambahan_orang'];?>">
                      <input type="hidden" name="total_harga_orang" id="total_harga_orang" value="">
                      <input type="hidden" name="total_harga_cetak" id="total_harga_cetak" value="">
                      <input type="hidden" name="total_harga_waktu" id="total_harga_waktu" value="">
                      <input type="hidden" name="total_orang" id="total_orang" value="">
                      <input type="hidden" name="total_waktu" id="total_waktu" value="">
                      <input type="hidden" name="total_cetak" id="total_cetak" value="">

                    <div class="row">
                      <div class="col-md-8">
                      <div class="form-group">
                          <label class="required form-label" for="">Tambah Orang</label>
                          <div class="row pt-2">
                            <div class="col-md-15">
                              <select name="tambah_orang" id="tambah_orang" class="form-control">
                                <option >--pilih--</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                              </select>
                            </div>
                          </div>
                          <div class="text-muted fs-7">Jika tidak ingin menambah orang, pilih angka 0.</div>
                        </div>
                        <div class="form-group pt-5">
                          <label class="required form-label" for="">Tambah Cetak</label>
                          <div class="row pt-2">
                            <div class="col-md-15">
                              <select name="tambah_cetak" id="tambah_cetak" class="form-control">
                                <option >--pilih--</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                              </select>
                            </div>
                          </div>
                          <div class="text-muted fs-7">Jika tidak ingin menambah cetak, pilih angka 0.</div>
                        </div>
                        <div class="form-group pt-5">
                          <label class="required form-label" for="">Tambah Waktu</label>
                          <div class="row pt-2">
                            <div class="col-md-15">
                              <select name="tambah_waktu" id="tambah_waktu" class="form-control">
                                <option >--pilih--</option>
                                <option value="0">0</option>
                                <option value="1">5 menit</option>
                                <option value="2">10 menit</option>
                                <option value="3">15 menit</option>
                                <option value="4">20 menit</option>
                                <option value="5">25 menit</option>
                                <option value="6">30 menit</option>
                                <option value="7">35 menit</option>
                                <option value="8">40 menit</option>
                                <option value="9">45 menit</option>
                                <option value="10">50 menit</option>
                                <option value="11">55 menit</option>
                                <option value="12">1 jam</option>
                              </select>
                            </div>
                          </div>
                          <div class="text-muted fs-7">Jika tidak ingin menambah waktu, pilih angka 0.</div>
                        </div>
                        <div class="form-group pt-5">
                          <label class="required form-label" for="">Tambah Orang</label>
                          <input type="" name="tambah_orang" id="tambah_orang" value="" class="form-control" required="" >
                          <div class="text-muted fs-7">Jika tidak ingin menambah orang, masukkan angka 0.</div>
                        </div> 
                        <div class="form-group pt-5">
                          <label class="required form-label" for="">Tambah Cetak</label>
                          <input type="" name="tambah_cetak" id="tambah_cetak" value="" class="form-control" required="" >
                          <div class="text-muted fs-7">Jika tidak ingin menambah cetak, masukkan angka 0.</div>
                        </div>
                        <div class="form-group pt-5">
                          <label class="required form-label" for="harga">Harga Awal</label>
                          <div class="input-group mb-8">
                            <span class="input-group-text">Rp</span>
                            <input class="form-control" type="text" value="<?=$total_harga_awal;?>" readonly="" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="required form-label" for="harga">Total Harga</label>
                          <div class="input-group mb-8">
                            <span class="input-group-text">Rp</span>
                            <input class="form-control" type="text" value="" name="total" id="total"  readonly="" >
                          </div>

                          <input type="hidden" id="harga_awal" name="harga_awal" value="<?=$total_harga_awal;?>" class="form-control" >
                          <input type="hidden" id="harga_tambah_perorang" name="harga_tambah_perorang" value="<?=$user['harga_tambah_perorang'];?>" class="form-control" >
                          <input type="hidden" id="harga_tambah_cetak" name="harga_tambah_cetak" value="<?=$user['harga_tambah_cetak'];?>" class="form-control" >
                          <input type="hidden" id="harga_tambah_waktu" name="harga_tambah_waktu" value="<?=$user['harga_tambah_waktu'];?>" class="form-control" >

                          <script type="text/javascript">
                            $(document).ready(function() {
                              $("#tambah_orang, #tambah_cetak, #tambah_waktu, #harga_awal, #harga_tambah_perorang, #harga_tambah_cetak, #harga_tambah_waktu, #tambah_orang_awal, #tambah_cetak_awal, #tambah_waktu_awal").change(function() {
                                var tambah_orang  = $("#tambah_orang").val();
                                var tambah_cetak = $("#tambah_cetak").val();
                                var tambah_waktu = $("#tambah_waktu").val();
                                var harga_awal = $("#harga_awal").val();
                                var harga_tambah_perorang = $("#harga_tambah_perorang").val();
                                var harga_tambah_cetak = $("#harga_tambah_cetak").val();
                                var harga_tambah_waktu = $("#harga_tambah_waktu").val();
                                var tambah_orang_awal = <?=$user['tambahan_orang'];?>;
                                var tambah_cetak_awal = <?=$user['tambahan_cetak'];?>;
                                var tambah_waktu_awal = <?=$user['tambahan_waktu'];?>;

                                var total = parseInt(tambah_waktu) * parseInt(harga_tambah_waktu) + parseInt(tambah_orang) * parseInt(harga_tambah_perorang) + parseInt(tambah_cetak) * parseInt(harga_tambah_cetak) + parseInt(harga_awal);

                                var total_harga_orang = parseInt(tambah_orang) * parseInt(harga_tambah_perorang);
                                var total_harga_cetak = parseInt(tambah_cetak) * parseInt(harga_tambah_cetak);
                                var total_harga_waktu = parseInt(tambah_waktu) * parseInt(harga_tambah_waktu);
                                var total_orang = parseInt(tambah_orang_awal) + parseInt(tambah_orang);
                                var total_cetak = parseInt(tambah_cetak_awal) + parseInt(tambah_cetak);
                                var total_waktu = parseInt(tambah_waktu_awal) + parseInt(tambah_waktu);

                                $("#total_harga_orang").val(total_harga_orang);
                                $("#total_harga_cetak").val(total_harga_cetak);
                                $("#total_harga_waktu").val(total_harga_waktu);
                                $("#total_orang").val(total_orang);
                                $("#total_cetak").val(total_cetak);
                                $("#total_waktu").val(total_waktu);
                                $("#total").val(total);
                              });
                            });
                          </script>
                        </div>
                    </div>
                  </div>
                  <div class="card-footer d-flex justify-content-end py-6 px-9 pt-10">
                    <div class="col-md-1 px-8">
                      <button type="submit" class="btn btn-primary btn-sm">&nbspSave&nbsp</button>
                    </div>
                  </div>
                  </form>
                  </div>
                <?php endif?>

                  </div>
                    </div>
                  </div>
                  
                  <div class="row gx-5 gx-xl-10">
                    <div class="col-xl-4">
                      <div class="card card-flush">
                        <div class="card-header pt-7 mb-7">
                          <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Pengiriman</span>
                          </h3>
                          <div class="pt-5">
                            <div class="form-group">
                              <label class="required form-label" for="kurir">Kurir</label>
                              <div class="col-sm-14">
                                <select class="form-control" name="kurir" required="">
                                  <option value="" hidden disabled selected>--Pilih kurir--</option>
                                  </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                              <label class="required form-label" for="resi">Nomor Resi</label>
                                <input type="text" name="resi" value="" class="form-control">
                            </div>
                              </div>
                            </div>
                              <div class="card-footer d-flex justify-content-end">
                                <a href="<?php echo site_url('produk_c/data_produk/'. '?id_nama_usaha=' . $id_nama_usaha);?>"><button type="button" class="btn btn-danger btn-sm">&nbspBatal&nbsp</button></a>&nbsp
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                              </div>
                            </div>
                        <div class="card-body d-flex align-items-end pt-0">
                          <div id="kt_charts_widget_31_chart" class="w-100 h-300px"></div>
                        </div>
                      </div> -->
                      <!--end::Chart widget 31-->
                    <!--end::Col-->
                    <!--begin::Col-->
                    <!--<div class="col-xl-8">
                      <div class="card card-flush overflow-hidden h-xl-100">
                        <div class="card-header py-5">
                          <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Human Resources</span>
                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Reports by states and ganders</span>
                          </h3>
                          <div class="card-toolbar">
                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                              <span class="svg-icon svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor" />
                                  <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                                  <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                                  <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                                </svg>
                              </span>
                            </button>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                              <div class="menu-item px-3">
                                <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                              </div>
                              <div class="separator mb-3 opacity-75"></div>
                              <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">New Ticket</a>
                              </div>
                              <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">New Customer</a>
                              </div>
                              <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                <a href="#" class="menu-link px-3">
                                  <span class="menu-title">New Group</span>
                                  <span class="menu-arrow"></span>
                                </a>
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                  <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Admin Group</a>
                                  </div>
                                  <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Staff Group</a>
                                  </div>
                                  <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Member Group</a>
                                  </div>
                                </div>
                              </div>
                              <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">New Contact</a>
                              </div>
                              <div class="separator mt-3 opacity-75"></div>
                              <div class="menu-item px-3">
                                <div class="menu-content px-3 py-3">
                                  <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-body pt-0">
                          <div id="kt_charts_widget_24" class="min-h-auto" style="height: 300px"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
           