<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Master Barang</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Barang
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="well">
                            <a class="btn btn-primary btn-lg btn-block" href="<?= base_url('admin/barang/tambah'); ?>">Tambah Data Barang</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Jenis</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($barang as $row) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td class='text-center'><?= $i; ?></td>
                                            <td><?= $row->nama_barang; ?></td>
                                            <td><?= $row->stok . ' ' . strtolower($row->nama_satuan); ?></td>
                                            <td><?= rupiah($row->harga); ?></td>
                                            <td><?= $row->nama_jenis; ?></td>
                                            <td>
                                                <a href="<?= site_url('admin/barang/edit/' . $row->id_barang); ?>" class="btn btn-success btn-circle"><i class="fa fa-pencil"></i></a>
                                                <a href="<?= site_url('admin/barang/hapus/' . $row->id_barang); ?>" class=" btn btn-danger btn-circle" onclick="return confirm('Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->