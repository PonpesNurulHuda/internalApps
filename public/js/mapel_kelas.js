$(document).ready(function () {
    $(".dtMapel_kelas .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddMapel_kelas'>Tambah Data </button>  ");

});

$(document).on("click", "#btnAddMapel_kelas", function () {
    var className =  makeid(10);
    $("tbody").prepend(`
        <tr class="tr_${className}">
            <td><input type='text' class="form-control nama" id=''></td>
            <td><input type='text' class="form-control kelas_id" id=''></td>
            <td><input type='text' class="form-control semester_id" id=''></td>
            <td><input type='text' class="form-control maple_id" id=''></td>
            <td><input type='date' class="form-control mustahiq" id=''></td>
            <td><input type='date' class="form-control keterangan" id=''></td>
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
    dataPost.nama = $(`.tr_${tr} .nama`).val();
    dataPost.kelas =  $(`.tr_${tr} .kelas`).val();
    dataPost.semester_id = $(`.tr_${tr} .semester_id`).val();
    dataPost.maple_id = $(`.tr_${tr} .maple_id`).val();
    dataPost.mustahiq = $(`.tr_${tr} .mustahiq`).val();
    dataPost.keterangan = $(`.tr_${tr} .keterangan`).val();


    return dataPost;
}

$(document).on("click", ".btnSave", function () {
    var idRow = $(this).attr("id").replace("btnSave_", "");
    var dataPost = getData(idRow);
    console.log("dataPost", dataPost);
  
    $.ajax({
      url: "mapel_kelas/add ",
      type: "POST",
  
      data: dataPost,
      success: function (response) {
        console.log(response);
  
        var data = response;
        if (data.id != "0") {
          $("tbody").prepend(`
                  <tr class="tr_${data.id}">
                      <td class="nama">${dataPost.nama}</td>
                      <td class="kelas_id">${dataPost.kelas_id}</td>
                      <td class="semester_id">${dataPost.semester_id}</td> 
                      <td class="maple_id">${dataPost.maple_id}</td> 
                      <td class="mustahiq">${dataPost.mustahiq}</td> 
                      <td class="keterangan">${dataPost.keterangan}</td> 
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
  