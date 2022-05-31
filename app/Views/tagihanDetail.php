<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>
<div class="pagetitle">
    <h1>Tagihan</h1>
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
                    <h5 class="card-title">Data Tagihan</h5>
                    <button class="btn btn-primary">Semua Kelas</button>
                    <?php foreach ($dtKelas as $kelas) : ?>
                        <button class="btn btn-primary"><?= $kelas['nama'] ?></button>
                    <?php endforeach ?>
                    <table id="tableTagihan" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th hidden>id_santri</th>
                                <th>Nama Santri</th>
                                <th hidden>id_tagihan</th>
                                <th>Nama Tagihan</th>
                                <th>Tgl Pembuatan</th>
                                <th>Tgl Jatuh Tempo</th>
                                <th>Tgl Pembayaran</th>
                                <th>Bendahara</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtTagihan as $dt) : ?>
                                
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th hidden>id_santri</th>
                                <th>Nama Santri</th>
                                <th hidden>id_tagihan</th>
                                <th>Nama Tagihan</th>
                                <th>Tgl Pembuatan</th>
                                <th>Tgl Jatuh Tempo</th>
                                <th>Tgl Pembayaran</th>
                                <th>Bendahara</th>
                                <th>Status</th>
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
<!-- <script src="<?php echo base_url('js/kelas.js?y=') . date("Yhis"); ?>"></script> -->
<?= $this->endSection() ?>