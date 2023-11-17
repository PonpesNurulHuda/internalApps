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
                    <table id="tableMapel_kelas" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th hidden>Kelas_id</th>
                                <th>Kelas</th>
                                <th hidden>Semester_id</th>
                                <th>Semester</th>
                                <th hidden>Mapel_id</th>
                                <th>Mapel</th>
                                <th hidden>Mustahiq</th>
                                <th>Mustahiq</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtMapel_kelas as $mapel_kelas) : ?>
                                <tr class="tr_<?= $mapel_kelas['id'] ?>">
                                    <td hidden><?= $mapel_kelas['id'] ?></td>
                                    <td class="nama">
                                        <?= $mapel_kelas['nama'] ?>
                                    </td>
                                    <td hidden class="kelas_id">
                                        <?= $mapel_kelas['kelas_id'] ?>
                                    </td>
                                    <td class="namaKelas">
                                        <?= $mapel_kelas['namaKelas'] ?>
                                    </td>
                                    <td hidden class="semester_id">
                                        <?= $mapel_kelas['semester_id'] ?>
                                    </td>
                                    <td class="namaSemester">
                                        <?= $mapel_kelas['namaSemester'] ?>
                                    </td>
                                    <td hidden class="mapel_id">
                                        <?= $mapel_kelas['mapel_id'] ?>
                                    </td>
                                    <td class="namaMapel">
                                        <?= $mapel_kelas['namaMapel'] ?>
                                    </td>
                                    <td hidden class="mustahiq">
                                        <?= $mapel_kelas['mustahiq'] ?>
                                    </td>
                                    <td class="namaMustahiq">
                                        <?= $mapel_kelas['namaMustahiq'] ?>
                                    </td>
                                    <td class="keterangan">
                                        <?= $mapel_kelas['keterangan'] ?>
                                    </td>
                                    <td>
                                        <button class='btn btn-info btn-xs btnEdit' id="btnEdit_<?= $mapel_kelas['id'] ?>">Edit</button>
                                        <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_<?= $mapel_kelas['id'] ?>">Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Kelas_id</th>
                                <th>Semester_id</th>
                                <th>Mapel_id</th>
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