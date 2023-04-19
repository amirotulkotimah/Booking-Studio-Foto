<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
  <div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
      <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
          <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Booking Form</h1>
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
              <li class="breadcrumb-item text-muted">Tambah Order</li>
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
    <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="#" class="user" action="<?php echo site_url('produk_c/input/'. '?id_nama_usaha=' . $id_nama_usaha);?>" method="post" enctype="multipart/form-data">
    </form>
      
      <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <div class="card card-flush py-4">
          <div class="card-header">
            <div class="card-title">
              <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Formulir Booking</h1>
            </div>
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
              <div class="w-10 mw-150px">
                <!-- <form action="<?php echo site_url('penjualan_c/cek_tanggal/');?>" method="get" >
                  <label class="form-label fw-semibold">Tanggal :</label>
                    <input type="date" name="tanggal" value="" class="form-control">
                    <input type="hidden" name="id_nama_usaha" value="<?=$id_nama_usaha?>" class="form-control">
                </div>
                <div class="pt-4">
                <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                </div> 
                </form> -->
              </div>
              </div>
          </div>
          <br>
          <form action="<?php echo site_url('penjualan_c/input/'.'?id_nama_usaha='. $id_nama_usaha);?>" method="post" enctype="multipart/form-data">
              <!--begin::Card body-->
            <div class="card-body pt-0">
            <div class="mb-10 fv-row">
            <input type="hidden" name="jumlah_orang" id="jumlah_orang" value="">
            <input type="hidden" name="kode_order" value="<?=$kode;?>">
            <!-- <input type="hidden" name="id_usaha" value="<?=$id_nama_usaha;?>"> -->
            <input type="hidden" id="harga_tambah_perorang" name="harga_tambah_perorang" value="">
            <input type="hidden" id="harga_tambah_cetak" name="harga_tambah_cetak" value="" >
            <input type="hidden" id="harga_tambah_waktu" name="harga_tambah_waktu" value="">
            <input type="hidden" name="harga" id="harga" value="">

            	<div class="row">
            		<div class="col-md-6">
            			<div class="form-group">
                    <label class="required form-label" for="paket">Paket</label>
                      <div class="col-sm-14">
                        <select class="form-control" id="paket" name="produk">
                          <option value="" hidden disabled selected>--Pilih--</option>
                          <?php foreach($data->result() as $row):?>
                          <option value="<?php echo $row->id_produk;?>"><?php echo $row->nama_produk;?></option>
                          <?php endforeach;?>
                          </select>
                      </div>
                  </div>
                  <script type="text/javascript">

                        $(document).ready(function(){
                            $('#paket').change(function(){
                                var id_produk=$(this).val();
                                $.ajax({
                                	url : "<?php echo site_url();?>/penjualan_c/get_harga",
                                    method : "POST",
                                    data : {id_produk: id_produk},
                                    async : false,
                                    dataType : 'json',
                                    success: function(data){
                                    $.each(data,function(harga, harga_tambah_perorang, harga_tambah_cetak, harga_tambah_waktu, jumlah_orang){
                                    	$('[name="harga"]').val(data.harga);
                                        $('[name="harga_tambah_perorang"]').val(data.harga_tambah_perorang);
                                        $('[name="harga_tambah_cetak"]').val(data.harga_tambah_cetak);
                                        $('[name="harga_tambah_waktu"]').val(data.harga_tambah_waktu);
                                        $('[name="jumlah_orang"]').val(data.jumlah_orang);
                                        $('[name="tambah_orang"]').val('');
                                        $('[name="tambah_cetak"]').val('');
                                        $('[name="tambah_waktu"]').val('');
                                        $('[name="total"]').val('');
                                    });
                                	}
                                });
                            });
                        });
                        </script>
            			  <div class="form-group">
	                		<label for="exampleFormControlInput1" class="required form-label">Nama</label>
	                		<input type="text" placeholder="" class="form-control" name="nama_booking" value="" >
	                		<span class="font-13 text-muted"></span>
	                	</div>
	                	<div class="form-group">
	                		<label for="exampleFormControlInput1" class="required form-label">No. HP</label>
	                		<input type="text" placeholder="" data-mask="" class="form-control" name="no_hp" value="">
	                		<span class="font-13 text-muted"> </span>
	                	</div>
	                	<div class="form-group">
	                		<label for="exampleFormControlInput1" class="required form-label">Tanggal</label>
	                		<input type="date" class="form-control" name="tanggal_order">
	                		<span class="font-13 text-muted"></span>
	                	</div>
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
                        <div class="form-group">
                          <label class="required form-label" for="">Tambah Waktu</label>
                          <div class="row">
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
                          <label class="required form-label" for="harga">Total Harga</label>
                          <div class="input-group mb-8">
                            <span class="input-group-text">Rp</span>
                            <input class="form-control" type="text" value="" name="total" id="total"  readonly="" >
                          </div>
                          <script type="text/javascript">
                            $(document).ready(function() {
                              $("#tambah_orang, #tambah_cetak, #tambah_waktu, #harga, #harga_tambah_perorang, #harga_tambah_cetak, #harga_tambah_waktu, #tambah_cetak_awal, #tambah_waktu_awal").change(function() {
                                var tambah_orang  = $("#tambah_orang").val();
                                var tambah_cetak = $("#tambah_cetak").val();
                                var tambah_waktu = $("#tambah_waktu").val();
                                var harga = $("#harga").val();
                                var harga_tambah_perorang = $("#harga_tambah_perorang").val();
                                var harga_tambah_cetak = $("#harga_tambah_cetak").val();
                                var harga_tambah_waktu = $("#harga_tambah_waktu").val();

                                var total = parseInt(tambah_waktu) * parseInt(harga_tambah_waktu) + parseInt(tambah_orang) * parseInt(harga_tambah_perorang) + parseInt(tambah_cetak) * parseInt(harga_tambah_cetak) + parseInt(harga);

                                $("#total").val(total);
                              });
                            });
                          </script>
                      </div>
                      <div class="form-group">
                      <label class="required form-label" for="">Metode Pembayaran</label>
                        <div class="row">
                          <div class="col-md-15">
                            <select name="metode_bayar" id="metode_bayar" class="form-control">
                              <option >--pilih--</option>
                              <option value="2">Tunai</option>
                              <option value="1">Non Tunai</option>
                            </select>
                          </div>
                        </div>
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
	                </div>
	                <div class="col-md-6">
	                	<div class="form-group">
	                		<label for="exampleFormControlInput1" class="required form-label">Harga</label>
	                		<input type="text" placeholder=""  class="form-control" name="harga" id="harga" value="">
	                		<span class="font-13 text-muted"> </span>
	                	</div>
	                	
                    <div class="form-group">
                      <label for="exampleFormControlInput1" class="required form-label">Jumlah Orang</label>
                      <input type="text" placeholder=""  class="form-control" name="jumlah_orang" id="jumlah_orang" value="">
                      <span class="font-13 text-muted"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1" class="required form-label">Email</label>
                      <input type="text" placeholder=""  class="form-control" name="email" value="">
                      <span class="font-13 text-muted"></span>
                    </div>
	                	<div class="form-group">
	                		<label for="exampleFormControlInput1" class="required form-label">Waktu Booking</label>
	                		<div class="row">
                            <div class="col-md-15">
                              <select name="waktu_booking" id="" class="form-control">
                                <option >--pilih--</option>
                                <option value="06:00-07:00">06:00-07:00</option>
                                <option value="07:00-08:00">07:00-08:00</option>
                                <option value="08:00-09:00">08:00-09:00</option>
                                <option value="09:00-10:00">09:00-10:00</option>
                                <option value="10:00-11:00">10:00-11:00</option>
                                <option value="11:00-12:00">11:00-12:00</option>
                                <option value="12:00-13:00">12:00-13:00</option>
                                <option value="13:00-14:00">13:00-14:00</option>
                                <option value="14:00-15:00">14:00-15:00</option>
                                <option value="15:00-16:00">15:00-16:00</option>
                                <option value="16:00-17:00">16:00-17:00</option>
                                <option value="17:00-18:00">17:00-18:00</option>
                                <option value="18:00-19:00">18:00-19:00</option>
                                <option value="19:00-20:00">19:00-20:00</option>
                              </select>
                            </div>
                          </div>
	                	</div>
	                	<div class="form-group">
                      <label class="required form-label" for="">Tambah Cetak</label>
                        <div class="row">
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