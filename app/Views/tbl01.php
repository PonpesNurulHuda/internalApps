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
                <div class="card-body dtTbl01">
                    <h5 class="card-title">Data tbl01</h5>
                    <table id="example" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>seqno</th>
                                <th>nama</th>
                                <th>is_active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtTbl01 as $tbl01) : ?>
                                <<tr class="tr_<?= $tbl01['id'] ?>">
                                    <td hidden><?= $tbl01['id'] ?></td>
                                    <td class="seqno">
                                        <?= $tbl01['seqno'] ?>
                                    </td>
                                    <td class="nama">
                                        <?= $tbl01['nama'] ?>
                                    </td>
                                    <td class="is_active">
                                        <?= $tbl01['is_active'] ?>
                                    </td>
                                    <td>
                                        <button class='btn btn-info btn-xs btnEdit' id="btnEdit_<?= $tbl01['id'] ?>">Edit</button>
                                        <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_<?= $tbl01['id'] ?>">Hapus</button>
                                    </td>
                                    </tr>
                                <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>seqno</th>
                                <th>nama</th>
                                <th>is_active</th>
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
<script src="<?php echo base_url('js/tbl01.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>