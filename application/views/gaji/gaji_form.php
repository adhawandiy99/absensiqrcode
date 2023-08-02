<!-- <link rel="stylesheet" href="<?php echo base_url()  ?>assets/plugins/select2/select2.css"> -->
<link rel="stylesheet" href="<?php echo base_url()  ?>assets/plugins/select2/select2.lte.css">
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header  with-border'>
                    <h3 class='box-title'>FORMULIR GAJI</h3>
                </div>
                <div class="box-body">
                    <form role="form" id="myForm" data-toggle="validator" action="<?php echo site_url('gaji/save/').$this->uri->segment(3); ?>" method="post">
                        <div class="form-group has-feedback">
                            <label for="karyawan_id">Karyawan</label>
                                <select class="form-control" style="width: 100%;" data-error="Nama Jabatan harus diisi" name="karyawan_id" id="karyawan_id" placeholder="karyawan_id Per Bulan" value="<?php  echo isset($row)?$row->karyawan_id:'' ?>" >
                                    <option></option>

                                    <?php  foreach($karyawan as $v){ ?>
                                        <option value="<?php  echo  $v->id ?>" data-karyawanid="<?php  echo  $v->id_karyawan ?>" data-nama="<?php  echo  $v->nama_karyawan ?>"><?php  echo  $v->nama_karyawan ?></option>
                                    <?php  } ?>
                                </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="gaji"> Gaji Per Bulan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" data-error="Nama Jabatan harus diisi" name="gaji" id="gaji" placeholder="Gaji Per Bulan" value="<?php  echo isset($row)?$row->gaji:'' ?>" required />
                                <span class="input-group-addon">
                                    <span class="fas fa-briefcase"></span>
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
    </div><!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo base_url() ?>assets/plugins/select2/select2.full.min.js"></script>
<script type="text/javascript">
    var karyawan = <?= json_encode($karyawan); ?>;
    // var karyawan = [{'id':1,'text':'asd'},{'id':2,'text':'dsa'}];
    $('#karyawan_id').select2().change(function(e){
        console.log($(this).find(":selected").data("karyawanid"))
    });
</script>