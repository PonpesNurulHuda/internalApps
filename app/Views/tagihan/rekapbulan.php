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
        <div class="col-lg-12">
            <div class="card overflow-x">
                <div class="card-body dtSemester">
                    <h5 class="card-title">Rekap Tagihan</h5>
                    <table id="tableRekap" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th hidden>id</th>
                                <th>Nama Santri</th>
                                <th>Januari</th>
                                <th>Febuari</th>
                                <th>Maret</th>
                                <th>April</th>
                                <th>Mei</th>
                                <th>Juni</th>
                                <th>Juli</th>
                                <th>Agustus</th>
                                <th>September</th>
                                <th>Oktober</th>
                                <th>November</th>
                                <th>Desember</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $d) : ?>
                                <tr class="tr_<?= $d['id'] ?>">
                                    <td hidden><?= $d['id'] ?></td>
                                    <td class="nama">
                                        <?= $d['nama'] ?>
                                    </td>
                                    <td>
                                        <?php if($d['Jan'] != 0){ echo "<button class='btn btn-primary btn-sm detail' bulan='1' id='id_".$d['id']."' >". number_format($d['Jan'])."</button>";}  ?>
                                    </td>
                                    <td>
                                        <?php if($d['Feb'] != 0){ echo "<button class='btn btn-primary btn-sm detail' bulan='1' id='id_".$d['id']."' >". number_format($d['Feb'])."</button>";}  ?>
                                    </td>
                                    <td>
                                        <?php if($d['Mar'] != 0){ echo "<button class='btn btn-primary btn-sm detail' bulan='1' id='id_".$d['id']."' >". number_format($d['Mar'])."</button>";}  ?>
                                    </td>
                                    <td>
                                        <?php if($d['Apr'] != 0){ echo "<button class='btn btn-primary btn-sm detail' bulan='1' id='id_".$d['id']."' >". number_format($d['Apr'])."</button>";}  ?>
                                    </td>
                                    <td>
                                        <?php if($d['Mei'] != 0){ echo "<button class='btn btn-primary btn-sm detail' bulan='1' id='id_".$d['id']."' >". number_format($d['Mei'])."</button>";}  ?>
                                    </td>
                                    <td>
                                        <?php if($d['Jun'] != 0){ echo "<button class='btn btn-primary btn-sm detail' bulan='1' id='id_".$d['id']."' >". number_format($d['Jun'])."</button>";}  ?>
                                    </td>
                                    <td>
                                        <?php if($d['Jul'] != 0){ echo "<button class='btn btn-primary btn-sm detail' bulan='1' id='id_".$d['id']."' >". number_format($d['Jul'])."</button>";}  ?>
                                    </td>
                                    <td>
                                        <?php if($d['Ags'] != 0){ echo "<button class='btn btn-primary btn-sm detail' bulan='1' id='id_".$d['id']."' >". number_format($d['Ags'])."</button>";}  ?>
                                    </td>
                                    <td>
                                        <?php if($d['Sep'] != 0){ echo "<button class='btn btn-primary btn-sm detail' bulan='1' id='id_".$d['id']."' >". number_format($d['Sep'])."</button>";}  ?>
                                    </td>
                                    <td>
                                        <?php if($d['Okt'] != 0){ echo "<button class='btn btn-primary btn-sm detail' bulan='1' id='id_".$d['id']."' >". number_format($d['Okt'])."</button>";}  ?>
                                    </td>
                                    <td>
                                        <?php if($d['Nov'] != 0){ echo "<button class='btn btn-primary btn-sm detail' bulan='1' id='id_".$d['id']."' >". number_format($d['Nov'])."</button>";}  ?>
                                    </td>
                                    <td>
                                        <?php if($d['Des'] != 0){ echo "<button class='btn btn-primary btn-sm detail' bulan='1' id='id_".$d['id']."' >". number_format($d['Des'])."</button>";}  ?>
                                    </td>
                                    <td>
                                        <?php if($d['Total'] != 0){ echo "<button class='btn btn-primary btn-sm detail' bulan='1' id='id_".$d['id']."' >". number_format($d['Total'])."</button>";}  ?>
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
<script src="<?php echo base_url('js/tagihan/rekapBulan.js?y=') . date("Yhis"); ?>"></script>
<?= $this->endSection() ?>
