<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
  <div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
      <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
          <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit Data Pelanggan</h1>
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
              <li class="breadcrumb-item text-muted">Edit Data Pelanggan</li>
              <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
      </div>
    </div>
  </div>
</div>
<form data-kt-search-element="preferences" class="pt-1 d-none">
  <div class="d-flex justify-content-end pt-7"></div>
</form>
<div id="kt_app_content" class="app-content flex-column-fluid">
  <div id="kt_app_content_container" class="app-container container-xxl">
    <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="#" class="user" action="<?php echo site_url('pelanggan_c/update/'. '?id_nama_usaha=' . $id_nama_usaha);?>" method="post" enctype="multipart/form-data">
      <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <div class="card card-flush py-4">
          <div class="card-header">
            <div class="card-title py-5">
              <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Foto Pelanggan</h1>
            </div>
          </div>
          <div class="card-body text-center pt-0">

            <input type="hidden" name="id_nama_usaha" value="<?php echo $id_nama_usaha;?>">
            <input type="hidden" name="fotolama" value="<?=$user['foto'];?>">
            <input type="hidden" name="hp" value="<?=$user['hp'];?>">

            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
              <div class="image-input-wrapper w-150px h-150px" style="background-image: url(<?php echo base_url('assets/upload/foto_pelanggan/') . $user['foto'] ?>)"></div>
              <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Pilih foto" id="btnfoto">
                <i class="bi bi-pencil-fill fs-7"></i>
                <input type="file" name="filefoto" accept=".png, .jpg, .jpeg" />
                <input type="hidden" name="avatar_remove" />
              </label>
              <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                <i class="bi bi-x fs-2"></i>
              </span>
              <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                <i class="bi bi-x fs-2"></i>
              </span>
            </div>
             <div class="text-muted fs-7">Pilih foto dengan format *.png, *.jpg dan *.jpeg </div>
            <div class="text-muted fs-7"></div>
            <br>
                <!--<button type="submit" class="btn btn-primary">Simpan</button>-->
          </div>
        </div>
      </div>
      <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <div class="card card-flush py-4">
          <div class="card-header">
            <div class="card-title">
              <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Data Pelanggan</h1>
            </div>
          </div>
          <br>
          <div class="card-body pt-1">
            <div class="mb-10 fv-row">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="required form-label" for="nama_customer">Nama </label>
                    <input type="text" name="nama_customer" value="<?=$user['nama_customer'];?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="required form-label" for="alamat">Alamat</label>
                    <input type="text" name="alamat" value="<?=$user['alamat'];?>" class="form-control">
                  </div>
                </div>
              </div>
              <div class="card-footer d-flex justify-content-end py-6 px-9 pt-10">
                <a href="<?php echo site_url('pelanggan_c/data_pelanggan/'. '?id_nama_usaha=' . $id_nama_usaha);?>"><button type="button" class="btn btn-danger btn-sm">&nbspClose&nbsp</button></a> &nbsp
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
              </div>
          </div>
        </div>
      </form>

