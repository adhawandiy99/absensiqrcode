<!-- <link rel="stylesheet" href="<?php echo base_url()  ?>assets/plugins/select2/select2.css"> -->
<link rel="stylesheet" href="<?php echo base_url()  ?>assets/plugins/select2/select2.lte.css">
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-8'>
            <div class='box'>
                <div class='box-header  with-border'>
                    <h3 class='box-title'>FORMULIR GAJI</h3>
                </div>
                <div class="box-body">
                    <form role="form" id="myForm" data-toggle="validator" action="<?php echo site_url('gaji/save/').$this->uri->segment(3); ?>" method="post">
                        <?php if(!isset($row)){ ?>
                            <div class="row">
                                <div class="form-group col-md-8 has-feedback">
                                    <label for="karyawan_id">Karyawan</label>
                                    <select class="form-control" style="width: 100%;" data-error="Nama Jabatan harus diisi" name="karyawan_id" id="karyawan_id" placeholder="karyawan_id Per Bulan" value="<?php  echo isset($row)?$row->karyawan_id:'' ?>" >
                                        <option></option>
                                        <?php foreach($karyawan as $no => $v){ ?>
                                            <option value="<?php  echo  $v->id ?>" data-karyawanid="<?php  echo  $v->id_karyawan ?>" data-nama="<?php  echo  $v->nama_karyawan ?>" data-keynya="<?php  echo  $no ?>"><?php  echo  $v->nama_karyawan ?></option>
                                        <?php  } ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-4 has-feedback">
                                    <label for="periode">Periode</label>
                                    <select class="form-control" style="width: 100%;" data-error="Periode harus diisi" name="periode" id="periode" placeholder="periode">
                                        <option></option>
                                        <option value="<?php echo date('n')-1 ?>"><?php echo date('n')-1 ?></option>
                                        <option value="<?php echo date('n') ?>"><?php echo date('n') ?></option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                            </div>
                        <?php  }else{ ?>
                            <div class="row">
                                <div class="form-group col-md-8 has-feedback">
                                    <label for="karyawan_id">Karyawan</label>
                                    <input type="text" class="form-control" name="karyawan_id" value="<?php  echo isset($row)?$row->karyawan_id:'' ?>" readonly />
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-4 has-feedback">
                                    <label for="periode">Periode</label>
                                    <input type="text" class="form-control" name="periode" value="<?php  echo isset($row)?$row->periode:'' ?>" readonly />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label for="gaji">Gaji Per Bulan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-error="Nama Jabatan harus diisi" name="gaji" id="gaji" placeholder="Gaji Per Bulan" value="<?php  echo isset($row)?$row->gaji:'' ?>" onkeyup="calculates()" readonly />
                                        <span class="input-group-addon">
                                            <span class="fas fa-plus"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="tunjangan_jabatan">Tunjangan Jabatan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-error="Tunjangan Jabatan harus diisi" name="tunjangan_jabatan" id="tunjangan_jabatan" placeholder="Tunjangan Jabatan Per Bulan" value="<?php  echo isset($row)?$row->tunjangan_jabatan:'' ?>" onkeyup="calculates()" required />
                                        <span class="input-group-addon">
                                            <span class="fas fa-plus"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="tunjangan_konsumsi">Tunjangan Konsumsi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-error="Tunjangan Konsumsi harus diisi" name="tunjangan_konsumsi" id="tunjangan_konsumsi" placeholder="Tunjangan Konsumsi" value="<?php  echo isset($row)?$row->tunjangan_konsumsi:'' ?>" onkeyup="calculates()" required />
                                        <span class="input-group-addon">
                                            <span class="fas fa-plus"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="tunjangan_harian">Tunjangan Harian</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-error="Tunjangan Harian harus diisi" name="tunjangan_harian" id="tunjangan_harian" placeholder="Tunjangan Harian" value="<?php  echo isset($row)?$row->tunjangan_harian:'' ?>" onkeyup="calculates()" required />
                                        <span class="input-group-addon">
                                            <span class="fas fa-plus"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="bonus_target">Bonus Target</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-error="Bonus Target harus diisi" name="bonus_target" id="bonus_target" placeholder="Bonus Target" value="<?php  echo isset($row)?$row->bonus_target:'' ?>" required onkeyup="calculates()" />
                                        <span class="input-group-addon">
                                            <span class="fas fa-plus"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group has-feedback col-md-6">
                                        <label for="potongan_pph_persen">Pph21(%)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" data-error="Potongan pajak harus diisi" name="potongan_pph_persen" id="potongan_pph_persen" placeholder="Potongan Pph Per Bulan" value="<?php  echo isset($row)?$row->potongan_pph_persen:'' ?>" onkeyup="calculates()" readonly />
                                            <span class="input-group-addon">
                                                <span class="fas fa-minus"></span>
                                            </span>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group has-feedback col-md-6">
                                        <label for="potongan_pph">Pph21</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" data-error="Potongan pajak harus diisi" name="potongan_pph" id="potongan_pph" placeholder="Potongan Pph Per Bulan" value="<?php  echo isset($row)?$row->potongan_pph:'' ?>" onkeyup="calculates()" readonly />
                                            <span class="input-group-addon">
                                                <span class="fas fa-minus"></span>
                                            </span>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group has-feedback">
                                    <label for="potongan_asuransi">Potongan Assuransi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-error="Potongan BPJS harus diisi" name="potongan_asuransi" id="potongan_asuransi" placeholder="Gaji Per Bulan" value="<?php  echo isset($row)?$row->potongan_asuransi:'' ?>" onkeyup="calculates()" readonly />
                                        <span class="input-group-addon">
                                            <span class="fas fa-minus"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="potongan_mangkir">Potongan Ketidakhadiran</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-error="Nama Jabatan harus diisi" name="potongan_mangkir" id="potongan_mangkir" placeholder="Potongan Mangkir Per Bulan" value="<?php  echo isset($row)?$row->potongan_mangkir:'' ?>" onkeyup="calculates()" required />
                                        <span class="input-group-addon">
                                            <span class="fas fa-minus"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group has-feedback">
                            <label for="total_gaji">Total Gaji</label>
                            <div class="input-group">
                                <input type="text" class="form-control" data-error="Total Gaji harus diisi" name="total_gaji" id="total_gaji" placeholder="Gaji Per Bulan" value="<?php  echo isset($row)?$row->total_gaji:'' ?>" required />
                                <span class="input-group-addon">
                                    <span class="fas fa-dollar"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-lg btn3d">Save</button>
                            <a href="<?php echo site_url('gaji') ?>" class="btn btn-default btn-lg btn3d">Cancel</a>
                        </div>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        <div class='col-xs-4'>
            <div class='box'>
                <div class='box-header  with-border'>
                    <h3 class='box-title'>Detil</h3>
                </div>
                <div class="box-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                        <label class="col-sm-4 control-label">ID Karyawan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="d_id" value="<?php  echo isset($row)?$row->id_karyawan:'' ?>" placeholder="Pilih Karyawan Terlebih Dahulu" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="d_nama" class="col-sm-4 control-label">Nama Karyawan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="d_nama" value="<?php  echo isset($row)?$row->nama_karyawan:'' ?>" placeholder="Pilih Karyawan Terlebih Dahulu" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="d_jabatan" class="col-sm-4 control-label">Jabatan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="d_jabatan" value="<?php  echo isset($row)?$row->nama_jabatan:'' ?>" placeholder="Pilih Karyawan Terlebih Dahulu" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="d_shift" class="col-sm-4 control-label">Shift</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="d_shift" value="<?php  echo isset($row)?$row->nama_shift:'' ?>" placeholder="Pilih Karyawan Terlebih Dahulu" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="d_lokasi" class="col-sm-4 control-label">Lokasi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="d_lokasi" value="<?php  echo isset($row)?$row->nama_gedung:'' ?>" placeholder="Pilih Karyawan Terlebih Dahulu" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="d_alamat" class="col-sm-4 control-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="d_alamat" value="<?php  echo isset($row)?$row->alamat:'' ?>" placeholder="Pilih Karyawan Terlebih Dahulu" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="d_kehadiran" class="col-sm-4 control-label">Kehadiran</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="d_kehadiran" placeholder="Pilih Karyawan Terlebih Dahulu" name="total_kehadiran" value="<?php  echo isset($row)?$row->total_kehadiran:'' ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="d_alpha" class="col-sm-4 control-label">Alpha</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="d_alpha" placeholder="Pilih Karyawan Terlebih Dahulu" name="total_alpha" value="<?php  echo isset($row)?$row->total_alpha:'' ?>" readonly>
                            </div>
                        </div>

                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo base_url() ?>assets/plugins/select2/select2.full.min.js"></script>
<script type="text/javascript">
    var gapok,tunjangan_jabatan,tunjangan_harian,tunjangan_konsumsi,bonus_target,potongan_pph,potongan_asuransi,potongan_mangkir=0;
    var karyawan = <?= json_encode($karyawan); ?>;
    var data = <?= json_encode($row); ?>;
    console.log(data)
    function calculates(){
        gapok = parseInt($('#gaji').val())
        tunjangan_jabatan = parseInt($('#tunjangan_jabatan').val())
        tunjangan_harian = parseInt($('#tunjangan_harian').val())
        tunjangan_konsumsi = parseInt($('#tunjangan_konsumsi').val())
        bonus_target = parseInt($('#bonus_target').val())

        potongan_pph = parseInt($('#potongan_pph').val())
        potongan_asuransi = parseInt($('#potongan_asuransi').val())
        potongan_mangkir = parseInt($('#potongan_mangkir').val())
        $('#total_gaji').val(gapok+tunjangan_jabatan+tunjangan_harian+tunjangan_konsumsi+bonus_target-potongan_pph-potongan_asuransi-potongan_mangkir)
    }
        $('#karyawan_id').select2().change(function(e){
            var keynya = $(this).find(":selected").data("keynya");
            $('#d_id').val(karyawan[keynya].id_karyawan);
            $('#d_nama').val(karyawan[keynya].nama_karyawan);
            $('#d_jabatan').val(karyawan[keynya].nama_jabatan);
            $('#d_shift').val(karyawan[keynya].nama_shift);
            $('#d_lokasi').val(karyawan[keynya].nama_gedung);
            $('#d_alamat').val(karyawan[keynya].alamat);
            $('#d_kehadiran').val(karyawan[keynya].ttl_hadir);
            $('#d_alpha').val(karyawan[keynya].ttl_absen);
            $('#potongan_mangkir').val(karyawan[keynya].ttl_absen*100000);
            $('#gaji').val(karyawan[keynya].gaji_pokok);
            $('#tunjangan_jabatan').val(karyawan[keynya].tunjangan_jabatan);
            $('#tunjangan_harian').val(karyawan[keynya].tunjangan_harian);
            $('#tunjangan_konsumsi').val(karyawan[keynya].tunjangan_konsumsi);
            $('#bonus_target').val(karyawan[keynya].bonus_target);
            $('#potongan_pph').val(karyawan[keynya].gaji_pokok*karyawan[keynya].persentase_pph21/100);
            $('#potongan_pph_persen').val(karyawan[keynya].persentase_pph21);
            $('#potongan_asuransi').val(karyawan[keynya].potongan_asuransi);
            
            calculates();
        });
</script>