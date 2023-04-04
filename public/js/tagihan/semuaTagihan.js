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
  var optionPeriode = getPeriodeTagihan(idTagihan);
  $(".drPeriode").html(optionPeriode);
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
      { data: "namaPeriode" },
      { data: "tanggal_jatuh_tempo" },
      {
        "mData": null,
        "bSortable": true,
        "mRender": function (o) {
            html = "<div class='jmlTagihan_"+o.id+"'>"+o.jmlTagihan+"</div>";
            html += `<input type="number" class="form-control" value="${o.jmlTagihan}" id="newjmlTagihan_${o.id}" hidden>`;
            html += `<button class="btn btn-sm btn-primary saveNewTagihan" id="save_${o.id}" hidden>Simpan</button>`;
            html += `<button class="btn btn-sm btn-warning batalNewTagihan" id="batal_${o.id}" hidden>Batal</button>`;
            return html;
        }
      },
      { data: "jumlah" },
      {
        data: "id",
        render: function (data, type, row, meta) {
          if (row.status != 1) {
            var html = "";
            if(row.jumlah == 0 || row.jumlah == null){
              html ='<button class="btn btn-primary btn-sm terimaPembarayan" id="btnTerima_' +data + '">Terima Lunas</button></a>';
            }else{
              html =`<button type="button" class="btn btn-sm btn-primary penerima" id="id_${row.id}" data-bs-toggle="modal" data-bs-target="#penerima">Lihat Penerima</button>`
            }
            html= html+'<button class="btn btn-warning btn-sm terimaCicil" id="btnCicil_' + data +'">Terima Cicilan</button></a>';
            html= html+'<button class="btn btn-danger btn-sm editTagihan" id="btnEdit_' + data +'">Edit</button></a>';
            return html;
          }else {
            return (
              `<button type="button" class="btn btn-sm btn-primary penerima" id="id_${row.id}" data-bs-toggle="modal" data-bs-target="#penerima">Lihat Penerima</button>`
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
  // listSantri += `<option value="all">Semua Santri</option>`;
  dtSantri.forEach((element) => {
    if (element.kelasId == idKelas || idKelas == 0) {
      listSantri += `<option value=${element.id}>${element.nama}</option>`;
    }
  });
  
  $(".id_santriDr").append(listSantri);

  listSantri2 = `<option value="all">Semua Santri</option>`+listSantri;
  $(".santri").append(listSantri2);

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

function getPeriodeTagihan(id) {
  jumlah = 0;
  var optionPeriode = "";
  dtPeriode.forEach((element) => {
    if (element.id_tagihan == id) {
      optionPeriode += `<option value="${element.id}">${element.nama}</option>`;
    }
  });
  return optionPeriode;
}

// Post Data ======================================================================
$(document).on("click", "#btnGenerateTagihan", function () {
  $("#btnGenerateTagihan").attr('disabled','disabled');
  var data = new Object();
  data.kelas = idKelas;
  data.id_tagihan = $("#fmGnrtTagihan .drTagihan").val();
  data.id_periode = $("#fmGnrtTagihan .drPeriode").val();
  data.jatuh_tempo = $("#fmGnrtTagihan .jatuh_tempo").val();
  console.log(data);
  if(data.id_tagihan == "0" ||data.id_periode == "0" ||data.jatuh_tempo == ""){
    alert('Mohon dilengkapi kolom nya');
    $("#add1Tagihan").removeAttr('disabled');
  }else{
    $.ajax({
      url: "../tagihanDetail/generate",
      type: "POST",
      data: data,
      success: function (response) {
        console.log(response);
        if (response.status == 1) {
          alert("Sukses");
          $(".btn-close").click();
          // refressTable(idKelas, idTagihan, statusPenerimaaan, idSantri);
          $("#btnCari").click();
        }
      },
      error: function () {
        alert("Terjadi kesalahan");
      },
    });
  }
});

$(document).on("click", "#add1Tagihan", function () {
  $("#add1Tagihan").attr('disabled','disabled')
  var data = new Object();
  data.id_santri = $("#fmAddTagihan .id_santriDr").val();
  data.id_tagihan = $("#fmAddTagihan .drTagihan").val();
  data.id_periode = $("#fmAddTagihan .drPeriode").val();
  data.jatuh_tempo = $("#fmAddTagihan .jatuh_tempo").val();

  console.log(data);
  if(data.id_tagihan == "0" ||data.id_periode == "0" ||data.jatuh_tempo == ""){
    alert('Mohon dilengkapi kolom nya');
    $("#add1Tagihan").removeAttr('disabled');
  }else{
    $.ajax({
      url: "../add1Tagihan",
      type: "POST",
      data: data,
      success: function (response) {
        console.log(response);
        if (response.status == 1) {
          alert("Sukses");
          $(".btn-close").click();
          // refressTable(idKelas, idTagihan, statusPenerimaaan, idSantri);
          $("#btnCari").click();
          $("#add1Tagihan").removeAttr('disabled');
        }
      },
      error: function () {
        alert("Terjadi kesalahan");
        $("#add1Tagihan").removeAttr('disabled');
      },
    });
  }
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
          // refressTable(idKelas, idTagihan, statusPenerimaaan, idSantri);
          $("#btnCari").click();
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


$(document).on("click", ".editTagihan", function () {
  var id = $(this).attr("id").replace("btnEdit_", "");
  $(".jmlTagihan_"+id).hide();
  $("#newjmlTagihan_"+id).removeAttr('hidden');
  $("#save_"+id).removeAttr('hidden');
  $("#batal_"+id).removeAttr('hidden');
  $("#btnEdit_"+id).hide();
});

$(document).on("click", ".batalNewTagihan", function () {
  var id = $(this).attr("id").replace("batal_", "");
  $(".jmlTagihan_"+id).show();
  $("#newjmlTagihan_"+id).attr('hidden', 'hidden');
  $("#save_"+id).attr('hidden', 'hidden');
  $("#batal_"+id).attr('hidden', 'hidden');
  $("#btnEdit_"+id).show();
});

$(document).on("click", ".saveNewTagihan", function () {
  var id = $(this).attr("id").replace("save_", "");
  $(".jmlTagihan_"+id).show();
  $("#newjmlTagihan_"+id).attr('hidden', 'hidden');
  $("#save_"+id).attr('hidden', 'hidden');
  $("#batal_"+id).attr('hidden', 'hidden');
  $("#btnEdit_"+id).show();

  var dataPost = new Object();
    dataPost.id = id;
    dataPost.jmlTagihan = $("#newjmlTagihan_"+id).val();
    console.log(dataPost);
    $.ajax({
      url: "../editJumlahTagihan",
      type: "POST",
      data: dataPost,
      success: function (response) {
        console.log('editJumlahTagihan',response);
        var data = response;
        if (data.id != "0") {
          alert("sukses");
          // refressTable(idKelas, idTagihan, statusPenerimaaan, idSantri);
          $("#btnCari").click();
        } else {
          alert(data.pesan);
        }
      },
      error: function () {
        alert("Terjadi kesalahan");
      },
    });

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
          // refressTable(idKelas, idTagihan, statusPenerimaaan, idSantri);
          $("#btnCari").click();
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


$(document).on("click", ".generateTagihan", function () {
  $("#titleGenerateTagihan").html("Generate tagihan untuk "+ $(".drKelas option:selected" ).text()) ;
})

$(document).on("change", ".drPeriode", function () {
  console.log();
  var idPeriode = $(this).val(); 

  dtPeriode.forEach((element) => {
    if (element.id == idPeriode) {
      $(".jatuh_tempo").val(element.jatuh_tempo);
      return
    }
  });
})
