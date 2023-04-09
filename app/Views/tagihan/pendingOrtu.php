<html>
    <body>
        <link href="<?php echo base_url('niceAdmin/vendorNiceAdmin/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        
        <style>
            .table1 {
                font-family: sans-serif;
                color: #232323;
                border-collapse: collapse;
            }
            
            .table1, th, td {
                border: 1px solid #999;
                padding: 8px 20px;
            }
        </style>

        <table>
            <tr>
                <td>Nama Santri</td>
                <td><?= $namaSantri ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><?= $kelas ?></td>
            </tr>
        </table>
        <br>
        <br>
        <?php foreach ($dataRekap as $dt) : ?>
        <table class="table1">
                <tr>
                    <td>Tagihan</td>
                    <td><?= $dt['namaTagihan'] ?></td>
                </tr>
                <tr>
                    <td>Periode</td>
                    <td><?= $dt['periode'] ?></td>
                </tr>
                <tr>
                    <td>Jumlah Tagihan</td>
                    <td><?= number_format($dt['jumlah'])?></td>
                </tr>
                <tr>
                    <td>Sudah dicicil</td>
                    <td><?= number_format($dt['jumlahCicilan']) ?></td>
                </tr>
                <tr>
                    <td>Kekurangan</td>
                    <td><?=  number_format($dt['total']) ?></td>
                </tr>
        </table>
        <br>
        <?php endforeach ?>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url('niceAdmin/vendorNiceAdmin/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    </body>
</html>