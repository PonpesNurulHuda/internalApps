$(document).ready(function () {
  $(".dtSantri .dataTable-dropdown label").before(
    "<button class='btn btn-primary' id='btnAddSantri'>Tambah Data </button>  "
  );
});

$(document).on("click", "#btnAddSantri", function () {
  var className = makeid(10);
  $("tbody").prepend(`
        <tr class="tr_${className}">
            <td><input type='text' class="form-control nik" id=''></td>
            <td><input type='text' class="form-control kk" id=''></td>
            <td><input type='text' class="form-control nis" id=''></td>
            <td><input type='text' class="form-control nama" id=''></td>
            <td><input type='date' class="form-control tanggal_lahir" id=''></td>
            <td>
                <select class="form-control jenis_kelamin">
                    <option value="L">Laki - Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </td>
            <td>
                <button class='btn btn-primary btnSave' id="btnSave_${className}">Simpan</button>
                <button class='btn btn-danger btnCancel' id="btnCancel_${className}">Batal</button>
            </td>
        </tr>
    `);
});

$(document).on("click", ".btnCancel", function () {
  var idRow = $(this).attr("id").replace("btnCancel_", "");
  $(`.tr_${idRow}`).remove();
});

function getData(tr) {
  var dataPost = new Object();
  dataPost.id = tr;
  dataPost.nik = $(`.tr_${tr} .nik`).val();
  dataPost.kk = $(`.tr_${tr} .kk`).val();
  dataPost.nis = $(`.tr_${tr} .nis`).val();
  dataPost.nama = $(`.tr_${tr} .nama`).val();
  dataPost.tanggal_lahir = $(`.tr_${tr} .tanggal_lahir`).html();
  dataPost.jenis_kelamin = $(`.tr_${tr} .jenis_kelamin`).html();

  return dataPost;
}

$(document).on("click", ".btnSave", function () {
  var idRow = $(this).attr("id").replace("btnSave_", "");
  var dataPost = getData(idRow);
  console.log("dataPost", dataPost);

  $.ajax({
    url: "santri/add ",
    type: "POST",

    data: dataPost,
    success: function (response) {
      console.log(response);

      var data = response;
      if (data.id != "0") {
        $("tbody").prepend(`
                <tr class="tr_${data.id}">
                    <td class="nik">${dataPost.nik}</td>
                    <td class="kk">${dataPost.kk}</td>
                    <td class="nis">${dataPost.nis}</td> 
                    <td class="nama">${dataPost.nama}</td> 
                    <td class="tanggal_lahir">${dataPost.tanggal_lahir}</td> 
                    <td class="jenis_kelamin">${dataPost.jenis_kelamin}</td> 
                    <td>
                        <button class='btn btn-info btn-xs btnEdit' id="tbnEdit_${data.id}">Edit</button> 
                        <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_${data.id}">Hapus</button> 
                    </td>
                </tr>
            `);

        $(".DataTable td").css({ "font-size": 20 });
        $(`.tr_${idRow}`).remove();
      }else{
          alert(data.pesan);
      }
    },
    error: function () {
      alert("Terjadi kesalahan");
    },
  });
});

// edit data

$(document).on("click", ".btnEdit", function () {
  var idRow = $(this).attr("id").replace("btnEdit_", "");
  console.log('idRow', idRow)
  var dataPost = getData(idRow);
  console.log(dataPost);
  var nik = $(`.tr_${idRow} .nik`).html().trim();;
  var kk = $(`.tr_${idRow} .nik`).html().trim();;
  var nis = $(`.tr_${idRow} .nik`).html().trim();;
  var nama = $(`.tr_${idRow} .nik`).html().trim();;
  var tanggal_lahir = $(`.tr_${idRow} .nik`).html().trim();;
  var gender = $(`.tr_${idRow} .nik`).html().trim();;

  $(`.tr_${idRow}`).hide();
  $(`.tr_${idRow}`).addClass(`lama_${idRow}`);

  $(`.tr_${idRow}`).before(`
      <tr class="tr_${idRow} formEdit_${idRow}">
          <td><input type='text' class="form-control nik" id='' value='${nik}'></td>
          <td><input type='text' class="form-control kk" id='' value='${kk}'></td>
          <td><input type='text' class="form-control nis" id='' value='${nis}'></td>
          <td><input type='text' class="form-control nama" id='' value='${nama}'></td>
          <td><input type='date' class="form-control tanggal_lahir" id='' value='${tanggal_lahir}'></td>
          <td><input type='text' class="form-control gender" id='' value='${gender}'></td>
          <td>
              <button class='btn btn-primary btnSaveEdit' id="btnSave_${idRow}">Simpan</button>
              <button class='btn btn-danger btnCancelEdit' id="btnCancel_${idRow}">Batal</button>
          </td>
      </tr>
  `);
});