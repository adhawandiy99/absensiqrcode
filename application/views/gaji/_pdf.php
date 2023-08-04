
<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>PDF</title>
    
</head>
<?php

function terbilang($x) {
  $angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];

  if ($x < 12)
    return " " . $angka[$x];
  elseif ($x < 20)
    return terbilang($x - 10) . " belas";
  elseif ($x < 100)
    return terbilang($x / 10) . " puluh" . terbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . terbilang($x - 100);
  elseif ($x < 1000)
    return terbilang($x / 100) . " ratus" . terbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . terbilang($x - 1000);
  elseif ($x < 1000000)
    return terbilang($x / 1000) . " ribu" . terbilang($x % 1000);
  elseif ($x < 1000000000)
    return terbilang($x / 1000000) . " juta" . terbilang($x % 1000000);
}
?>
<body>
<section class='content'>
    <div class="invoice print" id="print">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header" style="text-align: center;">
                    <i class="fa fa-globe"></i> PT. Lvine Latersia Baratama<br/>
                    <small><?php echo $row->alamat ?></small>
                </h2>
            </div>

        </div>

        <div class="invoice-info border border-primary">
            <div style="text-align: center;font-style:bold;">
                SLIP GAJI KARYAWAN
            </div>
            <div style="text-align: center;font-style:bold;">
                PERIODE BULAN <?php echo $row->periode ?>
            </div>
            <div>&nbsp;</div>
                <table>
                    <tr><td>NIK</td><td>:</td><td><?php echo $row->id_karyawan ?></td></tr>
                    <tr><td>NAMA</td><td>:</td><td><?php echo $row->nama_karyawan ?></td></tr>
                    <tr><td>JABATAN</td><td>:</td><td><?php echo $row->nama_jabatan ?></td></tr>
                    <tr><td>STATUS</td><td>:</td><td><?php echo $row->status_karyawan ?></td></tr>
                </table>

            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div class="row">
                <table style="width:100%">
                    <tr><td colspan="3"><u><b>PENGHASILAN</b></u></td><td style="width:30%">&nbsp;</td><td colspan="3"><u><b>POTONGAN</b></u></td></tr>
                    <tr>
                        <td>Gaji Pokok</td><td>:</td><td style="text-align: right;"><?php echo number_format($row->gaji) ?></td><td></td>
                        <td>Pph21</td><td>:</td><td style="text-align: right;"><?php echo number_format($row->potongan_pph) ?></td>
                    </tr>
                    <tr>
                        <td>Tj. Jabatan</td><td>:</td><td style="text-align: right;"><?php echo number_format($row->tunjangan_jabatan) ?></td><td></td>
                        <td>Asuransi</td><td>:</td><td style="text-align: right;"><?php echo number_format($row->potongan_asuransi) ?></td>
                    </tr>
                    <tr><td>Tj. Konsumsi</td><td>:</td><td style="text-align: right;"><?php echo number_format($row->tunjangan_konsumsi) ?></td></tr>
                    <tr><td>Tj. Harian</td><td>:</td><td style="text-align: right;"><?php echo number_format($row->tunjangan_harian) ?></td></tr>
                    <tr><td>Bonus Target</td><td>:</td><td style="text-align: right;"><?php echo number_format($row->bonus_target) ?></td></tr>


                    <tr style="font-style:bold;">
                        <td>Total (A)</td><td>:</td><td style="text-align: right;"><?php echo number_format($row->gaji+$row->tunjangan_jabatan+$row->tunjangan_konsumsi+$row->tunjangan_harian+$row->bonus_target) ?></td><td></td>
                        <td>Total (B)</td><td>:</td><td style="text-align: right;"><?php echo number_format($row->gaji+$row->tunjangan_jabatan+$row->tunjangan_konsumsi+$row->tunjangan_harian+$row->bonus_target) ?></td>
                    </tr>
                </table>
            </div>
            <div>&nbsp;</div>
            <div style="text-align: center;font-style:bold;">PENERIMAAN BERSIH (A-B) : <?php echo number_format(($row->gaji+$row->tunjangan_jabatan+$row->tunjangan_konsumsi+$row->tunjangan_harian+$row->bonus_target)-($row->potongan_pph+$row->potongan_asuransi)) ?></div>
            </div>
            <div style="text-align: center;font-style:bold;"><i>Terbilang : <?php echo terbilang(($row->gaji+$row->tunjangan_jabatan+$row->tunjangan_konsumsi+$row->tunjangan_harian+$row->bonus_target)-($row->potongan_pph+$row->potongan_asuransi)) ?></i></div>

            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <table style="width:100%;">
                <tr><td style="width:70%;">&nbsp;</td><td><?php echo date('j F Y') ?></td></tr>
                <tr><td style="width:70%;">&nbsp;</td><td>Manager HRD</td></tr>
                <tr><td style="width:70%;">&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td style="width:70%;">&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td style="width:70%;">&nbsp;</td><td>Winarto, S.T.</td></tr>
            </table>
        </div>
        
</section>
</body>
</html>