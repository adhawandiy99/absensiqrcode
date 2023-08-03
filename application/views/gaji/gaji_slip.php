<!-- <link rel="stylesheet" href="<?php echo base_url()  ?>assets/plugins/select2/select2.css"> -->
<link rel="stylesheet" href="<?php echo base_url()  ?>assets/plugins/select2/select2.lte.css">
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
<!-- Main content -->
<section class='content'>
    <section class="invoice">

<div class="row">
    <div class="col-xs-12">
        <h2 class="page-header">
            <i class="fa fa-globe"></i> PT. Lvine Latersia Baratama
            <small class="pull-right"><?php echo $row->alamat ?></small>
        </h2>
    </div>

</div>

<div class="invoice-info border border-primary">
    <div class="invoice-col text-center text-bold">
        SLIP GAJI KARYAWAN
    </div>
    <div class="invoice-col text-center text-bold">
        BULAN <?php echo $row->periode ?>
    </div>
    <div>&nbsp;</div>
    <div class="row">
        <div class="col-md-3">NIK</div><div class="col-md-1 text-right">:</div><div><?php echo $row->id_karyawan ?></div>
    </div>
    <div class="row">
        <div class="col-md-3">NAMA</div><div class="col-md-1 text-right">:</div><div><?php echo $row->nama_karyawan ?></div>
    </div>
    <div class="row">
        <div class="col-md-3">JABATAN</div><div class="col-md-1 text-right">:</div><div><?php echo $row->nama_jabatan ?></div>
    </div>
    <div class="row">
        <div class="col-md-3">STATUS</div><div class="col-md-1 text-right">:</div><div><?php echo $row->status_karyawan ?></div>
    </div>

    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div class="row">
        <div class="col-md-6">
            <div class="text-bold"><u>PENGHASILAN</u></div>
            <div class="row">
                <div class="col-md-3">Gaji Pokok</div><div class="col-md-1 text-right">:</div><div class="col-md-6 text-right"><?php echo number_format($row->gaji) ?></div>
            </div>
            <div class="row">
                <div class="col-md-3">Tj. Jabatan</div><div class="col-md-1 text-right">:</div><div class="col-md-6 text-right"><?php echo number_format($row->tunjangan_jabatan) ?></div>
            </div>
            <div class="row">
                <div class="col-md-3">Tj. Konsumsi</div><div class="col-md-1 text-right">:</div><div class="col-md-6 text-right"><?php echo number_format($row->tunjangan_konsumsi) ?></div>
            </div>
            <div class="row">
                <div class="col-md-3">Tj. Harian</div><div class="col-md-1 text-right">:</div><div class="col-md-6 text-right"><?php echo number_format($row->tunjangan_harian) ?></div>
            </div>
            <div class="row">
                <div class="col-md-3">Bonus Target</div><div class="col-md-1 text-right">:</div><div class="col-md-6 text-right"><?php echo number_format($row->bonus_target) ?></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-bold"><u>POTONGAN</u></div>
            <div class="row">
                <div class="col-md-3">Pph21</div><div class="col-md-1 text-right">:</div><div class="col-md-6 text-right"><?php echo number_format($row->potongan_pph) ?></div>
            </div>
            <div class="row">
                <div class="col-md-3">Asuransi</div><div class="col-md-1 text-right">:</div><div class="col-md-6 text-right"><?php echo number_format($row->potongan_asuransi) ?></div>
            </div>
        </div>
    </div>
    <div class="row text-bold ">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">Total (A)</div><div class="col-md-1 text-right"></div><div class="col-md-6 text-right"><?php echo number_format($row->gaji+$row->tunjangan_jabatan+$row->tunjangan_konsumsi+$row->tunjangan_harian+$row->bonus_target) ?></div>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">Total (B)</div><div class="col-md-1 text-right"></div><div class="col-md-6 text-right"><?php echo number_format($row->potongan_pph+$row->potongan_asuransi) ?></div>
            </div>
        </div>
    </div>
    <div>&nbsp;</div>
    <div class="row">
        <div class="col-md-6">
            <div class="text-bold text-center">PENERIMAAN BERSIH (A-B)</div>
            
        </div>
        <div class="col-md-6">
            <div class="text-bold text-center"><?php echo number_format(($row->gaji+$row->tunjangan_jabatan+$row->tunjangan_konsumsi+$row->tunjangan_harian+$row->bonus_target)-($row->potongan_pph+$row->potongan_asuransi)) ?></div>
        </div>
    </div>
    <div class="text-center"><i>Terbilang : <?php echo terbilang(($row->gaji+$row->tunjangan_jabatan+$row->tunjangan_konsumsi+$row->tunjangan_harian+$row->bonus_target)-($row->potongan_pph+$row->potongan_asuransi)) ?></i></div>

    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div class="col-sm-offset-9"><?php echo date('j F Y') ?></div>
    <div class="col-sm-offset-9">Manager HRD</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div class="col-sm-offset-9">Winarto, S.T.</div>
</div>
</section>
        
</section><!-- /.content -->
<script type="text/javascript">
</script>