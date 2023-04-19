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
          <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Data Foto <?= $lihat['nama_usaha'] ?></h1>
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
            <li class="breadcrumb-item text-muted">Data Foto <?= $lihat['nama_usaha'] ?></li>
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
              </div>
            </div>
            <a href="#" data-bs-toggle="modal" data-bs-target="#tambah_foto<?php echo $id_produk; ?>" class="btn btn-primary btn-sm">Tambah Foto</a>
        </div>
          <!--begin::Card body-->
          <div class="card-body pt-0">
            <form method="post" action="<?php echo site_url('produk_c/delete_foto/'. '?produk_id=' . $id_produk.'?&&id_nama_usaha=' . $id_nama_usaha);?>">
              <table class="table align-middle table-row-dashed fs-6 gy-5" id="table" >
                <!--begin::Table head-->
                <thead>
                  <!--begin::Table row-->
                  <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">
                      <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#table .form-check-input"  />
                      </div>
                    </th>
                    <th class="min-w-100px fs-7">Foto</th>
                    <th class="text-end min-w-10px fs-7">Actions</th>
                  </tr>
                  <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <?php 
                //$no = 1; //no default 1
                foreach ($foto_produk->result() as $baris) { //
                ?>
                <tbody class="fw-semibold text-gray-600">
                  <!--begin::Table row-->
                  <tr>
                    <!--begin::Checkbox-->
                    <td>
                      <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="id[]" value='<?php echo $baris->id; ?>'/>
                      </div>
                    </td>
                    <!--end::Checkbox-->
                    <td>
                      <div class="d-flex align-items-center">
                        <a href="#" class="symbol symbol-50px">
                          <span class="symbol-label w-100px h-100px" style="background-image:url(<?php echo base_url('assets/upload/foto_produk/') . $baris->foto_produk; ?>);"></span>
                        </a>
                    </td>
                    <!--end::Type=-->
                    <!--begin::Action=-->
                    <td class="text-end">
                      <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
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
                          <!--begin::Menu item-->
                          <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row" data-bs-toggle="modal" data-bs-target="#delete<?php echo $baris->id; ?>">Delete</a>
                          </div>
                          <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                      </td>
                      <!--end::Action=-->
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

<?php foreach($user as $baris): ?>
<form class="user" action="<?php echo site_url('produk_c/hapus_foto/'. $baris->id . '?produk_id=' . $baris->produk_id. '?&&id_nama_usaha=' . $id_nama_usaha);?>" method="post" enctype="multipart/form-data">
  <div class="modal fade" tabindex="-1" id="delete<?php echo $baris->id; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-body table text-center">
              <span class="svg-icon ">
                <div class="swal2-icon swal2-warning swal2-icon-show " style="display: flex;"><div class="swal2-icon-content">!</div></div>
                </span>
                <div class="row">
                        <div class="pt-5">
                          <input type="hidden" value="<?php echo $baris->id;?>" name="id">
                          <input type="hidden" name="id_produk" value="<?php echo $baris->produk_id;?>">
                          <input type="hidden" name="id_nama_usaha" value="<?php echo $id_nama_usaha;?>">
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
        </form>
    </div>
</div>
<?php endforeach;?>

<?php foreach($user as $baris): ?>
<form class="user" action="<?php echo site_url('produk_c/input_foto/'. '?id_nama_usaha=' .$id_nama_usaha. '&id_produk=' .$id_produk);?>" method="post" enctype="multipart/form-data">
<div class="modal fade" tabindex="-1" id="tambah_foto<?php echo $id_produk; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Tambah Foto</h2>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                  <div class="symbol symbol-50px">
                    <div class="symbol-label fs-2 fw-semibold text-dark">x</div>
          </div>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body text-center">
              <!-- <input type="hidden" value="<?php echo $baris->id_produk;?>" name="id_produk">
                <input type="hidden" value="<?php echo $id_nama_usaha;?>" name="id_nama_usaha"> -->
                <div class="form-group">
                  <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                    <div class="image-input-wrapper w-300px h-300px" style="background-image: url()"></div>
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Pilih foto">
                      <span class="fas fa-plus text-center fs-2x">
              </span>
                      <!--begin::Inputs-->
                      <input type="file" name="filefoto" accept="image/jpeg, image/png" />
                    </label>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                      <i class="bi bi-x fs-2"></i>
                    </span>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                      <i class="bi bi-x fs-2"></i>
                    </span>
                  </div>
                </div>
                <div class="d-flex justify-content-end">
                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php endforeach;?>