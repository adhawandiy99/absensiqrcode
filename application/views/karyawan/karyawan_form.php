<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-<?=$box;?>'>
                <div class='box-header  with-border'>
                    <h3 class='box-title'>FORMULIR ANGGOTA</h3>
                </div>
                <div class="box-body">
                    <form role="form" id="myForm" data-toggle="validator" action="<?php echo $action; ?>" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nama_karyawan" class="control-label">Nama Karyawan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" data-error="Nama Anggota harus diisi" placeholder="Nama Karyawan" value="<?php echo isset($karyawan->nama_karyawan)?$karyawan->nama_karyawan:''; ?>" required />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </span>
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jabatan" class="control-label">Jabatan<?php echo form_error('jabatan') ?></label>
                                <div class="input-group">
                                    <?php echo cmb_dinamis('jabatan', 'jabatan', 'jabatan', 'nama_jabatan', 'id_jabatan', $jabatan) ?>
                                    <span class="input-group-addon">
                                        <span class="fas fa-briefcase"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="gedung_id" class="control-label">Penempatan<?php echo form_error('gedung') ?></label>
                                <div class="input-group">
                                    <?php echo cmb_dinamis('gedung_id', 'gedung_id', 'gedung', 'alamat', 'gedung_id', $gedung_id) ?>
                                    <span class="input-group-addon">
                                        <span class="fas fa-location-arrow"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_shift" class="control-label">Shift<?php echo form_error('shfit') ?></label>
                                <div class="input-group">
                                    <?php echo cmb_dinamis('id_shift', 'id_shift', 'shift', 'nama_shift', 'id_shift', $id_shift) ?>
                                    <span class="input-group-addon">
                                        <span class="fas fa-retweet"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gaji_pokok" class="control-label">Gaji Pokok</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" data-error="Gaji Pokok harus diisi" placeholder="Gaji Pokok" value="<?php echo isset($karyawan->gaji_pokok)?$karyawan->gaji_pokok:''; ?>" required />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="tunjangan_jabatan" class="control-label">Tunjangan Jabatan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="tunjangan_jabatan" id="tunjangan_jabatan" data-error="Tunjangan Jabatan harus diisi" placeholder="Tunjangan Jabatan" value="<?php echo isset($karyawan->tunjangan_jabatan)?$karyawan->tunjangan_jabatan:''; ?>" required />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="tunjangan_konsumsi" class="control-label">Tunjangan Konsumsi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="tunjangan_konsumsi" id="tunjangan_konsumsi" data-error="Tunjangan Konsumsi harus diisi" placeholder="Tunjangan Konsumsi" value="<?php echo isset($karyawan->tunjangan_konsumsi)?$karyawan->tunjangan_konsumsi:''; ?>" required />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="tunjangan_harian" class="control-label">Tunjangan Harian</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="tunjangan_harian" id="tunjangan_harian" data-error="Tunjangan Harian harus diisi" placeholder="Tunjangan Harian" value="<?php echo isset($karyawan->tunjangan_harian)?$karyawan->tunjangan_harian:''; ?>" required />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="bonus_target" class="control-label">Bonus Target</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="bonus_target" id="bonus_target" data-error="Bonus Target harus diisi" placeholder="Bonus Target" value="<?php echo isset($karyawan->bonus_target)?$karyawan->bonus_target:''; ?>" required />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="persentase_pph21" class="control-label">Persentasi Pph21</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="persentase_pph21" id="persentase_pph21" data-error="Persentasi PPH harus diisi" placeholder="Persentasi PPH" value="<?php echo isset($karyawan->tunjangan_jabatan)?$karyawan->tunjangan_jabatan:''; ?>" required />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-minus"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="potongan_asuransi" class="control-label">Potongan Asuransi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="potongan_asuransi" id="potongan_asuransi" data-error="Potongan Asuransi harus diisi" placeholder="Potongan Asuransi" value="<?php echo isset($karyawan->potongan_asuransi)?$karyawan->potongan_asuransi:''; ?>" required />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-minus"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-lg btn3d"><?php echo $button ?></button>
                            <a href="<?php echo site_url('karyawan') ?>" class="btn btn-default btn-lg btn3d">Cancel</a>
                        </div>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->