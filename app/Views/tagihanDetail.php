<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
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
                                <th>Jumlah</th>
                                <th>Penerima</th>
                                <th hidden>Status</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtTagihan as $dt) : ?>
                                <tr class="tr_<?= $dt["id"] ?>">
                                    <td hidden><?= $dt["id_santri"] ?></td>
                                    <td><?= $dt["santri"] ?></td>
                                    <td hidden><?= $dt["id_tagihan"] ?></td>
                                    <td><?= $dt["tagihan"] ?></td>
                                    <td><?= $dt["tanggal_pembuatan"] ?></td>
                                    <td><?= $dt["tanggal_jatuh_tempo"] ?></td>
                                    <td><?php if( $dt["tanggal_pembayaran"] != '0000-00-00 00:00:00'){ echo $dt["tanggal_pembayaran"]; } ?></td>
                                    <td align="right"><?= number_format($dt["jumlah"]) ?></td>
                                    <td><?= $dt["bendahara"] ?></td>
                                    <td hidden><?= $dt["status"] ?></td>
                                    <td class="status"><?php if ($dt["status"] == "0") {
                                                            echo "Belum Lunas";
                                                        } else {
                                                            echo "Lunas";
                                                        } ?></td>
                                    <td class="aksi">
                                        <?php if ($dt["status"] == "0") {
                                            echo "<button class='btn btn-sm btn-info btn-xs terimaPembarayan' id='btnTerima_" . $dt['id'] . "'>Terima Uang</button>";
                                        } else {
                                            echo "";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
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
                </div>
                <div class="mb-3">
                    <label class="form-label labelTagihan">Tagihan</label>
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
                <h5 class="modal-title" id="generateTagihan"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="fmGnrtTagihan">
                <div class="mb-3">
                    <label class="form-label labelTagihan">Tagihan</label>
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

<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script src="<?php echo base_url('js/tagihan.js?y=') . date("Yhis"); ?>"></script>
<script>
    var dtTagihanMaster =<?php echo json_encode($dtTagihanMaster); ?>;
    var dtSantri =<?php echo json_encode($dtSantri); ?>;
    
</script>

<?= $this->endSection() ?>