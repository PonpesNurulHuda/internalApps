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
                <div class="card-body dtMapel_kelas">
                    <h5 class="card-title">Data Mapel_kelas</h5>
                    <table id="example" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kelas_id</th>
                                <th>Semester_id</th>
                                <th>Maple_id</th>
                                <th>Mustahiq</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtMapel_kelas as $mapel_kelas) : ?>
                                <tr>
                                    <td hidden><?= $mapel_kelas['id'] ?></td>
                                    <td class="nama">
                                        <?= $mapel_kelas['nama'] ?>
                                    </td>
                                    <td class="kelas_id">
                                        <?= $mapel_kelas['kelas_id'] ?>
                                    </td>
                                    <td class="semester_id">
                                        <?= $mapel_kelas['semester_id'] ?>
                                    </td>
                                    <td class="maple_id">
                                        <?= $mapel_kelas['maple_id'] ?>
                                    </td>
                                    <td class="mustahiq">
                                        <?= $mapel_kelas['mustahiq'] ?>
                                    </td>
                                    <td class="keterangan">
                                        <?= $mapel_kelas['keterangan'] ?>
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
<script src="<?php echo base_url('js/mapel_kelas.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>