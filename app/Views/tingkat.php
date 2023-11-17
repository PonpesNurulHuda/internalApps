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
                <div class="card-body dtTingkat">
                    <h5 class="card-title">Data tingkat</h5>
                    <table id="tableTingkat" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Seqno</th>
                                <th>Nama</th>
                                <th>Is_active</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtTingkat as $tingkat) : ?>
                                <tr class="tr_<?= $tingkat['id'] ?>">
                                    <td hidden><?= $tingkat['id'] ?></td>
                                    <td class="seqno">
                                        <?= $tingkat['seqno'] ?>
                                    </td>
                                    <td class="nama">
                                        <?= $tingkat['nama'] ?>
                                    </td>
                                    <td class="is_active">
                                        <?php
                                        if ($tingkat['is_active'] == "1") {
                                            echo "Aktif";
                                        } else {
                                            echo "Tidak Aktif";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <button class='btn btn-info btn-xs btnEdit' id="btnEdit_<?= $tingkat['id'] ?>">Edit</button>
                                        <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_<?= $tingkat['id'] ?>">Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Seqno</th>
                                <th>Nama</th>
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
<script src="<?php echo base_url('js/tingkat.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>