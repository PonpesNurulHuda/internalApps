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
                                <tr>
                                    <td hidden><?= $kelas['id'] ?></td>
                                    <td>
                                        <?= $kelas['kode'] ?>
                                    </td>
                                    <td>
                                        <?= $kelas['tingkat_id'] ?>
                                    </td>
                                    <td>
                                        <?= $kelas['tahun_ajaran_id'] ?>
                                    </td>
                                    <td>
                                        <?= $kelas['walikelas'] ?>
                                    </td>
                                    <td>
                                        <?= $kelas['is_active'] ?>
                                    </td>
                                    <td>
                                        <?= $kelas['created_at'] ?>
                                    </td>
                                    <td>
                                        <?= $kelas['updated_at'] ?>
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