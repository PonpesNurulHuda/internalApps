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
                <div class="card-body dtNilai_santri">
                    <h5 class="card-title">Data Nilai_santri</h5>
                    <table id="example" class="display datatable " style="width:100%">
                        <thead>
                            <tr>
                                <th hidden>id_siswa_kelas</th>
                                <th>Siswa kelas</th>
                                <th hidden>id_mapel_kelas</th>
                                <th>Mapel kelas</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtNilai_santri as $nilai_santri) : ?>
                                <tr class="tr_<?= $nilai_santri['id'] ?>">
                                    <td hidden><?= $nilai_santri['id'] ?></td>
                                    <td hidden class="id_siswa_kelas">
                                        <?= $nilai_santri['id_siswa_kelas'] ?>
                                    </td>
                                    <td class="namaSiswa">
                                        <?= $nilai_santri['namaSiswa'] ?>
                                    </td>
                                    <td hidden class="id_mapel_kelas">
                                        <?= $nilai_santri['id_mapel_kelas'] ?>
                                    </td>
                                    <td class="namaMapel">
                                        <?= $nilai_santri['namaMapel'] ?>
                                    </td>
                                    <td class="nilai">
                                        <?= $nilai_santri['nilai'] ?>
                                    </td>
                                    <td>
                                        <button class='btn btn-info btn-xs btnEdit' id="btnEdit_<?= $nilai_santri['id'] ?>">Edit</button>
                                        <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_<?= $nilai_santri['id'] ?>">Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id_siswa_kelas</th>
                                <th>Id_mapel_kelas</th>
                                <th>Nilai</th>
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
<script src="<?php echo base_url('js/nilai_santri.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>