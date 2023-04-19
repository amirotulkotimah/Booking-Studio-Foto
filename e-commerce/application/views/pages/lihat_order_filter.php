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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Order #<?=$user['kode_order'];?></h1>
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
                  <!--begin::Row-->
                  <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <!--begin::Col-->
                    <div class="col-xl-4">
                      <!--begin::Chart Widget 35-->
                      <div class="card card-flush">
                        <!--begin::Header-->
                        <div class="card-header pt-5 mb-6">
                          <!--begin::Title-->
                          <h3 class="card-title align-items-start flex-column">
                            Data Penerima
                            <div class="d-flex align-items-center mb-2">
                          </div>
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
                              <table class="table table-rounded table-striped border gy-6 gs-6">
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Nama</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-7"><?=$user['nama_customer'];?></td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">No. HP</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-7">+<?=$user['hp'];?></td>
                                  </tr>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Alamat</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-7"><?=$user['alamat'];?></td>
                                  </tr>
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
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-8">
                      <!--begin::Table widget 14-->
                      <div class="card card-flush h-md-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                          <!--begin::Title-->
                          <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Data Order</span>
                          </h3>
                        </div>
                        <!--end::Header-->
                        <div class="card-body py-0 px-0">
                        <!--begin::Body-->
                          <div class="table-responsive">
                              <table class="table table-rounded table-striped border gy-6 gs-6">
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Kode Order</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-7">tes</td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Tanggal</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-7">tes</td>
                                  </tr>
                                  <tr class="fw-semibold text-gray-800 border-bottom border-gray-200">
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Produk</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-7">tes</td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Jumlah</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-7">tes</td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Harga</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-6">Rp <?= number_format($user['total_harga'], 2, ",", ".");?></td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Metode Pembayaran</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-7">tes</td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Kurir</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-7">tes</td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">No. Resi</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-7">tes</td>
                                  </tr>
                                  <tr>
                                    <td class="text-gray-800 fw-bold mb-1 fs-6">Status</td>
                                    <td class="text-gray-400 fw-semibold d-block fs-7">tes</td>
                                  </tr>
                              </table>
                            </div>
                        </div>
                        <!--end: Card Body-->
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
                  </div>
                      <!--end::Table widget 14-->
                    </div>
                    <!--end::Col-->
                  </div>
                  <!--end::Row-->
                  <!--begin::Row-->
                  <div class="row gx-5 gx-xl-10">
                    <!--begin::Col-->
                    <div class="col-xl-4">
                      <!--begin::Chart widget 31-->
                      <div class="card card-flush">
                        <!--begin::Header-->
                        <div class="card-header pt-7 mb-7">
                          <!--begin::Title-->
                          <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Pengiriman</span>
                          </h3>
                          <!--end::Title-->
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
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-end pt-0">
                          <!--begin::Chart-->
                          <div id="kt_charts_widget_31_chart" class="w-100 h-300px"></div>
                          <!--end::Chart-->
                        </div>
                        <!--end::Body-->
                      </div>
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
                        </div>-->
                        <!--end::Card body-->
                      </div>
                      <!--end::Chart widget 24-->
                    </div>
                    <!--end::Col-->
                  </div>
                  <!--end::Row-->
                </div>
                <!--end::Content container-->
              </div>
              <!--end::Content-->
            </div>
            <!--end::Content wrapper-->
           