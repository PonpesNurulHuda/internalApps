CREATE TABLE `kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tingkat_id` int(11) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `walikelas` varchar(20) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `mapel_kategori_id` int(11) NOT NULL,
  `mapel_type` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `mapel_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `mapel_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `mustahiq` varchar(20) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `mapel_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `nilai_akhlaq_santri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_santri` int(11) NOT NULL,
  `is_semester` int(11) NOT NULL,
  `akhlaq` int(11) NOT NULL,
  `kerapihan` int(11) NOT NULL,
  `kerajinan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `nilai_santri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa_kelas` int(11) NOT NULL,
  `id_mapel_kelas` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `santri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kk` varchar(20) NOT NULL,
  `nik` char(16) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gender` char(1) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `semester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int(11) NOT NULL,
  `seqno` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `dimulai` date NOT NULL,
  `selesai` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `siswa_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_active` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `tahun_ajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `tingkat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seqno` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `tagihan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_santri` int(11) NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `tanggal_pembuatan` date NOT NULL,
  `tanggal_jatuh_tempo` date NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_pengurus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

ALTER TABLE enha.santri ADD is_mustahiq varchar(2) NULL;
ALTER TABLE enha.santri ADD no_hp1 varchar(20) NULL;
ALTER TABLE enha.santri ADD no_hp2 varchar(20) NULL;


CREATE TABLE `tagihan_cicilan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tagihan_detail` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bendahara` int(11) NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
);

ALTER TABLE enha.semester CHANGE status is_active int NOT NULL;
ALTER TABLE enha.siswa_kelas CHANGE id_active is_active int NOT NULL;
