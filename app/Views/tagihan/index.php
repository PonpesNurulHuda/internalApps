<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>
<!-- <div class="pagetitle">
    <h1>Sample Page</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Sample</li>
        </ol>
    </nav>
</div>End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card overflow-x">
                <div class="card-body dtSemester" >
                    <h5 class="card-title">Data Master Tagihan</h5>
                    <table id="tableSemester" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th hidden>id</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Jumlah</th>
                                <th>Is Active</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $dt) : ?>
                                <tr class="tr_<?= $dt['id'] ?>">
                                    <td class="nama">
                                        <?= $dt['nama'] ?>
                                    </td>
                                    <td class="description">
                                        <?= $dt['description'] ?>
                                    </td>
                                    <td class="jumlah" align="right">
                                        <?= number_format($dt['jumlah']) ?>
                                    </td>
                                    <td class="is_active">
                                        <?php
                                        if ($dt['is_active'] == "1") {
                                            echo "Aktif";
                                        } else {
                                            echo "Tidak Aktif";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <button class='btn btn-info btn-xs btnEdit' id="btnEdit_<?= $dt['id'] ?>">Edit</button>
                                        <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_<?= $dt['id'] ?>">Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th hidden>id</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Jumlah</th>
                                <th>Is Active</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>


<?= $this->section('content') ?>
<script src="<?php echo base_url('js/tagihanMaster.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>