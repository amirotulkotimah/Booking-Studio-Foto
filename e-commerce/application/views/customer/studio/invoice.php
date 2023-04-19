<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="client_key"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


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
                            <h1 class="page-heading d-flex text-dark fw-bold fs-1 flex-column justify-content-center my-0">Data Booking</h1>
                          <div class="d-flex justify-content-end py-6 px-9 pt-10">&nbsp&nbsp&nbsp&nbsp
                          
                          </div> 
                          </div>
                        </div>

                        <div class="card-body pt-3">
                          <div class="mb-10 fv-row">

                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Kode Booking </span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?php echo strtoupper($user['kode_order']);?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Nama</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$user['nama_customer'];?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>No. WA</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$user['no_hp'];?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Email</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$user['email'];?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Nama Paket</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$user['nama_produk'];?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Jumlah Orang</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$user['jumlah_orang'];?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Tambahan Orang</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$user['tambahan_orang'];?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Tanggal Booking</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?php echo date_format($created_at,'d-m-Y');?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label class="fs-5 fw-semibold form-label mt-3 ">
                                    <span>Waktu Booking</span>
                                  </label>
                                </div>
                                <div class="col-md-9 pt-3">
                                  <span class="fs-5 fw-semibold form-label mt-3 text-muted"><?=$user['waktu_booking'];?></span>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                      <!--begin::Card widget 17-->
                      <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-10">
                          <div class="card-title">
                            <h1 class="page-heading d-flex text-dark fw-bold fs-1 flex-column justify-content-center my-0">Invoice</h1>
                          </div>
                        </div>
                        <!--end::Header-->
                        <form id="payment-form" method="post" action="<?=site_url()?>/booking_c/finish">
                        <input type="hidden" name="result_type" id="result-type" value="">
                        <input type="hidden" name="result_data" id="result-data" value="">
                        
                        <!--begin::Card body-->
                        <input type="hidden" name="kode_order" id="kode_order" value="<?=$user['kode_order'];?>" class="form-control">
                        <!--<input type="hidden" name="id_usaha" value="1">-->
                        <input type="hidden" name="produk" id="produk" value="<?=$user['nama_produk'];?>" >
                        <input type="hidden" name="nama_customer" id="nama_customer" value="<?=$user['nama_customer'];?>">
                        <input type="hidden" name="no_hp" id="no_hp" value="<?=$user['no_hp'];?>">
                        <input type="hidden" name="email" id="email" value="<?=$user['email'];?>">

                        <div class="card-body ">
                          <div class="row">
                              <div class="col-md-3 pt-3">
                                <label class="fs-5 fw-semibold form-label mt-3 ">
                                  <span>Total Bayar</span>
                                </label>
                              </div>
                            <div class="col-md-9 pt-3">
                              <input type="text" class="form-control bg-dark text-white" id="total" name="total" value="<?= $user['total_harga'];?>">
                            </div>
                          </div>
                        </div>
                        <!--end::Card body-->
                        <div class="card-footer d-flex justify-content-end">
                          <button id="pay-button" class="btn btn-primary ">Bayar!</button>
                        </div>
                      </div>
                    </form>
                      <!--end::Card widget 17-->
                    </div>
                    </div>

    <script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
      var total = $('#total').val();
      var kode_order = $('#kode_order').val();
      var produk = $('#produk').val();
      var nama_customer = $('#nama_customer').val();
      var no_hp = $('#no_hp').val();
      var email = $('#email').val();
    
    $.ajax({
      type: 'POST',
      url: '<?=site_url()?>/booking_c/token',
      data: { 
        total: total, 
        kode_order : kode_order, 
        produk : produk, 
        nama_customer : nama_customer, 
        no_hp : no_hp, 
        email : email
      },
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>




