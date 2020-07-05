<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Data Barang</h1>
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
                                <form action="<?= base_url('admin/barang/simpan'); ?>" method="post">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input class="form-control" name="nama_barang" placeholder="Nama barang" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input class="form-control" name="stok" placeholder="Stok barang" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input class="form-control" name="harga" placeholder="Harga barang" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Barang</label>
                                        <select class="form-control" name="id_jenis" required>
                                            <?php
                                            foreach ($jenis as $jns) {
                                                echo '<option value=' . $jns['id_jenis'] . '>' . $jns['nama_jenis'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Satuan Barang</label>
                                        <select class="form-control" name="id_satuan" required>
                                            <?php
                                            foreach ($satuan as $stn) {
                                                echo '<option value=' . $stn['id_satuan'] . '>' . $stn['nama_satuan'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-warning pull-right">Reset</button>
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