<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>
<!-- <div class="pagetitle">
    <h1>Sample Page</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Sample</li>
        </ol>
    </nav>
</div>End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card overflow-x">
                <div class="card-body dtKelas">
                    <h5 class="card-title">Data Tagihan</h5>
                    <button class="btn  btn-sm btn-primary btnKelas" kelas="0">Semua Kelas</button>
                    <?php foreach ($dtKelas as $kelas) : ?>
                        <button class="btn btn-sm btn-secondary btnKelas" id="kls_<?= $kelas['id'] ?>" kelas="<?= $kelas['id'] ?>"><?= $kelas['nama'] ?></button>
                    <?php endforeach ?>
                    <br>
                    <br>
                    <button type="button" class="btn btn-sm btn-primary tambahTagihan" data-bs-toggle="modal" data-bs-target="#tambahTagihan">Tambah Tagihan</button>
                    <button type="button" class="btn btn-sm btn-primary generateTagihan" data-bs-toggle="modal" data-bs-target="#ModalGenerate">Generate Tagihan</button>

                    <table id="tableRekap" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Santri</th>
                                <th>Nama Tagihan</th>
                                <th>Tgl Pembuatan</th>
                                <th>Tgl Jatuh Tempo</th>
                                <th>Tgl Pembayaran</th>
                                <th>Jumlah</th>
                                <th>Penerima</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>


<?= $this->section('content') ?>
<script src="<?php echo base_url('js/tagihan/semuaTagihan.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>