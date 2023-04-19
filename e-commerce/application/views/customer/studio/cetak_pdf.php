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
        <span style="font-size: 13px">NO: #<?=$bayar['order_id'];?></span> <br>
    </p>

    <hr>

    <p>
        <table style="font-size: 13px; font-family: Arial, Helvetica, sans-serif;" width="100%">
            <tr>
                <th align="left"> Pelanggan </th>
                <th align="left"> Outlet </th>
                <th align="center" rowspan="3" style="border: 1px solid black;" align="left">Total Rp <?php echo number_format("$gross_amount", 2, ",", ".");?></th>
            </tr>
            <tr>
                <td align="left" style="font-weight: bold; font-size: 15px;"> <?=$bayar['nama'];?></td>
                <td align="left" style="font-weight: bold; font-size: 15px;"> Self Studio Genixphoto </td>
            </tr>
            <tr><td align="left"> Email: <?=$bayar['email'];?></td>
                <td align="left"> Jl. Mt. Haryono Gg. 
                9 No.23B,</td>
            </tr>
            <tr>
                <td align="left"> Telp. <?=$bayar['no_hp'];?></td>
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
                <th style="border: 1px solid black;" align="center">Tambahan Orang</th>
                <th style="border: 1px solid black;" align="center">Harga</th>
            </tr>
            <tr style="margin: 5px">
                <td style="border: 1px solid black;" align="left"><?=$user['nama_produk'];?></td>
                <td style="border: 1px solid black;"align="center"><?php echo date_format($created_at,'d-m-Y');?></td>
                <td style="border: 1px solid black;"align="center"><?=$user['waktu_booking'];?></td>
                <td style="border: 1px solid black;"align="center"><?=$user['tambahan_orang'];?></td>
                <td style="border: 1px solid black;"align="center"><?php echo number_format("$gross_amount", 2, ",", ".");?></td>
            </tr>
            <tr style="margin: 5px" align="center">
                <td style="border: 1px solid black;" colspan="4" align="left">  Total</td>
                <td style="border: 1px solid black;">Rp <?php echo number_format("$gross_amount", 2, ",", ".");?></td>
            </tr>
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
            <tr>
                <td > Tanggal Transaksi </td>
                <td> <?=$bayar['transaction_time'];?></td>
            </tr>
            <tr>
                <td> Bank </td>
                <td> <?=$bayar['bank'];?></td>
            </tr>
            <tr>
                <td>  VA Number</td>
                <td> <?=$bayar['va_number'];?></td>
            </tr>
            <tr>
                <td>  Total Bayar</td>
                <td> Rp <?php echo number_format("$gross_amount", 2, ",", ".");?></td>
            </tr>
            <tr>
                <td>  Status</td>
                 <?php if ($bayar['status_code'] == '200') : ?>
                <td><b>Lunas</b></td>
            <?php endif ?>
            </tr>
        </table>

</body>
</html>