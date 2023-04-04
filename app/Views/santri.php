<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body dtSantri">
                    <h5 class="card-title">Data Santri</h5>
                    <table id="tableSantri" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th> Gender</th>
                                <th colspan="2">No HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtSantri as $santri) : ?>
                                <tr class="tr_<?= $santri['id'] ?>">
                                    <td hidden><?= $santri['id'] ?></td>
                                    <td class="nis">
                                        <?= $santri['nis'] ?>
                                    </td>
                                    <td class="nama">
                                        <?= $santri['nama'] ?>
                                    </td>
                                    <td class="tanggal_lahir">
                                        <?= $santri['tanggal_lahir'] ?>
                                    </td>
                                    <td class="gender">
                                        <?= $santri['gender'] ?>
                                    </td>
                                    <td class="is_mustahiq" hidden>
                                        <?php
                                        if ($santri['is_mustahiq'] == "1") {
                                            echo "Ya";
                                        } else {
                                            echo "Tidak";
                                        }
                                        ?>
                                    </td>
                                    <td class="no_hp1">
                                        <?= $santri['no_hp1'] ?>
                                    </td>
                                    <td class="no_hp2">
                                        <?= $santri['no_hp1'] ?>
                                    </td>
                                    <td>
                                        <button class='btn btn-info btn-xs btnEdit btn-sm' id="btnEdit_<?= $santri['id'] ?>">Edit</button>
                                        <!-- <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_<?= $santri['id'] ?>">Hapus</button> -->
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

<?= $this->endSection() ?>


<?= $this->section('content') ?>
<script src="<?php echo base_url('js/santri.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>