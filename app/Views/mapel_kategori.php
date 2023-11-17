<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>
<div class="pagetitle">
    <h1>Sample Page</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Sample</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body dtMapel_kategori">
                    <h5 class="card-title">Data Mapel_kategori</h5>
                    <table id="tableMapel_kategori" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Is_active</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtMapel_kategori as $mapel_kategori) : ?>
                                <tr class="tr_<?= $mapel_kategori['id'] ?>">
                                    <td hidden><?= $mapel_kategori['id'] ?></td>
                                    <td class="nama">
                                        <?= $mapel_kategori['nama'] ?>
                                    </td>
                                    <td class="deskripsi">
                                        <?= $mapel_kategori['deskripsi'] ?>
                                    <td class="is_active">
                                        <?php
                                        if ($mapel_kategori['is_active'] == "1") {
                                            echo "Aktif";
                                        } else {
                                            echo "Tidak Aktif";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <button class='btn btn-info btn-xs btnEdit' id="btnEdit_<?= $mapel_kategori['id'] ?>">Edit</button>
                                        <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_<?= $mapel_kategori['id'] ?>">Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Is_active</th>
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
<script src="<?php echo base_url('js/mapel_kategori.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>