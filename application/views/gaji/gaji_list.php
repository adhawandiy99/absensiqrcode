<style media="screen">
    table,
    th,
    tr {
        text-align: center;
    }

    .swal2-popup {
        font-family: inherit;
        font-size: 1.2rem;
    }
</style>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>
                <div class='box-header  with-border'>
                    <h3 class='box-title'>DATA Gaji</h3>
                    <div class="pull-right">
                        <?php echo anchor(site_url('gaji/form/new'), ' <i class="fa fa-plus"></i> &nbsp;&nbsp; Tambah Baru', 'class="btn btn-unique btn-lg btn-create-data btn3d"'); ?>
                    </div>
                </div>
                <div class="box-body">
                    <table id="mytable" class="table table-bordered table-hover display" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Periode</th>
                                <th>Total Gaji</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 0;
                            foreach ($gaji_data as $gaji) { ?>
                            <tr>
                                <td><?php echo ++$start ?></td>
                                <td><?php echo $gaji->id_karyawan ?></td>
                                <td><?php echo $gaji->nama_karyawan ?></td>
                                <td><?php echo $gaji->periode ?></td>
                                <td><?php echo number_format($gaji->total_gaji) ?></td>
                                <td>
                                    <?php
                                        echo anchor(site_url('gaji/slip/' . $gaji->id), '<i class="fa  fa-eye"></i>&nbsp;&nbsp;Slip', array('title' => 'slip', 'class' => 'btn btn-md btn-success btn-edit-data btn3d'));
                                        echo anchor(site_url('gaji/form/' . $gaji->id), '<i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;&nbsp;Edit', array('title' => 'edit', 'class' => 'btn btn-md btn-warning btn-edit-data btn3d'));
                                        echo anchor(site_url('gaji/delete/' . $gaji->id), '<i class="fa fa-trash fa-lg"></i>&nbsp;&nbsp;Hapus', 'title="delete" class="btn btn-md btn-danger btn-remove-data btn3d"');
                                        ?>
                                </td>
                            </tr> <?php } ?>
                        </tbody>
                    </table>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $("#mytable")
                                .addClass('nowrap')
                                .dataTable({
                                    responsive: true,
                                    colReorder: true,
                                    fixedHeader: true,
                                    columnDefs: [{
                                        targets: [-1, -3],
                                        className: 'dt-responsive'
                                    }]
                                });
                        });
                    </script>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<script>
    $(document).ready(function() {
        let checkLogin = '<?= $result ?>';
        if (checkLogin == 0) {
            $('.btn-create-data').hide();
            $('.btn-edit-data').hide();
            $('.btn-remove-data').hide();
        }
    });
</script>