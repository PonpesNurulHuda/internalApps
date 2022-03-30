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
                <div class="card-body dtNilai_akhsan">
                    <h5 class="card-title">Data Nilai_akhsan</h5>
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
                            <?php foreach ($dtNilai_akhsan as $nilai_akhsan) : ?>
                                <tr>
                                    <td hidden><?= $nilai_akhsan['id'] ?></td>
                                    <td class="id_santri">
                                        <?= $nilai_akhsan['id_santri'] ?>
                                    </td>
                                    <td class="id_semester">
                                        <?= $nilai_akhsan['id_semester'] ?>
                                    </td>
                                    <td class="akhlaq">
                                        <?= $nilai_akhsan['akhlaq'] ?>
                                    </td>
                                    <td class="kerapihan">
                                        <?= $nilai_akhsan['kerapihan'] ?>
                                    </td>
                                    <td class="kerajinan">
                                        <?= $nilai_akhsan['kerajinan'] ?>
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
<script src="<?php echo base_url('js/nilai_akhsan.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>