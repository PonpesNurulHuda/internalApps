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
                <div class="card-body dtMapel">
                    <h5 class="card-title">Data Mapel</h5>
                    <table id="tableMapel" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th hidden>Mapel_kategori_id</th>
                                <th>Kategori</th>
                                <th hidden>Mapel_type</th>
                                <th>Type</th>
                                <th>Nilai_minimal</th>
                                <th>Wajib_lulus</th>
                                <th>Is_active</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtMapel as $mapel) : ?>
                                <tr class="tr_<?= $mapel['id'] ?>">
                                    <td hidden><?= $mapel['id'] ?></td>
                                    <td class="nama">
                                        <?= $mapel['nama'] ?>
                                    </td>
                                    <td class="deskripsi">
                                        <?= $mapel['deskripsi'] ?>
                                    </td>
                                    <td hidden class="mapel_kategori_id">
                                        <?= $mapel['mapel_kategori_id'] ?>
                                    </td>
                                    <td class="namaKategory">
                                        <?= $mapel['namaKategory'] ?>
                                    </td>
                                    <td hidden class="mapel_type">
                                        <?= $mapel['mapel_type'] ?>
                                    </td>
                                    <td class="namaType">
                                        <?= $mapel['namaType'] ?>
                                    </td>
                                    <td class="nilai_minimal">
                                        <?= $mapel['nilai_minimal'] ?>
                                    </td>
                                    <td class="wajib_lulus">
                                        <?php
                                        if ($mapel['wajib_lulus'] == "1") {
                                            echo "Ya";
                                        } else {
                                            echo "Tidak";
                                        }
                                        ?>
                                    </td>
                                    <td class="is_active">
                                        <?php
                                        if ($mapel['is_active'] == "1") {
                                            echo "Aktif";
                                        } else {
                                            echo "Tidak Aktif";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <button class='btn btn-info btn-xs btnEdit' id="btnEdit_<?= $mapel['id'] ?>">Edit</button>
                                        <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_<?= $mapel['id'] ?>">Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Mapel_kategori_id</th>
                                <th>Mapel_type</th>
                                <th>Nilai_minimal</th>
                                <th>Wajib_lulus</th>
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
<script src="<?php echo base_url('js/mapel.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>