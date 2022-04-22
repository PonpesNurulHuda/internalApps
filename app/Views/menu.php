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
                <div class="card-body dtMenu">
                    <h5 class="card-title">Data Menu</h5>
                    <table id="tableMenu" class="display datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Icon</th>
                                <th>App_controller</th>
                                <th>App_funciton</th>
                                <th>Is_have_child</th>
                                <th>Related_id</th>
                                <th>Is_active</th>
                                <th>Seqno</th>
                                <th>Menu_kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtMenu as $menu) : ?>
                                <tr class="tr_<?= $menu['id'] ?>">
                                    <td hidden><?= $menu['id'] ?></td>
                                    <td class="nama">
                                        <?= $menu['nama'] ?>
                                    </td>
                                    <td class="icon">
                                        <?= $menu['icon'] ?>
                                    </td>
                                    <td class="app_controller">
                                        <?= $menu['app_controller'] ?>
                                    </td>
                                    <td class="app_funciton">
                                        <?= $menu['app_funciton'] ?>
                                    </td>
                                    <td class="is_have_child">
                                        <?php
                                        if ($menu['is_have_child'] == "1") {
                                            echo "ya";
                                        } else {
                                            echo "Tidak";
                                        }
                                        ?>
                                    <td>
                                    <td class="related_id">
                                        <?= $menu['related_id'] ?>
                                    </td>
                                    <td class="is_active">
                                        <?php
                                        if ($menu['is_active'] == "1") {
                                            echo "Aktif";
                                        } else {
                                            echo "Tidak Aktif";
                                        }
                                        ?>
                                    </td>
                                    <td class="seqno">
                                        <?= $menu['seqno'] ?>
                                    </td>
                                    <td class="menu_kategori">
                                        <?= $menu['menu_kategori'] ?>
                                    </td>
                                    <td>
                                        <button class='btn btn-info btn-xs btnEdit' id="btnEdit_<?= $menu['id'] ?>">Edit</button>
                                        <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_<?= $menu['id'] ?>">Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Icon</th>
                                <th>App_controller</th>
                                <th>App_funcition</th>
                                <th>Is_have_child</th>
                                <th>Related_id</th>
                                <th>Is_active</th>
                                <th>Seqno</th>
                                <th>Menu_kategori</th>
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
<script src="<?php echo base_url('js/menu.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>