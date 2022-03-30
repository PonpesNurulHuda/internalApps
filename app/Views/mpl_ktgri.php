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
                <div class="card-body dtMpl_ktgri">
                    <h5 class="card-title">Data Mpl_ktgri</h5>
                    <table id="example" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Is_active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtMpl_ktgri as $mpl_ktgri) : ?>
                                <tr>
                                    <td hidden><?= $mpl_ktgri['id'] ?></td>
                                    <td class="nama">
                                        <?= $mpl_ktgri['nama'] ?>
                                    </td>
                                    <td class="deskripsi">
                                        <?= $mpl_ktgri['deskripsi'] ?>
                                    </td>
                                    <td class="is_active">
                                        <?= $mpl_ktgri['is_active'] ?>
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
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Is_active</th>
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
<script src="<?php echo base_url('js/mpl_ktgri.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>