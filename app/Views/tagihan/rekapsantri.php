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
        <div class="col-12">
            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <button class="btn btn-success" id="kirimMasal"><i class="bi bi-whatsapp"> Kirim Pesan Tagihan Massal</i></button>
                    <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
                    
                    <?php foreach ($dtKelas as $d) : ?>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#kelas<?= $d['id'] ?>" aria-selected="false" role="tab"><?= $d['nama'] ?></button>
                    </li>
                    <?php endforeach ?>
                    </ul>
                    <div class="tab-content pt-2">
                    <?php foreach ($dtKelas as $d) : ?>
                        <div class="tab-pane fade" id="kelas<?= $d['id'] ?>" role="tabpanel">
                            <table class="" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Santri</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dtSantri as $ds) : ?>
                                        <?php if($d['id'] == $ds['id_kelas']){?>
                                            <tr style="border: 1px solid black; padding-bottom: 25px;" id="tr_<?= $ds['id'] ?>">
                                                <td><?php if($ds['jumlahTagihan'] > 0){ ?> 
                                                    <div class="row">
                                                        <div style="font-size:1.5rem" class="icon col-1" data-bs-toggle="collapse" href="#santri<?= $ds['id'] ?>"  aria-expanded="false" aria-controls="">
                                                            <i class="bi bi-box-arrow-in-down-right"></i>
                                                        </div>
                                                        <div class="col-5 sendWa">
                                                            <button class="btn btn-success" id=""><i class="bi bi-whatsapp"> WA</i></button>
                                                        </div>
                                                    </div>
                                                    <input type="text" value="<?= $ds['no_hp1'] ?>" id="no_hp1" readonly hidden>
                                                    <input type="text" value="<?= $ds['no_hp2'] ?>" id="no_hp2" readonly hidden>
                                                    <input type="text" value="<?= $ds['ayah'] ?>" id="ayah" readonly hidden>
                                                    <input type="text" value="<?= $ds['ibu'] ?>" id="ibu" readonly hidden>
                                                    <input type="text" value="https://enha.rifki.my.id/rekapOrtu/<?= $ds['link'] ?>" id="link" readonly hidden>
                                                    <?php } ?>
                                                </td>
                                                <td class="namaSantri">
                                                    <?= $ds['nama'] ?>
                                                </td>
                                                <td class="total"><?= number_format($ds['jumlahTagihan']) ?></td>
                                            </tr>
                                            <tr class="collapse" id="santri<?= $ds['id'] ?>">
                                                <td colspan="3">
                                                <table style="width: 100%;">
                                                    <thead>
                                                        <tr style="border: 1px solid black;">
                                                            <th>Tagihan</th>
                                                            <th>Periode</th>
                                                            <th>Jumlah</th>
                                                            <th>Cicilan</th>
                                                            <th>Kekurangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($dataRekap as $dr) : 
                                                            if($dr['id'] == $ds['id'] ){
                                                        ?>
                                                            <tr style="border: 1px solid black;">
                                                                <td><?= $dr['namaTagihan'] ?></td>
                                                                <td><?= $dr['periode'] ?></td>
                                                                <td><?= number_format($dr['jumlah']) ?></td>
                                                                <td><?= number_format($dr['jumlahCicilan']) ?></td>
                                                                <td><?= number_format($dr['total']) ?></td>
                                                            </tr>
                                                        <?php } endforeach ?>
                                                    
                                                        
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </li>
                    <?php endforeach ?>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
<?= $this->section('content') ?>
<script src="<?php echo base_url('js/tagihan/rekapSantri.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>
