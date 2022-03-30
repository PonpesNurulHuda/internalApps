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
                <div class="card-body dtMapel_kls">
                    <h5 class="card-title">Data Mapel_kls</h5>
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
                            <?php foreach ($dtMapel_kls as $mapel_kls) : ?>
                                <tr>
                                    <td hidden><?= $mapel_kls['id'] ?></td>
                                    <td class="nama">
                                        <?= $mapel_kls['nama'] ?>
                                    </td>
                                    <td class="kelas_id">
                                        <?= $mapel_kls['kelas_id'] ?>
                                    </td>
                                    <td class="semester_id">
                                        <?= $mapel_kls['semester_id'] ?>
                                    </td>
                                    <td class="maple_id">
                                        <?= $mapel_kls['maple_id'] ?>
                                    </td>
                                    <td class="mustahiq">
                                        <?= $mapel_kls['mustahiq'] ?>
                                    </td>
                                    <td class="keterangan">
                                        <?= $mapel_kls['keterangan'] ?>
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
<script src="<?php echo base_url('js/mapel_kls.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>