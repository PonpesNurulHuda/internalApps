<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <?php foreach ($data as $dt) : ?>
                    <div class="col-xxl-3 col-md-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $dt['nama'] ?></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <?= number_format(100 - $dt['persen']) ?>%
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $dt['L'] ?> dari <?= $dt['L'] + $dt['H'] ?></h6>
                                        <span class="text-success small pt-1 fw-bold"> sisa <?= number_format($dt['persen']) ?> % </span> <span class="text-muted small pt-2 ps-1"><?= number_format($dt['jumlah']) ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                <?php endforeach ?>
                <!-- Sales Card -->
            </div>
        </div><!-- End Left side columns -->
    </div>
</section>
<?= $this->endSection() ?>