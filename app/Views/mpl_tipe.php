<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body dtMpl_tipe">
                    <h5 class="card-title">Data Mpl_tipe</h5>
                    <table id="example" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Is_active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtMpl_tipe as $mpl_tipe) : ?>
                                <tr>
                                    <td hidden><?= $mpl_tipe['id'] ?></td>
                                    <td class="nama">
                                        <?= $mpl_tipe['nama'] ?>
                                    </td>
                                    <td class="deskripsi">
                                        <?= $mpl_tipe['deskripsi'] ?>
                                    </td>
                                    <td class="is_active">
                                        <?= $mpl_tipe['is_active'] ?>
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
<script src="<?php echo base_url('js/mpl_tipe.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>