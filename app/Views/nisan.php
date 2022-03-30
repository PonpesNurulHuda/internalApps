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
                    <h5 class="card-title">Data Nisan</h5>
                    <table id="example" class="display datatable " style="width:100%">
                        <thead>
                            <tr>
                                <th>id_siswa_kelas</th>
                                <th>id_mapel_kelas</th>
                                <th>nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtNisan as $Nisan) : ?>
                                <tr>
                                    <td hidden><?= $Nisan['id'] ?></td>
                                    <td class="id_siswa_kelas">
                                        <?= $Nisan['id_siswa_kelas'] ?>
                                    </td>
                                    <td class="id_mapel_kelas">
                                        <?= $Nisan['id_mapel_kelas'] ?>
                                    </td>
                                    <td class="nilai">
                                        <?= $Nisan['nilai'] ?>
                                    </td>
                                    <td>
                                    <td>
                                        <button>Edit</button>
                                        <button>Detail</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>id_siswa_kelas</th>
                                <th>id_mapel_kelas</th>
                                <th>nilai</th>
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
<script src="<?php echo base_url('js/nisan.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>