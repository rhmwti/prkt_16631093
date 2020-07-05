<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Data Barang</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Isian Data Barang
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="<?= base_url('admin/barang/update'); ?>" method="post">
                                    <input type="hidden" name="id_barang" value="<?= $row['id_barang']; ?>">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input class="form-control" name="nama_barang" value="<?= $row['nama_barang']; ?>" placeholder="Nama barang" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input class="form-control" name="stok" value="<?= $row['stok']; ?>" placeholder="Stok barang" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input class="form-control" name="harga" value="<?= $row['harga']; ?>" placeholder="Harga barang" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Barang</label>
                                        <select class="form-control" name="id_jenis" required>
                                            <?php
                                            foreach ($jenis as $jns) {
                                                if ($jns['id_jenis'] == $row['id_jenis']) {
                                                    echo '<option value=' . $jns['id_jenis'] . ' selected>' . $jns['nama_jenis'] . '</option>';
                                                } else {
                                                    echo '<option value=' . $jns['id_jenis'] . '>' . $jns['nama_jenis'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Satuan Barang</label>
                                        <select class="form-control" name="id_satuan" required>
                                            <?php
                                            foreach ($satuan as $stn) {
                                                if ($stn['id_satuan'] == $row['id_satuan']) {
                                                    echo '<option value=' . $stn['id_satuan'] . ' selected>' . $stn['nama_satuan'] . '</option>';
                                                } else {
                                                    echo '<option value=' . $stn['id_satuan'] . '>' . $stn['nama_satuan'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-warning pull-right" onclick="history.back();">Batal</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->