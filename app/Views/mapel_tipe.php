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
                <div class="card-body dtMapel_tipe">
                    <h5 class="card-title">Data Mapel_tipe</h5>
                    <table id="example" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Is_active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtMapel_tipe as $mapel_tipe) : ?>
                                <tr>
                                    <td hidden><?= $mapel_tipe['id'] ?></td>
                                    <td class="nama">
                                        <?= $mapel_tipe['nama'] ?>
                                    </td>
                                    <td class="deskripsi">
                                        <?= $mapel_tipe['deskripsi'] ?>
                                    </td>
                                    <td class="is_active">
                                        <?= $mapel_tipe['is_active'] ?>
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
                                <th>Nama</th>
                                <th>Deskripsi</th>
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
<script src="<?php echo base_url('js/mapel_tipe.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>