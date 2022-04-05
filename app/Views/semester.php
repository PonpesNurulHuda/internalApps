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
                    <h5 class="card-title">Data Semester</h5>
                    <table id="example" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tahun_ajaran_id</th>
                                <th>Seqno</th>
                                <th>Nama</th>
                                <th>Dimulai</th>
                                <th>Selesai</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtSemester as $semester) : ?>
                                <tr class="tr_<?= $semester['id'] ?>">
                                    <td hidden><?= $semester['id'] ?></td>
                                    <td class="tahun_ajaran_id">
                                        <?= $semester['tahun_ajaran_id'] ?>
                                    </td>
                                    <td class="seqno">
                                        <?= $semester['seqno'] ?>
                                    </td>
                                    <td class="nama">
                                        <?= $semester['nama'] ?>
                                    </td>
                                    <td class="dimulai">
                                        <?= $semester['dimulai'] ?>
                                    </td>
                                    <td class="selesai">
                                        <?= $semester['selesai'] ?>
                                    </td>
                                    <td class="status">
                                        <?= $semester['status'] ?>
                                    </td>
                                    <td>
                                        <button class='btn btn-info btn-xs btnEdit' id="btnEdit_<?= $semester['id'] ?>">Edit</button>
                                        <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_<?= $semester['id'] ?>">Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>tahun_ajaran_id</th>
                                <th>seqno</th>
                                <th>Nama</th>
                                <th>Dimulai</th>
                                <th>Selesai</th>
                                <th>Status</th>
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