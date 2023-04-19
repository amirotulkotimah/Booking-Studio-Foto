<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style type="text/css">
    p{
        margin: 5px 0 0 0;
        font-family: Arial, Helvetica, sans-serif;
    }
        p.footer{
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
        display: block;
    }
    .bold{
        font-weight: bold;
    }

    #footer {
    clear: both;
    position: relative;
    height: 40px;
    margin-top: -40px;
    }
    </style>
</head>
<body style="font-size: 12px">
    <table width="100%" >
        <tr>
            <td width="50%"><img src="assets/media/logos/logo2.png" style="width: 100px; height:170px;"></td>
        </tr>
    </table>
        
    <p align="center"> 
        <span style="font-size: 24px"><b>Invoice Booking</b></span> <br>
        <span style="font-size: 13px">NO: #<?php echo strtoupper($kode_order);?></span> <br>
    </p>

    <hr>

    <p>
        <table style="font-size: 13px; font-family: Arial, Helvetica, sans-serif;" width="100%">
            <tr>
                <th align="left"> Pelanggan </th>
                <th align="left"> Outlet </th>
                <th align="center" rowspan="3" style="border: 1px solid black; font-size: 15px" align="left">Total Rp <?php echo number_format("$total_harga", 2, ",", ".");?></th>
            </tr>
            <tr>
                <td align="left" style="font-weight: bold; font-size: 15px;"> <?=$user['nama_customer'];?></td>
                <td align="left" style="font-weight: bold; font-size: 15px;"> Self Studio Genixphoto </td>
            </tr>
            <tr><td align="left"> Email: <?=$user['email'];?></td>
                <td align="left"> Jl. Mt. Haryono Gg. 
                9 No.23B,</td>
            </tr>
            <tr>
                <td align="left"> Telp. <?=$user['no_hp'];?></td>
                <td align="left"> Caruban, Krajan, Kec. Mejayan, </td>
                <td align="left">   </td>
            </tr>
            <tr>
                <td align="left"> </td>
                <td align="left"> Kabupaten Madiun, Jawa Timur,</td>
                <td align="left">   </td>
            </tr>
            <tr>
                <td align="left"> </td>
                <td align="left"> 63153</td>
                <td align="left">   </td>
            </tr>
            <tr>
                <td align="left"> </td>
                <td align="left"> Telp. 0811287119</td>
                <td align="left">   </td>
            </tr>
        </table>
        <!-- <table style="font-size: 15px">
            <tr>
                <th align="left"> Kode Booking </th>
                <td> : #<?=$bayar['order_id'];?></td>
            </tr>
            <tr>
                <th align="left"> Nama </th>
                <td> : <?=$bayar['nama'];?></td>
            </tr>
            <tr>
                <th align="left"> Outlet</th>
                <td> : Jl. Mt. Haryono Gg. 9 No.23B, Caruban, Krajan, Kec. Mejayan, Kabupaten Madiun, Jawa Timur 63153, 
                Telp. 0811287119</td>
            </tr>
        </table> -->
    </p>
    <br>

    <p style="font-size: 13px;">
        Jadwal Booking :
    </p>

    <p>

        <table style="border: 1px solid black;border-collapse: collapse;font-size: 13px;font-family: Arial, Helvetica, sans-serif;" width="100%" >
            <tr style="margin: 5px">
                <th style="border: 1px solid black;" align="left">Jenis Paket</th>
                <th style="border: 1px solid black;" align="center">Tanggal Booking</th>
                <th style="border: 1px solid black;" align="center">Waktu booking</th>
                <!-- <th style="border: 1px solid black;" align="center">Tambahan Orang</th> -->
                <th style="border: 1px solid black;" align="center">Harga</th>
            </tr>
            <tr style="margin: 5px">
                <td style="border: 1px solid black;" align="left"><?=$user['nama_produk'];?></td>
                <td style="border: 1px solid black;"align="center"><?php echo date_format($created_at,'d-m-Y');?></td>
                <td style="border: 1px solid black;"align="center"><?=$user['waktu_booking'];?></td>
                <!-- <td style="border: 1px solid black;"align="center"><?=$user['tambahan_orang'];?></td> -->
                <td style="border: 1px solid black;"align="center"><?php echo number_format("$harga_paket", 2, ",", ".");?></td>
            </tr>
             <tr style="margin: 5px" align="center">
                <td style="border: 1px solid black;" colspan="3" align="left"> Tambah Orang <?=$user['tambahan_orang'];?></td>
                <td style="border: 1px solid black;">
                    <?php if ($tambahan_orang == '0') : ?>
                        <?php echo number_format("0", 2, ",", ".");?>
                    <?php elseif ($tambahan_orang == '1') : ?>
                        <?php echo number_format("$harga1", 2, ",", ".");?>
                    <?php elseif ($tambahan_orang == '2') : ?>
                        <?php echo number_format("$harga2", 2, ",", ".");?>
                    <?php elseif ($tambahan_orang == '3') : ?>
                        <?php echo number_format("$harga3", 2, ",", ".");?>
                    <?php elseif ($tambahan_orang == '4') : ?>
                        <?php echo number_format("$harga4", 2, ",", ".");?>
                    <?php elseif ($tambahan_orang == '5') : ?>
                        <?php echo number_format("$harga5", 2, ",", ".");?>
                    <?php elseif ($tambahan_orang == '6') : ?>
                        <?php echo number_format("$harga6", 2, ",", ".");?>
                    <?php elseif ($tambahan_orang == '7') : ?>
                        <?php echo number_format("$harga7", 2, ",", ".");?>
                    <?php elseif ($tambahan_orang == '8') : ?>
                        <?php echo number_format("$harga8", 2, ",", ".");?>
                    <?php elseif ($tambahan_orang == '9') : ?>
                        <?php echo number_format("$harga9", 2, ",", ".");?>
                    <?php elseif ($tambahan_orang == '10') : ?>
                        <?php echo number_format("$harga10", 2, ",", ".");?>
                    <?php endif ?>
                    <!-- <?php echo number_format("$total_tambah_orang", 2, ",", ".");?> -->
                        
                    </td>
            </tr>
            <tr style="margin: 5px" align="center">
                <td style="border: 1px solid black;" colspan="3" align="left"> Tambah Cetak <?=$user['tambahan_cetak'];?></td>
                <td style="border: 1px solid black;"><?php echo number_format("$total_tambah_cetak", 2, ",", ".");?></td>
            </tr>
            <tr style="margin: 5px" align="center">
                <td style="border: 1px solid black;" colspan="3" align="left"> Tambah Waktu
                    <?php if ($tambahan_waktu == '0') : ?>
                        0 
                    <?php elseif ($tambahan_waktu == '1') : ?>
                        5 menit  
                    <?php elseif ($tambahan_waktu == '2') : ?>
                        10 menit
                    <?php elseif ($tambahan_waktu == '3') : ?>
                        15 menit
                    <?php elseif ($tambahan_waktu == '4') : ?>
                        20 menit
                    <?php elseif ($tambahan_waktu == '5') : ?>
                        25 menit
                    <?php elseif ($tambahan_waktu == '6') : ?>
                        30 menit
                    <?php elseif ($tambahan_waktu == '7') : ?>
                        35 menit
                    <?php elseif ($tambahan_waktu == '8') : ?>
                        40 menit
                    <?php elseif ($tambahan_waktu == '10') : ?>
                        45 menit
                    <?php elseif ($tambahan_waktu == '11') : ?>
                        50 menit
                    <?php elseif ($tambahan_waktu == '12') : ?>
                        55 menit
                    <?php elseif ($tambahan_waktu == '13') : ?>
                        1 jam
                    <?php endif ?></td>
                <td style="border: 1px solid black;"><?php echo number_format("$total_tambah_waktu", 2, ",", ".");?></td>
            </tr>
            <!-- <tr style="margin: 5px" align="center">
                <td style="border: 1px solid black;" colspan="3" align="left"> Subtotal</td>
                <td style="border: 1px solid black;">Rp <?php echo number_format("$total_harga", 2, ",", ".");?></td>
            </tr> -->
            <!-- <tr style="margin: 5px" align="center">
                <td style="border: 1px solid black;" colspan="4" align="left"> </td>
            </tr>
            <tr style="margin: 5px" align="center">
                <td style="border: 1px solid black;" colspan="3" align="left"> Bayar Non Tunai</td>
                <td style="border: 1px solid black;">Rp <?php echo number_format("$gross_amount", 2, ",", ".");?></td>
            </tr>
            <tr style="margin: 5px" align="center">
                <td style="border: 1px solid black;" colspan="3" align="left"> Bayar Tunai</td>
                <td style="border: 1px solid black;">Rp <?php echo number_format("$total_bayar", 2, ",", ".");?></td>
            </tr> -->
        </table>
        <!-- 
        <table style="border: 1px solid black;border-collapse: collapse;font-size: 15px" width="100%" >
            <tr style="margin: 5px" align="center">
                <th style="border: 1px solid black;">Jenis Paket</th>
                <th style="border: 1px solid black;">Tanggal Booking</th>
                <th style="border: 1px solid black;">Waktu booking</th>
                <th style="border: 1px solid black;">Tambahan Orang</th>
            </tr>
            <tr style="margin: 5px" align="center">
                <td style="border: 1px solid black;"><?=$user['nama_produk'];?></td>
                <td style="border: 1px solid black;"><?php echo date_format($created_at,'d-m-Y');?></td>
                <td style="border: 1px solid black;"><?=$user['waktu_booking'];?></td>
                <td style="border: 1px solid black;"><?=$user['tambahan_orang'];?></td>
            </tr>
            <tr style="margin: 5px" align="center">
                <td style="border: 1px solid black;" colspan="4">Total</td>
                <td style="border: 1px solid black;"></td>
            </tr>

        </table> -->


    </p>

    <br>    
    
    <p style="font-size: 13px" class="bold">
        Keterangan Invoice :
    </p>

        <table style="font-size: 13px;font-family: Arial, Helvetica, sans-serif;" align="right">
            <!-- <tr>
                <td > Tanggal Transaksi </td>
                <td> <?=$bayar['transaction_time'];?></td>
            </tr>
            <tr>
                <td> Bank </td>
                <td> <?=$bayar['bank'];?></td>
            </tr> -->
            <tr>
                <td >  Subtotal</td>
                <td> <?php echo number_format("$total_harga", 2, ",", ".");?></td>
            </tr>
            <!-- <tr>
                <td>  </td>
                <td></td>
            </tr>
            <tr>
                <td>  </td>
                <td></td>
            </tr> -->
            <tr>
                <td>  Pajak</td>
                <td> 0</td>
            </tr>
            <tr>
                <td>  Service Change</td>
                <td> 0</td>
            </tr>

            <!-- <tr>
                <td>  Status</td>
                <?php if ($status == 'selesai') : ?>
                <td><b>Lunas</b></td>
                <?php endif ?>
            </tr> -->

        </table>
        <br><br><br><br>
        <hr>
        <table style="font-size: 13px; font-family: Arial, Helvetica, sans-serif;" width="100%">
            <tr>
                <th align="left" style="color: white;"> Pelanggan </th>
                <th align="left" style="color: white;"> OutletOutletOutletOutlet </th>
                <th align="center" rowspan="3" style="border: 1px solid black; font-size: 15px" align="left">Grand Total Rp <?php echo number_format("$total_harga", 2, ",", ".");?></th>
            </tr>
            
        </table>

</body>
</html>