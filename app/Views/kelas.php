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
                <div class="card-body dtKelas">
                    <h5 class="card-title">Data Kelas</h5>
                    <table id="example" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tingkat_id</th>
                                <th>Tahun_ajaran_id</th>
                                <th>Walikelas</th>
                                <th>Is_active</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtKelas as $kelas) : ?>
                                <tr class="tr_<?= $kelas['id'] ?>">
                                    <td hidden><?= $kelas['id'] ?></td>
                                    <td class="kode">
                                        <?= $kelas['kode'] ?>
                                    </td>
                                    <td class="nama">
                                        <?= $kelas['nama'] ?>
                                    </td>
                                    <td class="tingkat_id">
                                        <?= $kelas['tingkat_id'] ?>
                                    </td>
                                    <td class="tahun_ajaran_id">
                                        <?= $kelas['tahun_ajaran_id'] ?>
                                    </td>
                                    <td class="walikelas">
                                        <?= $kelas['walikelas'] ?>
                                    </td>
                                    <td class="is_active">
                                        <?= $kelas['is_active'] ?>
                                    </td>
                                    <td class="created_at">
                                        <?= $kelas['created_at'] ?>
                                    </td>
                                    <td class="updated_at">
                                        <?= $kelas['updated_at'] ?>
                                    </td>
                                    <td>
                                        <button class='btn btn-info btn-xs btnEdit' id="btnEdit_<?= $kelas['id'] ?>">Edit</button>
                                        <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_<?= $kelas['id'] ?>">Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tingkat_id</th>
                                <th>Tahun_ajaran_id</th>
                                <th>Walikelas</th>
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
<script src="<?php echo base_url('js/kelas.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>