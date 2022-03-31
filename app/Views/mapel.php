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
                    <table id="example" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Mapel_kategori_id</th>
                                <th>Mapel_type</th>
                                <th>Is_active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtMapel as $mapel) : ?>
                                <tr>
                                    <td hidden><?= $mapel['id'] ?></td>
                                    <td class="nama">
                                        <?= $mapel['nama'] ?>
                                    </td>
                                    <td class="deskripsi_id">
                                        <?= $mapel['deskripsi'] ?>
                                    </td>
                                    <td class="mapel_kategori_id_id">
                                        <?= $mapel['mapel_kategori_id'] ?>
                                    </td>
                                    <td class="mapel_type_id">
                                        <?= $mapel['mapel_type'] ?>
                                    </td>
                                    <td class="is_active">
                                        <?= $mapel['is_active'] ?>
                                    </td>
                                    <td>
                                        <button>Edit</button>
                                        <button>Detail</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Kelas_id</th>
                                <th>Semester_id</th>
                                <th>Maple_id</th>
                                <th>Mustahiq</th>
                                <th>Keterangan</th>
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