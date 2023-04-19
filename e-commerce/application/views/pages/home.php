<style>
    .card {
    background-color: #fff;
    border-radius: 10px;
    border: none;
    position: relative;
    margin-bottom: 30px;
    box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
    }
    .l-bg-cherry {
        background: linear-gradient(to right, #493240, #f09) !important;
        color: #fff;
    }

    .l-bg-blue-dark {
        background: linear-gradient(to right, #373b44, #4286f4) !important;
        color: #fff;
    }

    .l-bg-green-dark {
        background: linear-gradient(to right, #0a504a, #38ef7d) !important;
        color: #fff;
    }

    .l-bg-orange-dark {
        background: linear-gradient(to right, #a86008, #ffba56) !important;
        color: #fff;
    }

    .card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {
        font-size: 110px;
    }

    .card .card-statistic-3 .card-icon {
        text-align: center;
        line-height: 50px;
        margin-left: 15px;
        color: #000;
        position: absolute;
        right: -5px;
        top: 20px;
        opacity: 0.1;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }

    .l-bg-green {
        background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
        color: #fff;
    }

    .l-bg-orange {
        background: linear-gradient(to right, #f9900e, #ffba56) !important;
        color: #fff;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

<div class="col-md-10 py-lg-10 px-6">
    <div class="row ">
        <div class="col-xl-4 col-lg-6">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                    <div class="mb-4">
                        <h1 class="card-title mb-0">Income</h1>
                    </div>
                    <br>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-10">
                        <h3>Rp <?php echo number_format("$total_income", 2, ",", ".");?></h3>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="row gy-5 g-xl-10 px-6">
<!--     <div class="col-xl-6">
        <div class="card card-flush h-xl-90">
            <div class="card-header pt-7">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">Order Terbaru</span>
                </h3>
            </div>
            <div class="card-body">
                <div class="hover-scroll-overlay-y pe-6 me-n6" style="height: 220px">
                    <?php foreach ($baru as $baris) : ?>
                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                        <div class="d-flex flex-stack mb-3">
                            <div class="me-3">
                                <a href="<?php echo site_url('penjualan_c/lihat_data_order/'.'?kode_order='. $baris->kode_order . '&id_nama_usaha=' . $baris->id_usaha);?>">
                                <span class="card-label fw-semibold fs-6">#<?php echo $baris->kode_order;?></span></a>
                            </div>
                        </div>
                        <div class="d-flex flex-stack">
                            <span class="text-gray-400 fw-bold">
                                
                            </span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="col-xl-12">
            <div class="card card-flush h-xl-90">
                <div class="card-header pt-7">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Order Terbaru</span>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="text-end pe-3 min-w-70px text-center">Kode Order</th>
                                <th class="text-end pe-3 min-w-70px text-center">Nama</th>
                                <th class="text-end pe-3 min-w-70px text-center">Tanggal Booking</th>
                                <th class="text-end pe-3 min-w-70px text-center">Waktu Booking</th>
                            </tr>
                        </thead>
                        <?php foreach ($baru as $baris) : ?>
                        <tbody class="fw-bold text-gray-600">
                            <tr>
                                <td class="text-end text-center"><a href="<?php echo site_url('penjualan_c/lihat_data_order/'.'?kode_order='. $baris->kode_order . '&id_nama_usaha=' . $baris->id_usaha);?>">
                                <span class="card-label fw-semibold fs-6">#<?php echo strtoupper($baris->kode_order);?></span></a>
                                </td>
                                <td class="text-end text-center"><?php echo $baris->nama_customer;?></td>
                                <td class="text-end text-center"><?php echo date('d-m-Y', strtotime($baris->tanggal_order));?></td>
                                <td class="text-end text-center"><?php echo $baris->waktu_booking;?></td>
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- <div class="col-xl-6">
            <div class="card card-flush h-xl-90">
                <div class="card-header pt-7">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Pembayaran Terbaru</span>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="text-end pe-3 min-w-70px text-center">ID</th>
                                <th class="text-end pe-3 min-w-70px text-center">Nama</th>
                                <th class="text-end pe-3 min-w-70px text-center">Jumlah</th>
                                <th class="text-end pe-3 min-w-70px text-center">Status</th>
                                <th class="text-end pe-3 min-w-70px text-center">Usaha</th> 
                            </tr>
                        </thead>
                        <?php foreach ($bayar as $baris) : ?>
                        <tbody class="fw-bold text-gray-600">
                            <tr>
                                <td class="text-end text-center">#<?php echo $baris->order_id;?></td>
                                <td class="text-end text-center"><?php echo $baris->nama;?></td>
                                <td class="text-end text-center"><?php echo number_format("$baris->gross_amount", 2, ",", ".");?></td>
                                <td class="text-end text-center">
                                    <?php if ($baris->status_code == '200') : ?>
                                    <div class="badge badge-light-danger fs-7">Lunas</div></a>
                                    <?php elseif ($baris->status_code == '201') : ?>
                                    <div class="badge badge-light-primary fs-7">Belum Terbayar</div>
                                    <?php endif ?>
                                </td>
                                <td class="text-end text-center"><?php echo $baris->nama_usaha;?></td>
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div> -->
    </div>
                        