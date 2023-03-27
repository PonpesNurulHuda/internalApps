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
                <div class="card-body dtSemester">
                    <h5 class="card-title">Rekap Tagihan</h5>
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="tagihan" class="col-form-label">Tagihan</label>
                        </div>
                        <div class="col-auto">
                            <select class="form-control tagihan">
                                <option value="0">Semua</option>
                                <?php foreach ($data as $dt) : ?>
                                    <option value="<?= $dt['id'] ?>"><?= $dt['nama'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-auto">
                            <label for="tagihan" class="col-form-label">Status</label>
                        </div>
                        <div class="col-auto">
                            <select class="form-control status">
                                <option value="all">Semua</option>
                                <option value="0">Belum Lunas</option>
                                <option value="1">Lunas</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary" id="btnCari">Cari</button>
                        </div>
                    </div>
                    <br>
                    <table id="tableRekap" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th hidden>id</th>
                                <th>Nama Santri</th>
                                <th>Kelas</th>
                                <th>Tgl pembuatan</th>
                                <th>Tgl Jatuh Tempo</th>
                                <th>Tgl Lunas</th>
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
<script src="<?php echo base_url('js/tagihan/rekap.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>