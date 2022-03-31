$(document).ready(function () {
    $(".dtKelas .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddKelas'>Tambah Data </button>  ");

});

$(document).on("click", "#btnAddKelas", function () {
    var className =  makeid(10);
    $("tbody").prepend(`
        <tr class="tr_${className}">
            <td><input type='text' class="form-control kode" id=''></td>
            <td><input type='text' class="form-control nama" id=''></td>
            <td><input type='text' class="form-control tingkat_id" id=''></td>
            <td><input type='text' class="form-control tahun_ajaran_id" id=''></td>
            <td><input type='text' class="form-control walikelas" id=''></td>
            <td><input type='date' class="form-control is_active" id=''></td>
            <td><input type='text' class="form-control created_at" id=''></td>
            <td><input type='date' class="form-control updated_at" id=''></td>
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

function getData(tr){
    var dataPost = new Object();
    dataPost.id =  tr;
    dataPost.kode = $(`.tr_${tr} .kode`).val();
    dataPost.kode = $(`.tr_${tr} .nama`).val();
    dataPost.tingkat_id =  $(`.tr_${tr} .tingkat_id`).val();
    dataPost.tahun_ajaran_id = $(`.tr_${tr} .tahun_ajaran`).val();
    dataPost.walikelas = $(`.tr_${tr} .walikelas`).val();
    dataPost.is_active = $(`.tr_${tr} .is_active`).val();
    dataPost.created_at = $(`.tr_${tr} .created_at`).val();
    dataPost.updated_at = $(`.tr_${tr} .updated_at`).val();

    return dataPost;
}

$(document).on("click", ".btnSave", function () {
    var idRow = $(this).attr("id").replace("btnSave_", "");
    var dataPost = getData(idRow);
    console.log("dataPost", dataPost);
  
    $.ajax({
      url: "kelas/add ",
      type: "POST",
  
      data: dataPost,
      success: function (response) {
        console.log(response);
  
        var data = response;
        if (data.id != "0") {
          $("tbody").prepend(`
                  <tr class="tr_${data.id}">
                      <td class="kode">${dataPost.kode}</td>
                      <td class="kode">${dataPost.nama}</td>
                      <td class="tingkat_id">${dataPost.tingkat_id}</td>
                      <td class="tahun_ajaran">${dataPost.tahun_ajaran}</td> 
                      <td class="walikelas">${dataPost.walikelas}</td> 
                      <td class="is_active">${dataPost.is_active}</td> 
                      <td class="created_at">${dataPost.created_at}</td>
                      <td class="updated_at">${dataPost.updated_at}</td> 
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