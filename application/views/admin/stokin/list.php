<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Stok Masuk</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Stok Barang Masuk
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form id="input" action="<?= base_url("admin/stokin/simpan"); ?>" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>ID Barang</label>
                                        <input class="form-control" type="text" name="id_barang" id="id_barang">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input class="form-control" type="text" name="nama_barang" id="nama_barang" disabled>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary" id="tambah">Tambah</button>
                                        <button type="button" class="btn btn-warning pull-right" id="hapus">Hapus</button>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Stok Masuk</label>
                                        <input class="form-control" type="text" name="stok" id="stok">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input class="form-control" type="text" name="harga" id="harga" disabled>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success pull-right" id="simpan">Simpan Semua</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>ID Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Stok Masuk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </form>
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