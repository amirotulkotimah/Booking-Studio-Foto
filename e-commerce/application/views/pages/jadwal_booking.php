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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Jadwal Booking</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            Tanggal <?php echo date_format($created_at,'d-m-Y');?>
                        </li>
                    </ul>
                </div>
                
                    </div>
                </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Category-->
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title fs-6">
                        <!-- <?php echo $tampil_tanggal;?> -->                       
                    </div>
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <div class="w-10 mw-150px">
                            <form action="<?php echo site_url('penjualan_c/cek_tanggal/');?>" method="get" >
                                <label class="form-label fw-semibold">Tanggal :</label>
                                <input type="date" name="tanggal" value="" class="form-control">
                                <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>" class="form-control">
                                </div><button type="submit" class="btn btn-primary btn-sm">Cari</button> 
                            </form>
                        </div>
                        <!--begin::Alert-->
                        <div class="alert alert-dismissible bg-light-warning d-flex flex-column flex-sm-row p-5 mb-10">
                            <!--begin::Icon-->
                            
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column pe-0 pe-sm-10">
                                <!--begin::Title-->
                                <!--<h4 class="mb-2 light">Note :</h4>-->
                                <span class="fw-semibold">Silahkan memilih tanggal pemotretan Anda, perlu diingat waktu pemotretan mungkin akan ada yang sudah dibooking. Jadi jika waktu ditemukan sudah dibooking harap pilih waktu yang lain.</span>
                                <!--end::Content-->
                            </div>
                        </div>
                        <!--end::Alert-->
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px fs-7">Waktu</th>
                                        <th class="min-w-70px fs-7">Status</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    <!--begin::Table row-->
                                    <tr>
                                        <td>
                                            <form action="<?php echo site_url('penjualan_c/tambah_data/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="waktu" value="06:00-07:00">
                                                <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>">
                                                <button type="submit" class="btn btn-success btn-sm">06:00-07:00</button>
                                            </form>

                                            <!-- <a href="<?= site_url('booking_c/getTanggal/' . '?tanggal_order=' . $tampil_tanggal. '?&waktu=' . '06:00-07:00' ) ?>"><button type="button" class="btn btn-secondary btn-sm">06:00-07:00</button></a></td> -->
                                        <td>
                                        <?php 
                                            //$no = 1; //no default 1
                                            foreach ($user as $baris) : //
                                            ?>
                                            
                                            <?php if ($baris->tanggal_order == $tanggal && $baris->waktu_booking == '06:00-07:00') : ?>
                                                <div class="badge badge-light-danger fs-7">Sudah Dibooking</div></a>
                                            <?php elseif ($baris->tanggal_order == '') : ?>
                                                <div class="badge badge-light-primary fs-7">Free</div>
                                            <?php endif ?>
                                            <?php  endforeach ?>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form action="<?php echo site_url('penjualan_c/tambah_data/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="waktu" value="07:00-08:00">
                                                <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>">
                                                <button type="submit" class="btn btn-success btn-sm">07:00-08:00</button>
                                            </form>
                                        </td>
                                        <td>
                                            <?php 
                                            //$no = 1; //no default 1
                                            foreach ($user as $baris) : //
                                            ?>
                                            <?php if ($baris->tanggal_order == $tanggal && $baris->waktu_booking == '07:00-08:00') : ?>
                                                <div class="badge badge-light-danger fs-7">Sudah Dibooking</div></a>
                                            <?php elseif ($baris->tanggal_order == '') : ?>
                                                <div class="badge badge-light-primary fs-7">Free</div>
                                            <?php endif ?>
                                            <?php  endforeach ?>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form action="<?php echo site_url('penjualan_c/tambah_data/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="waktu" value="08:00-09:00">
                                                <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>">
                                                <button type="submit" class="btn btn-success btn-sm">08:00-09:00</button>
                                            </form>
                                        </td>
                                        <td>
                                            <?php 
                                            //$no = 1; //no default 1
                                            foreach ($user as $baris) : //
                                            ?>
                                            <?php if ($baris->tanggal_order == $tanggal && $baris->waktu_booking == '08:00-09:00') : ?>
                                                <div class="badge badge-light-danger fs-7">Sudah Dibooking</div></a>
                                            <?php elseif ($baris->tanggal_order == '') : ?>
                                                <div class="badge badge-light-primary fs-7">Free</div>
                                            <?php endif ?>
                                            <?php  endforeach ?>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form action="<?php echo site_url('penjualan_c/tambah_data/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="waktu" value="09:00-10:00">
                                                <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>">
                                                <button type="submit" class="btn btn-success btn-sm">09:00-10:00</button>
                                            </form>
                                        </td>
                                        <td>
                                            <?php 
                                            //$no = 1; //no default 1
                                            foreach ($user as $baris) : //
                                            ?>
                                            <?php if ($baris->tanggal_order == $tanggal && $baris->waktu_booking == '09:00-10:00') : ?>
                                                <div class="badge badge-light-danger fs-7">Sudah Dibooking</div></a>
                                            <?php elseif ($baris->tanggal_order == '') : ?>
                                                <div class="badge badge-light-primary fs-7">Free</div>
                                            <?php endif ?>
                                            <?php  endforeach ?>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form action="<?php echo site_url('penjualan_c/tambah_data/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="waktu" value="10:00-11:00">
                                                <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>">
                                                <button type="submit" class="btn btn-success btn-sm">10:00-11:00</button>
                                            </form>
                                        </td>
                                        <td>
                                            <?php 
                                            //$no = 1; //no default 1
                                            foreach ($user as $baris) : //
                                            ?>
                                            <?php if ($baris->tanggal_order == $tanggal && $baris->waktu_booking == '10:00-11:00') : ?>
                                                <div class="badge badge-light-danger fs-7">Sudah Dibooking</div></a>
                                            <?php elseif ($baris->tanggal_order == '') : ?>
                                                <div class="badge badge-light-primary fs-7">Free</div>
                                            <?php endif ?>
                                            <?php  endforeach ?>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form action="<?php echo site_url('penjualan_c/tambah_data/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="waktu" value="11:00-12:00">
                                                <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>">
                                                <button type="submit" class="btn btn-success btn-sm">11:00-12:00</button>
                                            </form>
                                        </td>
                                        <td>
                                            <?php 
                                            //$no = 1; //no default 1
                                            foreach ($user as $baris) : //
                                            ?>
                                            <?php if ($baris->tanggal_order == $tanggal && $baris->waktu_booking == '11:00-12:00') : ?>
                                                <div class="badge badge-light-danger fs-7">Sudah Dibooking</div></a>
                                            <?php elseif ($baris->tanggal_order == '') : ?>
                                                <div class="badge badge-light-primary fs-7">Free</div>
                                            <?php endif ?>
                                            <?php  endforeach ?>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form action="<?php echo site_url('penjualan_c/tambah_data/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="waktu" value="12:00-13:00">
                                                <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>">
                                                <button type="submit" class="btn btn-success btn-sm">12:00-13:00</button>
                                            </form>
                                        </td>
                                        <td>
                                            <?php 
                                            //$no = 1; //no default 1
                                            foreach ($user as $baris) : //
                                            ?>
                                            <?php if ($baris->tanggal_order == $tanggal && $baris->waktu_booking == '12:00-13:00') : ?>
                                                <div class="badge badge-light-danger fs-7">Sudah Dibooking</div></a>
                                            <?php elseif ($baris->tanggal_order == '') : ?>
                                                <div class="badge badge-light-primary fs-7">Free</div>
                                            <?php endif ?>
                                            <?php  endforeach ?>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form action="<?php echo site_url('penjualan_c/tambah_data/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="waktu" value="13:00-14:00">
                                                <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>">
                                                <button type="submit" class="btn btn-success btn-sm">13:00-14:00</button>
                                            </form>
                                        </td>
                                        <td>
                                            <?php 
                                            //$no = 1; //no default 1
                                            foreach ($user as $baris) : //
                                            ?>
                                            <?php if ($baris->tanggal_order == $tanggal && $baris->waktu_booking == '13:00-14:00') : ?>
                                                <div class="badge badge-light-danger fs-7">Sudah Dibooking</div></a>
                                            <?php elseif ($baris->tanggal_order == '') : ?>
                                                <div class="badge badge-light-primary fs-7">Free</div>
                                            <?php endif ?>
                                            <?php  endforeach ?>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form action="<?php echo site_url('penjualan_c/tambah_data/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="waktu" value="14:00-15:00">
                                                <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>">
                                                <button type="submit" class="btn btn-success btn-sm">14:00-15:00</button>
                                            </form>
                                        </td>
                                        <td>
                                            <?php 
                                            //$no = 1; //no default 1
                                            foreach ($user as $baris) : //
                                            ?>
                                            <?php if ($baris->tanggal_order == $tanggal && $baris->waktu_booking == '14:00-15:00') : ?>
                                                <div class="badge badge-light-danger fs-7">Sudah Dibooking</div></a>
                                            <?php elseif ($baris->tanggal_order == '') : ?>
                                                <div class="badge badge-light-primary fs-7">Free</div>
                                            <?php endif ?>
                                            <?php  endforeach ?>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form action="<?php echo site_url('penjualan_c/tambah_data/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="waktu" value="15:00-16:00">
                                                <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>">
                                                <button type="submit" class="btn btn-success btn-sm">15:00-16:00</button>
                                            </form>
                                        </td>
                                        <td>
                                            <?php 
                                            //$no = 1; //no default 1
                                            foreach ($user as $baris) : //
                                            ?>
                                            <?php if ($baris->tanggal_order == $tanggal && $baris->waktu_booking == '15:00-16:00') : ?>
                                                <div class="badge badge-light-danger fs-7">Sudah Dibooking</div></a>
                                            <?php elseif ($baris->tanggal_order == '') : ?>
                                                <div class="badge badge-light-primary fs-7">Free</div>
                                            <?php endif ?>
                                            <?php  endforeach ?>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form action="<?php echo site_url('penjualan_c/tambah_data/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="waktu" value="16:00-17:00">
                                                <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>">
                                                <button type="submit" class="btn btn-success btn-sm">16:00-17:00</button>
                                            </form>
                                        </td>
                                        <td>
                                            <?php 
                                            //$no = 1; //no default 1
                                            foreach ($user as $baris) : //
                                            ?>
                                            <?php if ($baris->tanggal_order == $tanggal && $baris->waktu_booking == '16:00-17:00') : ?>
                                                <div class="badge badge-light-danger fs-7">Sudah Dibooking</div></a>
                                            <?php elseif ($baris->tanggal_order == '') : ?>
                                                <div class="badge badge-light-primary fs-7">Free</div>
                                            <?php endif ?>
                                            <?php  endforeach ?>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form action="<?php echo site_url('penjualan_c/tambah_data/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="waktu" value="17:00-18:00">
                                                <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>">
                                                <button type="submit" class="btn btn-success btn-sm">17:00-18:00</button>
                                            </form>
                                        </td>
                                        <td>
                                            <?php 
                                            //$no = 1; //no default 1
                                            foreach ($user as $baris) : //
                                            ?>
                                            <?php if ($baris->tanggal_order == $tanggal && $baris->waktu_booking == '17:00-18:00') : ?>
                                                <div class="badge badge-light-danger fs-7">Sudah Dibooking</div></a>
                                            <?php elseif ($baris->tanggal_order == '') : ?>
                                                <div class="badge badge-light-primary fs-7">Free</div>
                                            <?php endif ?>
                                            <?php  endforeach ?>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form action="<?php echo site_url('penjualan_c/tambah_data/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="waktu" value="18:00-19:00">
                                                <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>">
                                                <button type="submit" class="btn btn-success btn-sm">18:00-19:00</button>
                                            </form>
                                        </td>
                                        <td>
                                            <?php 
                                            //$no = 1; //no default 1
                                            foreach ($user as $baris) : //
                                            ?>
                                            <?php if ($baris->tanggal_order == $tanggal && $baris->waktu_booking == '18:00-19:00') : ?>
                                                <div class="badge badge-light-danger fs-7">Sudah Dibooking</div></a>
                                            <?php elseif ($baris->tanggal_order == '') : ?>
                                                <div class="badge badge-light-primary fs-7">Free</div>
                                            <?php endif ?>
                                            <?php  endforeach ?>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form action="<?php echo site_url('penjualan_c/tambah_data/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="waktu" value="19:00-20:00">
                                                <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>">
                                                <button type="submit" class="btn btn-success btn-sm">19:00-20:00</button>
                                            </form>
                                        </td>
                                        <td>
                                            <?php 
                                            //$no = 1; //no default 1
                                            foreach ($user as $baris) : //
                                            ?>
                                            <?php if ($baris->tanggal_order == $tanggal && $baris->waktu_booking == '19:00-20:00') : ?>
                                                <div class="badge badge-light-danger fs-7">Sudah Dibooking</div></a>
                                            <?php elseif ($baris->tanggal_order == '') : ?>
                                                <div class="badge badge-light-primary fs-7">Free</div>
                                            <?php endif ?>
                                            <?php  endforeach ?>
                                        </td>
                                        </td>
                                    </tr>

                                </tbody>
                                </table>
                                    </form>
                                    <div id="kt_app_toolbar" >
                                        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                                
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>