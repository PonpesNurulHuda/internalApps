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
                <div class="card-body dtTahun_ajaran">
                    <h5 class="card-title">Data Tahun_ajaran</h5>
                    <table id="example" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Is_active</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtTahun_ajaran as $tahun_ajaran) : ?>
                                <tr class="tr_<?= $tahun_ajaran['id'] ?>">
                                    <td hidden><?= $tahun_ajaran['id'] ?></td>
                                    <td class="nama">
                                        <?= $tahun_ajaran['nama'] ?>
                                    </td>
                                    <td class="status">
                                        <?= $tahun_ajaran['status'] ?>
                                    </td>
                                    <td class="is_active">
                                        <?php
                                        if ($tahun_ajaran['is_active'] == "1") {
                                            echo "Aktif";
                                        } else {
                                            echo "Tidak Aktif";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <button class='btn btn-info btn-xs btnEdit' id="btnEdit_<?= $tahun_ajaran['id'] ?>">Edit</button>
                                        <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_<?= $tahun_ajaran['id'] ?>">Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Is_active</th>
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
<script src="<?php echo base_url('js/tahun_ajaran.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>