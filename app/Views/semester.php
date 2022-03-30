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
                <div class="card-body dtSemester">
                    <h5 class="card-title">Data Santri</h5>
                    <table id="example" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th> protected $allowedFields =tahun_ajaran_id</th>
                                <th> protected $allowedFields =seqno</th>
                                <th> protected $allowedFields =nama</th>
                                <th> protected $allowedFields =dimulai </th>
                                <th> protected $allowedFields =selesai </th>
                                <th> protected $allowedFields =status </th>
                                <th style="width: 10px;"> Gender</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtsemestet as $semestar) : ?>
                                <tr>
                                    <td hidden><?= $semester['id'] ?></td>
                                    <td>
                                        <?= $semester['tahun_ajaran_id'] ?>
                                    </td>
                                    <td>
                                        <?= $santri['seqno'] ?>
                                    </td>
                                    <td>
                                        <?= $santri['nama'] ?>
                                    </td>
                                    <td>
                                        <?= $santri['dimulai'] ?>
                                    </td>
                                    <td>
                                        <?= $santri['selesai'] ?>
                                    </td>
                                    <td>
                                        <?= $santri['status'] ?>
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
                                <th>tahun_ajaran_id</th>
                                <th>seqno</th>
                                <th>Nama</th>
                                <th>dimulai</th>
                                <th>selesai Lahir</th>
                                <th>status</th>
                                <th>Aksi</th>
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
<script src="<?php echo base_url('js/semester.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>