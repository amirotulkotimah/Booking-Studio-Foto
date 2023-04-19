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
                    <!--end::Title-->
                </div>
                <!--end::Page title-->

                <!--begin::Actions-->
                <!--<div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <a href="#" class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <span class="svg-icon svg-icon-6 svg-icon-muted me-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
                                </svg>
                            </span>
                            Cari Tanggal</a>
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_63d12d561698e">
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                </div>
                                    <div class="separator border-gray-200"></div>
                                    <div class="px-7 py-5">
                                        <div class="modal-body">
                                            <form action="<?php echo site_url('booking_c/filter_tanggal');?>" method="get" >
                                                <div class="row pt-2">
                                                    <div class="col-md-10">
                                                            <label for="inputMulaiTanggal" class="form-label fw-semibold">Tanggal :</label>
                                                            <input type="date" id="inputMulaiTanggal" name="tanggal" class="form-control" required>
                                                    </div>
                                                    <div class="d-flex justify-content-end pt-5">
                                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                                        <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Cari</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Category-->
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title fs-6">
                        <!--<?php echo date_format($created_at,'d-m-Y');?>-->                       
                    </div>
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <div class="w-10 mw-150px">
                            <form action="<?php echo site_url('booking_c/filter_tanggal_paket/');?>" method="get" >
                                <label class="form-label fw-semibold">Tanggal :</label>
                                <input type="date" name="tanggal" value="" class="form-control">
                                <input type="hidden" name="id_nama_usaha" value="1">
                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
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
                                            <form action="<?php echo site_url('booking_c/pilih_tanggal_paket/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                                                <input type="hidden" name="waktu" value="06:00-07:00">
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
                                            <form action="<?php echo site_url('booking_c/pilih_tanggal_paket/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                                                <input type="hidden" name="waktu" value="07:00-08:00">
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
                                            <form action="<?php echo site_url('booking_c/pilih_tanggal_paket/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                                                <input type="hidden" name="waktu" value="08:00-09:00">
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
                                            <form action="<?php echo site_url('booking_c/pilih_tanggal_paket/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                                                <input type="hidden" name="waktu" value="09:00-10:00">
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
                                            <form action="<?php echo site_url('booking_c/pilih_tanggal_paket/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                                                <input type="hidden" name="waktu" value="10:00-11:00">
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
                                            <form action="<?php echo site_url('booking_c/pilih_tanggal_paket/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                                                <input type="hidden" name="waktu" value="11:00-12:00">
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
                                            <form action="<?php echo site_url('booking_c/pilih_tanggal_paket/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                                                <input type="hidden" name="waktu" value="12:00-13:00">
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
                                            <form action="<?php echo site_url('booking_c/pilih_tanggal_paket/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                                                <input type="hidden" name="waktu" value="13:00-14:00">
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
                                            <form action="<?php echo site_url('booking_c/pilih_tanggal_paket/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                                                <input type="hidden" name="waktu" value="14:00-15:00">
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
                                            <form action="<?php echo site_url('booking_c/pilih_tanggal_paket/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                                                <input type="hidden" name="waktu" value="15:00-16:00">
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
                                            <form action="<?php echo site_url('booking_c/pilih_tanggal_paket/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                                                <input type="hidden" name="waktu" value="16:00-17:00">
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
                                            <form action="<?php echo site_url('booking_c/pilih_tanggal_paket/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                                                <input type="hidden" name="waktu" value="17:00-18:00">
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
                                            <form action="<?php echo site_url('booking_c/pilih_tanggal_paket/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                                                <input type="hidden" name="waktu" value="18:00-19:00">
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
                                            <form action="<?php echo site_url('booking_c/pilih_tanggal_paket/');?>" method="get" >
                                                <input type="hidden" name="tanggal" value="<?=$tampil_tanggal;?>">
                                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                                                <input type="hidden" name="waktu" value="19:00-20:00">
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


                    <!-- <div class="card-body pt-0">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="table">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#table .form-check-input"  />
                                            </div>
                                        </th>
                                        <th class="min-w-125px fs-7">Waktu</th>
                                        <th class="min-w-70px fs-7">Status</th>
                                    </tr>
                                </thead>
                                <?php 
                                //$no = 1; //no default 1
                                foreach ($user as $baris) { //
                                ?>
                                <tbody class="fw-semibold text-gray-600">
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" name="" value='1'/>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="<?php echo site_url('booking_c/pilih_tanggal_paket/');?>" method="get" >
                                                <input type="hidden" name="id" value="<?php echo $baris->id;?>">
                                                <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                                                <button type="submit" class="btn btn-secondary btn-sm"><?php echo $baris->waktu_booking;?></button>
                                            </form>
                                        </td>
                                        <td>
                                            <?php if ($baris->status_booking == 'Sudah Dibooking') : ?>
                                                <div class="badge badge-light-danger fs-7">Sudah Dibooking</div></a>
                                            <?php elseif ($baris->status_booking == 'Free') : ?>
                                                <div class="badge badge-light-primary fs-7">Free</div>
                                            <?php endif ?>
                                        </td>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php  } ?>
                                </table>
                                    <div id="kt_app_toolbar" >
                                        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                                
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->