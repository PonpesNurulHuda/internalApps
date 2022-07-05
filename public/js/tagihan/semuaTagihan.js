let idKelas;
let idTagihan;
let idSantri;
let statusPenerimaaan;

$(document).ready(function () {
  idKelas = $(".drKelas").val();
  getListSantri();
});

$(document).on("click", "#btnCari", function () {
  idKelas = $(".drKelas").val();
  idTagihan = $(".drTagihan").val();
  statusPenerimaaan = $(".status").val();
  idSantri = $(".santri").val();
  refressTable(idKelas, idTagihan, statusPenerimaaan, idSantri);
});

$(document).on("click", ".drKelas", function () {
  idKelas = $(".drKelas").val();
  getListSantri();
});

$(document).on("click change", ".drTagihan", function () {
  idTagihan = $(this).val();
  var jlmTag = getJumlahTagihan(idTagihan);
  $(".jumlah_tagihan").val(jlmTag);
});

function refressTable(idKelas, idTagihan, statusPenerimaaan, idSantri) {
  $("#tableRekap").DataTable().clear().destroy();
  $("#tableRekap").DataTable({
    ajax: `../tagihan/rekapTagihanCustom/${idKelas}/${idTagihan}/${statusPenerimaaan}/${idSantri}`,
    columns: [
      { data: "santri" },
      { data: "kelas" },
      { data: "namaTagihan" },
      { data: "tanggal_pembuatan" },
      { data: "tanggal_jatuh_tempo" },
      { data: "jmlTagihan" },
      { data: "jumlah" },
      
      {
        data: "id",
        render: function (data, type, row, meta) {
          console.log('row', row);
          if (row.status != 1) {
            var html = "";
            if(row.jumlah == 0 || row.jumlah == null){
              html =
              '<button class="btn btn-primary btn-sm terimaPembarayan" id="btnTerima_' +
              data +
              '">Terima Lunas</button></a>';
            }
              html= html+
              '  <button class="btn btn-warning btn-sm terimaCicil" id="btnCicil_' +
              data +
              '">Terima Cicilan</button></a>';
            return html;
          } else {
            return (
              '<button class="btn btn-info btn-sm cekPenerima" id="btnCekBendahara_' +
              data +
              '">Lihat Penerima</button></a>'
            );
          }
        },
      },
    ],
  });
}

function getListSantri() {
  $(".santri option").remove();
  $(".id_santriDr option").remove();
  listSantri = "";
  listSantri += `<option value="all">Semua Santri</option>`;
  dtSantri.forEach((element) => {
    if (element.kelasId == idKelas || idKelas == 0) {
      listSantri += `<option value=${element.id}>${element.nama}</option>`;
    }
  });
  $(".santri").append(listSantri);
  $(".id_santriDr").append(listSantri);
}

function getJumlahTagihan(id) {
  jumlah = 0;
  dtTagihanMaster.forEach((element) => {
    if (element.id == id) {
      jumlah = element.jumlah;
    }
  });
  return jumlah;
}

// Post Data ======================================================================
$(document).on("click", "#btnGenerateTagihan", function () {
  var data = new Object();
  data.kelas = idKelas;
  data.id_tagihan = $("#fmGnrtTagihan .drTagihan").val();
  data.jatuh_tempo = $("#fmGnrtTagihan .jatuh_tempo").val();

  console.log(data);
  $.ajax({
    url: "../tagihanDetail/generate",
    type: "POST",
    data: data,
    success: function (response) {
      console.log(response);
      if (response.status == 1) {
        alert("Sukses");
        $(".btn-close").click();
        refressTable(idKelas, idTagihan, statusPenerimaaan, idSantri);
      }
    },
    error: function () {
      alert("Terjadi kesalahan");
    },
  });
});

$(document).on("click", "#add1Tagihan", function () {
  var data = new Object();
  data.id_santri = $("#fmAddTagihan .id_santriDr").val();
  data.id_tagihan = $("#fmAddTagihan .drTagihan").val();
  data.jatuh_tempo = $("#fmAddTagihan .jatuh_tempo").val();

  console.log(data);
  $.ajax({
    url: "../add1Tagihan",
    type: "POST",
    data: data,
    success: function (response) {
      console.log(response);
      if (response.status == 1) {
        alert("Sukses");
        $(".btn-close").click();
        refressTable(idKelas, idTagihan, statusPenerimaaan, idSantri);
      }
    },
    error: function () {
      alert("Terjadi kesalahan");
    },
  });
});

// Bayar ------------------------------------------------------------------

$(document).on("click", ".terimaPembarayan", function () {
  var id = $(this).attr("id").replace("btnTerima_", "");
  var dataPost = new Object();
  dataPost.id = id;
  dataPost.status = "1";

  let isExecuted = confirm("Apakah anda sudah menerima pembayaran?");
  console.log(isExecuted);
  if (isExecuted) {
    $.ajax({
      url: "../terimaPembayaran",
      type: "POST",
      data: dataPost,
      success: function (response) {
        console.log(response);
        var data = response;
        if (data.id != "0") {
          alert("sukses");
          refressTable(idKelas, idTagihan, statusPenerimaaan, idSantri);
        } else {
          alert(data.pesan);
        }
      },
      error: function (response) {
        alert("Terjadi kesalahan");
        console.log(response);
      },
    });
  }
});

$(document).on("click", ".terimaCicil", function () {
  var id = $(this).attr("id").replace("btnCicil_", "");
  var jumlahPembayaran;
  var note = prompt("Masukan jumlah pembayaran", "");
  if (note == null || note == "") {
  } else {
    jumlahPembayaran = note;

    var dataPost = new Object();
    dataPost.id = id;
    dataPost.jumlah = jumlahPembayaran;

    $.ajax({
      url: "../terimaCicilan",
      type: "POST",
      data: dataPost,
      success: function (response) {
        console.log('respon terima cicilan',response);
        var data = response;
        if (data.id != "0") {
          alert("sukses");
          refressTable(idKelas, idTagihan, statusPenerimaaan, idSantri);
        } else {
          alert(data.pesan);
        }
      },
      error: function () {
        alert("Terjadi kesalahan");
      },
    });
  }
});
