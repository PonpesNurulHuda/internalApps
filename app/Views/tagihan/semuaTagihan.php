<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card overflow-x">
                <div class="card-body dtKelas">
                    <h5 class="card-title">Data Tagihan</h5>
                    <div class="row g-3 align-items-center">
                        <table class="display table table-striped table-bordered">
                            <tr>
                                <th>Kelas</th>
                                <th>Tagihan</th>
                                <th>Status</th>
                                <th>Santri</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>
                                    <select class="form-control drKelas">
                                        <option value=0>Semua Kelas</option>
                                        <?php foreach ($dtKelas as $dt) : ?>
                                            <option value="<?= $dt['id'] ?>"><?= $dt['nama'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </th>
                                <th>
                                    <select class="form-control drTagihan">
                                        <option value=0>Semua Tagihan</option>
                                        <?php foreach ($dtTagihanMaster as $dt) : ?>
                                            <option value="<?= $dt['id'] ?>"><?= $dt['nama'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </th>
                                <th>
                                    <select class="form-control status">
                                        <option value="all">Semua Status</option>
                                        <option value="0">Belum Lunas</option>
                                        <option value="1">Lunas</option>
                                    </select>
                                </th>
                                <th>
                                    <select class="form-control santri">
                                    </select>
                                </th>
                                <td>
                                    <button class="btn btn-primary" id="btnCari">Cari</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary tambahTagihan" data-bs-toggle="modal" data-bs-target="#tambahTagihan">Tambah Tagihan</button>
                                    <button type="button" class="btn btn-sm btn-primary generateTagihan" data-bs-toggle="modal" data-bs-target="#ModalGenerate">Generate Tagihan</button>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>

                    <br>
                    <table id="tableRekap" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Santri</th>
                                <th>Kelas</th>
                                <th>Tagihan</th>
                                <th>Periode</th>
                                <th>Jatuh Tempo</th>
                                <th>Jumlah</th>
                                <th>Cicilan</th>
                                <th>Status</th>
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


<!-- Modal -->
<div class="modal fade" id="tambahTagihan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tamhah Tagihan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="fmAddTagihan">

                <div class="mb-3">
                    <label class="form-label labelSantri">Nama Santri</label>
                    <select class="form-control id_santriDr"></select>
                </div>
                <div class="mb-3">
                    <label class="form-label labelTagihan">Tagihan</label>
                    <select class="form-control drTagihan">
                        <option value="0">Pilih Tagihan</option>    
                        <?php foreach ($dtTagihanMaster as $dt) : ?>
                            <option value="<?= $dt['id'] ?>"><?= $dt['nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label labelTagihan">Periode</label>
                    <select class="form-control drPeriode">
                        <option value="0">Pilih Periode</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="int" class="form-control jumlah_tagihan" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jatuh Tempo</label>
                    <input type="date" class="form-control jatuh_tempo">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="add1Tagihan">Tambah Tagihan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalGenerate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleGenerateTagihan"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="fmGnrtTagihan">
                <div class="mb-3">
                    <label class="form-label labelTagihan">Tagihan</label>
                    <select class="form-control drTagihan">
                        <option value="0">Pilih Tagihan</option>
                        <?php foreach ($dtTagihanMaster as $dt) : ?>
                            <option value="<?= $dt['id'] ?>"><?= $dt['nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label labelTagihan">Periode</label>
                    <select class="form-control drPeriode">
                        <option value="0">Pilih Periode</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="int" class="form-control jumlah_tagihan" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jatuh Tempo</label>
                    <input type="date" class="form-control jatuh_tempo">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnGenerateTagihan">Generate Tagihan</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="penerima" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Penerima Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="fmAddTagihan">
                On Proses
            <!-- <table>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Penerima</th>
                </table> -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>


<?= $this->section('content') ?>
<script src="<?php echo base_url('js/tagihan/semuaTagihan.js?y=') . date("Yhis"); ?>"></script>
<script>
    var dtTagihanMaster = <?php echo json_encode($dtTagihanMaster); ?>;
    var dtSantri = <?php echo json_encode($dtSantri); ?>;
    var dtPeriode = <?php echo json_encode($dtPeriode); ?>;
</script>
<?= $this->endSection() ?>