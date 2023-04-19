
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
                        <div class="card-header pt-5">
                          <div class="card-title">
                            <h1 class="page-heading d-flex text-dark fw-bold fs-1 flex-column justify-content-center my-0">Formulir Booking</h1>
                          <div class="d-flex justify-content-end py-6 px-9 pt-10">&nbsp&nbsp&nbsp&nbsp
                          <!--<a href="<?php echo site_url('booking_c/jadwal_booking/');?>" class="btn btn-primary btn-sm">Cek Jadwal</a>-->
                          </div> 
                          </div>
                        </div>

                        <form class="user" action="<?php echo site_url('booking_c/input/'. '?kode_order=' . $kode);?>" method="post" enctype="multipart/form-data">

                        <!--<input type="hidden" name="harga" id="harga" value="" class="form-control">-->
                        <input type="hidden" name="jumlah_orang" id="jumlah_orang" value="" class="form-control">
                        <input type="hidden" name="kode_order" value="<?=$kode;?>" class="form-control">
                        <input type="hidden" name="id_usaha" value="1">
                        <input type="hidden" name="produk" value="<?=$produk['id_produk'];?>">

                        <div class="card-body pt-4">
                          <div class="mb-10 fv-row">
                            <div class="row">
                              <div class="col-md-15">
                                <div class="form-group pt-5">
                                  <label class="form-label" for="paket">Paket</label>
                                  <div class="col-sm-14">
                                    <select class="form-control" id="paket" name="produk" >
                                      <option value="" hidden disabled selected><?=$produk['nama_produk'];?></option>
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
                                      url : "<?php echo site_url();?>/booking_c/get_harga",
                                      method : "POST",
                                      data : {id_produk: id_produk},
                                      async : false,
                                      dataType : 'json',
                                      success: function(data){
                                        $.each(data,function(harga, harga_tambah_perorang, jumlah_orang){
                                          $('[name="harga"]').val(data.harga);
                                          $('[name="harga_tambah_perorang"]').val(data.harga_tambah_perorang);
                                          $('[name="jumlah_orang"]').val(data.jumlah_orang);
                                          $('[name="total"]').val('');
                                          $('[name="jumlah_tambah_orang"]').val('');
                                      });
                                      }
                                    });
                                  });
                                });
                                </script>
                                <div class="form-group pt-5">
                                  <label class="required form-label" for="harga">Harga</label>
                                  <input type="text" name="harga" id="harga" value="<?=$produk['harga'];?>" class="form-control" readonly="">
                                </div>
                                <div class="form-group pt-5">
                                  <label class="required form-label" for="nama">Nama</label>
                                  <input type="text" name="nama_booking" value="" class="form-control" required="">
                                </div>
                                <div class="form-group pt-5">
                                  <label class="required form-label" for="hp">No. WA</label>
                                    <input class="form-control" type="text" value="" name="no_hp" required="">
                                </div>
                                <div class="form-group pt-5">
                                  <label class="required form-label" for="jumlah">Email</label>
                                  <input type="text" name="email" value="" class="form-control" required="">
                                </div>
                                <div class="form-group pt-5">
                                  <label class="required form-label" for="harga">Jumlah Orang</label>
                                  <input type="text" name="jumlah_orang" id="jumlah_orang" value="<?=$produk['jumlah_orang'];?>" class="form-control" readonly="">
                                </div>
                                <div class="form-group pt-5">
                                  <label class="required form-label" for="">Tambah Orang</label>
                                  <input type="" name="jumlah_tambah_orang" id="jumlah_tambah_orang" value="" class="form-control" required="" >
                                  <div class="text-muted fs-7">Jika tidak ingin menambah orang, masukkan angka 0.</div>
                                </div>

                                <div class="form-group pt-5">
                                  <label class="required form-label" for="jumlah_orang">Tanggal</label>
                                  <input type="date" name="tanggal_order" value="<?=$tanggal;?>" class="form-control" readonly>
                                </div>
                                <div class="form-group pt-5">
                                  <label class="required form-label" for="harga">Waktu</label>
                                  <input type="" name="waktu_booking" value="<?=$waktu;?>" class="form-control"readonly>
                                </div>
                              <div class="form-group pt-5">
                                <label for="exampleFormControlInput1" class="required form-label" class="font-weight">Catatan</label class="font-weight-bold" style="color: #292f4a;">
                                <textarea class="form-control input-default" type="text" name="catatan"  style="width: 100%; height: 80px; resize: none;" required ></textarea>
                              </div>
                            </div>
                            <div class="form-group pt-5">
                                  <label class="required form-label" for="harga">Total Harga</label>
                                    <div class="input-group mb-8">
                                        <span class="input-group-text">Rp</span>
                                        <input class="form-control" type="text" value="" name="total" id="total" readonly>
                                    </div>
                                    <input type="hidden" name="harga_tambah_perorang" value="<?=$produk['harga_tambah_perorang'];?>" id="harga_tambah_perorang" class="form-control" >
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $("#jumlah_tambah_orang, #harga_tambah_perorang, #harga").keyup(function() {
                                                    var jumlah_tambah_orang  = $("#jumlah_tambah_orang").val();
                                                    var harga_tambah_perorang = $("#harga_tambah_perorang").val();
                                                    var harga = $("#harga").val();

                                                    var total = parseInt(harga) + parseInt(harga_tambah_perorang) * parseInt(jumlah_tambah_orang);
                                                    $("#total").val(total);
                                                });
                                            });
                                        </script>
                                      </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9 pt-10">
                              <button type="submit" class="btn btn-primary ">Pesan</button>
                            </div>
                        </div>
                      </div>
                    </form>
                    </div>
                      <!--end::Card widget 7-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                      <!--begin::Card widget 17-->
                      <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                          <div class="card-title">
                            <h1 class="page-heading d-flex text-dark fw-bold fs-1 flex-column justify-content-center my-0">Informasi Booking</h1>
                          </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body ">
                          <span class="fw-semibold text-gray-600 fs-6 mb-8 d-block">
                            => Dengan membooking Anda menyetujui segala kebijakan kami
                          </span>
                          <span class="fw-semibold text-gray-600 fs-6 mb-8 d-block">
                            => Silahkan memilih tanggal pemotretan Anda, perlu diingat jadwal pemotretan mungkin akan ada yang sudah dibooking. Jadi jika jadwal ditemukan sudah dibooking harap pilih jadwal yang lain.
                          </span>
                          <span class="fw-semibold text-gray-600 fs-6 mb-8 d-block">
                            => Harap datang tepat waktu, apabila telat lebih dari 15 menit maka kami anggap membatalkan pembookingan 
                          </span>
                          <span class="fw-semibold text-gray-600 fs-6 mb-8 d-block">
                            => Atas kerjasamanya kami ucapkan terima kasih
                          </span>
                        </div>
                        <!--end::Card body-->
                      </div>
                      <!--end::Card widget 17-->
                    </div>
                    </div>
                    <!--end::Col-->




