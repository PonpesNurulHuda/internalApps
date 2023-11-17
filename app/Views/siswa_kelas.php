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
                <div class="card-body dtSiswa_kelas">
                    <h5 class="card-title">Data Siswa_kelas</h5>
                    <table id="tableSiswa_kelas" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th hidden>Id_siswa</th>
                                <th>Siswa</th>
                                <th hidden>Id_kelas</th>
                                <th>Kelas</th>
                                <th>Is_active</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtSiswa_kelas as $siswa_kelas) : ?>
                                <tr class="tr_<?= $siswa_kelas['id'] ?>">
                                    <td hidden><?= $siswa_kelas['id'] ?></td>
                                    <td hidden class="id_siswa">
                                        <?= $siswa_kelas['id_siswa'] ?>
                                    </td>
                                    <td class="namaSiswa">
                                        <?= $siswa_kelas['namaSiswa'] ?>
                                    </td>
                                    <td hidden class="id_kelas">
                                        <?= $siswa_kelas['id_kelas'] ?>
                                    </td>
                                    <td class="namaKelas">
                                        <?= $siswa_kelas['namaKelas'] ?>
                                    </td>
                                    <td class="is_active">
                                        <?php
                                        if ($siswa_kelas['is_active'] == "1") {
                                            echo "Aktif";
                                        } else {
                                            echo "Tidak Aktif";
                                        }
                                        ?>
                                    </td>
                                    <td class="created_at">
                                        <?= $siswa_kelas['created_at'] ?>
                                    </td>
                                    <td class="updated_at">
                                        <?= $siswa_kelas['updated_at'] ?>
                                    </td>
                                    <td>
                                        <button class='btn btn-info btn-xs btnEdit' id="btnEdit_<?= $siswa_kelas['id'] ?>">Edit</button>
                                        <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_<?= $siswa_kelas['id'] ?>">Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id_siswa</th>
                                <th>Id_kelas</th>
                                <th>Is_active</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
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
<script src="<?php echo base_url('js/siswa_kelas.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>