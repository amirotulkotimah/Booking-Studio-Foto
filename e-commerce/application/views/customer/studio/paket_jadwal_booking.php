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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Cari Tanggal Booking</h1>
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
                            </span>Cari Tanggal</a>
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_63d12d561698e">
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                </div>
                                    <div class="separator border-gray-200"></div>
                                    <div class="px-7 py-5">
                                        <div class="modal-body">
                                            <form action="<?php echo site_url('booking_c/filter_tanggal/');?>" method="get" >
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
                        <div class="card-title">
                        <!--<span class="fs-3">Hari ini tanggal <?php echo date('d F Y');?></span>-->                   
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
                                