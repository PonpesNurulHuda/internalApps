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
                                <th>id_siswa</th>
                                <th>id_kelas</th>
                                <th>is_active</th>
                                <th>created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtSantri as $santri) : ?>
                                <tr>
                                    <td hidden><?= $santri['id'] ?></td>
                                    <td>
                                        <?= $santri['id_siswa'] ?>
                                    </td>
                                    <td>
                                        <?= $santri['id_kelas'] ?>
                                    </td>
                                    <td>
                                        <?= $santri['is_active'] ?>
                                    </td>
                                    <td>
                                        <?= $santri['created_at'] ?>
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
                                <th>id_siswa</th>
                                <th>id_kelas</th>
                                <th>is_active</th>
                                <th>created_at</th>
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
<script src="<?php echo base_url('js/siswa_kelas.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>