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
                            <?php foreach ($dtSantri as $santri) : ?>
                                <tr class="tr_<?= $santri['id'] ?>">
                                    <td hidden><?= $santri['id'] ?></td>
                                    <td class="nik">
                                        <?= $santri['nik'] ?>
                                    </td>
                                    <td class="kk">
                                        <?= $santri['kk'] ?>
                                    </td>
                                    <td class="nis">
                                        <?= $santri['nis'] ?>
                                    </td>
                                    <td class="nama">
                                        <?= $santri['nama'] ?>
                                    </td>
                                    <td class="tanggal_lahir">
                                        <?= $santri['tanggal_lahir'] ?>
                                    </td>
                                    <td class="gender">
                                        <?= $santri['gender'] ?>
                                    </td>
                                    <td>
                                        <button class='btn btn-info btn-xs btnEdit' id="btnEdit_<?= $santri['id'] ?>">Edit</button> 
                                        <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_<?= $santri['id'] ?>">Hapus</button>
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
<script src="<?php echo base_url('js/santri.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>