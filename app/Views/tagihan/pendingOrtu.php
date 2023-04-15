<html>
    <body>        
        <style>
            .table1 {
                font-family: sans-serif;
                color: #232323;
                border-collapse: collapse;
            }
            
            .table1, .th, .td {
                border: 1px solid #999;
                padding: 8px 20px;
            }
            
            .table2 {
                border: none;
                padding: 8px 20px;

                font-family: sans-serif;
                color: #232323;
                border-collapse: collapse;
            }
        </style>

        <table class="table2">
            <tr>
                <td class="table2">Nama Santri</td>
                <td class="table2"><?= $namaSantri ?></td>
            </tr>
            <tr>
                <td class="table2">Kelas</td>
                <td class="table2"><?= $kelas ?></td>
            </tr>
            
        </table>
        <br>

        <table class="table1">
            <tr>
                <td class="td">Tagihan</td>
                <td class="td">Periode</td>
                <td class="td">Jumlah Tagihan</td>
                <td class="td">Sudah dicicil</td>
                <td class="td">Kekurangan</td>
            </tr>
            <?php foreach ($dataRekap as $dt) : ?>
                <tr>
                    <td class="td"><?= $dt['namaTagihan'] ?></td>
                    <td class="td"><?= $dt['periode'] ?></td>
                    <td class="td">Rp <?= number_format($dt['jumlah'])?></td>
                    <td class="td">Rp <?= number_format($dt['jumlahCicilan']) ?></td>
                    <td class="td">Rp <?=  number_format($dt['total']) ?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan=4 class="td">Total</td>
                <td class="td">Rp <?= number_format($tunggakan) ?></td>
            </tr>
        </table>
        <br>
        Tanggal Cetak : <?php echo date("d M Y h:i:s"); ?>
    </body>
</html>