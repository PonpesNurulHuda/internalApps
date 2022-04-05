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
                <div class="card-body dtNilai_akhlaq_santri">
                    <h5 class="card-title">Data Nilai_akhlaq_santri</h5>
                    <table id="example" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id_santri</th>
                                <th>Id_semester</th>
                                <th>Akhlaq</th>
                                <th>Kerapihan</th>
                                <th>Kerajinan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtNilai_akhlaq_santri as $nilai_akhlaq_santri) : ?>
                                <<tr class="tr_<?= $nilai_akhlaq_santri['id'] ?>">
                                    <td hidden><?= $nilai_akhlaq_santri['id'] ?></td>
                                    <td class="id_santri">
                                        <?= $nilai_akhlaq_santri['id_santri'] ?>
                                    </td>
                                    <td class="id_semester">
                                        <?= $nilai_akhlaq_santri['id_semester'] ?>
                                    </td>
                                    <td class="akhlaq">
                                        <?= $nilai_akhlaq_santri['akhlaq'] ?>
                                    </td>
                                    <td class="kerapihan">
                                        <?= $nilai_akhlaq_santri['kerapihan'] ?>
                                    </td>
                                    <td class="kerajinan">
                                        <?= $nilai_akhlaq_santri['kerajinan'] ?>
                                    </td>
                                    <td>
                                        <button class='btn btn-info btn-xs btnEdit' id="btnEdit_<?= $nilai_akhlaq_santri['id'] ?>">Edit</button>
                                        <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_<?= $nilai_akhlaq_santri['id'] ?>">Hapus</button>
                                    </td>
                                    </tr>
                                <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id_santri</th>
                                <th>Id_semester</th>
                                <th>Akhlaq</th>
                                <th>Kerapihan</th>
                                <th>Kerajinan</th>
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
<script src="<?php echo base_url('js/nilai_akhlaq_santri.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>