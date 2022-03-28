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
                <div class="card-body dtSantri">
                    <h5 class="card-title">Data Santri</h5>
                    <table id="example" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>KK</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th style="width: 10px;"> Gender</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($dtSantri as $santri): ?>
                            <tr>
                                <td hidden><?= $santri['id'] ?></td>
                                <td>
                                    <?= $santri['kk'] ?>
                                </td>
                                <td>
                                    <?= $santri['nik'] ?>
                                </td>
                                <td>
                                    <?= $santri['nis'] ?>
                                </td>
                                <td>
                                    <?= $santri['nama'] ?>
                                </td>
                                <td>
                                    <?= $santri['tanggal_lahir'] ?>
                                </td>
                                <td>
                                    <?= $santri['gender'] ?>
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
                                <th>NIK</th>
                                <th>KK</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Gender</th>
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
<script src="<?php echo base_url('js/santri.js?y=').date("Yhis"); ?>"></script>
<?= $this->endSection() ?>
