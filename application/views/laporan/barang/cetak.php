<html>

<head>
    <title>Cetak PDF</title>
    <style>
        .header {
            font-size: 15px;
            font-weight: bold;
            text-align: center;
            line-height: 30px;
        }

        table {
            width: 90%;
            margin-left: 5%;
            margin-right: 5%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        table th {
            text-align: center;
        }

        table td {
            text-align: justify;
            word-wrap: break-word;
        }
    </style>
</head>

<body>
    <div class="header"><?= $judul; ?></div>
    <table>
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 35%">Nama Barang</th>
            <th style="width: 20%">Stok</th>
            <th style="width: 20%">Harga</th>
            <th style="width: 20%">Jenis</th>
        </tr>
        <?php
        if (!empty($barang)) {
            $i = 0;
            foreach ($barang as $row) {
                $i++;
        ?>
                <tr>
                    <td class='text-center'><?= $i; ?></td>
                    <td><?= wordwrap($row->nama_barang, 30, '<br />', true); ?></td>
                    <td><?= $row->stok . ' ' . strtolower($row->nama_satuan); ?></td>
                    <td><?= rupiah($row->harga); ?></td>
                    <td><?= $row->nama_jenis; ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</body>

</html>