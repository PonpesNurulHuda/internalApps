let kelas = 0;
let drTagihan = "";
let drSantri = "";

$(document).ready(function () {
  var drTagihanList = "";
  drTagihanList = "<option value=0>Pilih Tagihan</option>"
  dtTagihanMaster.forEach(element => {
    drTagihanList += `<option value="${element.id}">${element.nama}</option>`;
  });
  drTagihan = `<select class="form-control id_tagihan masterTagihan">${drTagihanList}</select>`;

});

$(document).on("click", ".btnKelas", function () {
  kelas = $(this).attr("kelas");
  console.log(kelas);
  $('.btnKelas').removeClass('btn-primary');
  $('.btnKelas').addClass('btn-secondary');
  $(this).removeClass('btn-secondary').addClass('btn-primary');
});

$(document).on("click", ".terimaPembarayan", function () {
  var id = $(this).attr("id").replace("btnTerima_", "");

  var dataPost = new Object();
  dataPost.id = id;
  dataPost.status = "1";

  let isExecuted = confirm("Apakah anda sudah menerima pembayaran?");
  console.log(isExecuted);
  if(isExecuted){
    $.ajax({
        url: "terimaPembayaran",
        type: "POST",
    
        data: dataPost,
        success: function (response) {
          console.log(response);
    
          var data = response;
          if (data.id != "0") {
            $(`.tr_${id} .status`).html("Lunas");
            $(`.tr_${id} .aksi .terimaPembarayan`).hide();
            addAlertSuccess("Data berhasil diperbarui", "success");
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
  var headerGenerate = "Tagihan untuk semua santri ";
  if(kelas == 0){
  }else{
    headerGenerate = headerGenerate + ` <span style="background-color:yellow">`+ $(`#kls_${kelas}`).html().trim() + '</span>';
  }

  $("#generateTagihan").html(headerGenerate);
  
  $(".masterTagihan").remove();
  $(".labelTagihan").after(drTagihan);
});

$(document).on("click", ".tambahTagihan", function () {

  $(".id_santriDr").remove();
  $(".labelSantri").after(getListSantri());
  
  $(".masterTagihan").remove();
  $(".labelTagihan").after(drTagihan);
});

$(document).on("change", ".masterTagihan", function () {
  $(".jumlah_tagihan").val(getJumlahTagihan($(this).val()));
});

function getJumlahTagihan(id) {
  jumlah = 0
  dtTagihanMaster.forEach(element => {
    if(element.id == id){
      jumlah = element.jumlah
    }
  });
  return jumlah;
}

function getListSantri() {
  jumlah = 0
  listSantri = "";
  dtSantri.forEach(element => {
    if(element.kelasId == kelas || kelas == 0){
      listSantri += `<option value=${element.id}>${element.nama}</option>`
    }
  });
  drSantri = `<select class="form-control id_santriDr">${listSantri}</select>`;
  return drSantri;
}

$(document).on("click", "#btnGenerateTagihan", function () {
  var data = new Object;
  data.kelas = kelas;
  data.id_tagihan = $("#fmGnrtTagihan .masterTagihan").val();
  data.jatuh_tempo = $("#fmGnrtTagihan .jatuh_tempo").val();

  console.log(data);
  $.ajax({
    url: "tagihanDetail/generate",
    type: "POST",
    data: data,
    success: function (response) {
      console.log(response);
      if(response.status == 1){
        alert("Sukses");
        location.reload();
      }
    },
    error: function () {
      alert("Terjadi kesalahan");
    },
  });
});


$(document).on("click", "#add1Tagihan", function () {
  var data = new Object;
  data.id_santri = $("#fmAddTagihan .id_santriDr").val();
  data.id_tagihan = $("#fmAddTagihan .masterTagihan").val();
  data.jatuh_tempo = $("#fmAddTagihan .jatuh_tempo").val();

  console.log(data);
  $.ajax({
    url: "add1Tagihan",
    type: "POST",
    data: data,
    success: function (response) {
      console.log(response);
      if(response.status == 1){
        alert("Sukses");
        location.reload();
      }
    },
    error: function () {
      alert("Terjadi kesalahan");
    },
  });
});

