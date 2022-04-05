$(document).ready(function () {
    $(".dtNilai_akhlaq_santri .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddNilai_akhlaq_santri'>Tambah Data </button>  ");

});

$(document).on("click", "#btnAddNilai_akhlaq_santri", function () {
    var className =  makeid(10);
    $("tbody").prepend(`
        <tr class="tr_${className}">
            <td><input type='text' class="form-control id_santri" id=''></td>
            <td><input type='text' class="form-control id_semester" id=''></td>
            <td><input type='text' class="form-control akhlaq" id=''></td>
            <td><input type='text' class="form-control kerapihan" id=''></td>
            <td><input type='text' class="form-control kerajinan" id=''></td>
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
    dataPost.id_santri = $(`.tr_${tr} .id_santri`).val();
    dataPost.id_semester =  $(`.tr_${tr} .id_semester`).val();
    dataPost.akhlaq= $(`.tr_${tr} .akhlaq`).val();
    dataPost.kerapihan =  $(`.tr_${tr} .kerapihan`).val();
    dataPost.kerajinan= $(`.tr_${tr} .kerajinan`).val();

    return dataPost;
}

$(document).on("click", ".btnSave", function () {
    var idRow = $(this).attr("id").replace("btnSave_", "");
    var dataPost = getData(idRow);
    console.log("dataPost", dataPost);
  
    $.ajax({
      url: "nilai_akhlaq_santri/add ",
      type: "POST",
  
      data: dataPost,
      success: function (response) {
        console.log(response);
  
        var data = response;
        if (data.id != "0") {
          $("tbody").prepend(`
                  <tr class="tr_${data.id}">
                      <td class="id_santri">${dataPost.id_santri}</td>
                      <td class="id_semester">${dataPost.id_semester}</td>
                      <td class="akhlaq">${dataPost.akhlaq}</td>
                      <td class="kerapihan">${dataPost.kerapihan}</td>
                      <td class="kerajinan">${dataPost.kerajinan}</td>  
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
    var id_santri = $(`.tr_${idRow} .id_santri`).html().trim();;
    var id_semester = $(`.tr_${idRow} .id_semester`).html().trim();;
    var akhlaq = $(`.tr_${idRow} .akhlaq`).html().trim();;
    var kerapihan = $(`.tr_${idRow} .kerapihan`).html().trim();;
    var kerajinan = $(`.tr_${idRow} .kerajinan`).html().trim();;
  
    $(`.tr_${idRow}`).hide();
    $(`.tr_${idRow}`).addClass(`lama_${idRow}`);
  
    $(`.tr_${idRow}`).before(`
        <tr class="tr_${idRow} formEdit_${idRow}">
            <td><input type='text' class="form-control id_santri" id='' value='${id_santri}'></td>
            <td><input type='text' class="form-control id_semester" id='' value='${id_semester}'></td>
            <td><input type='text' class="form-control akhlaq" id='' value='${akhlaq}'></td>
            <td><input type='text' class="form-control kerapihan" id='' value='${kerapihan}'></td>
            <td><input type='text' class="form-control kerajinan" id='' value='${kerajinan}'></td>
            <td>
                <button class='btn btn-primary btnSaveEdit' id="btnSave_${idRow}">Simpan</button>
                <button class='btn btn-danger btnCancelEdit' id="btnCancel_${idRow}">Batal</button>
            </td>
        </tr>
    `);
});

// action update data
$(document).on("click", ".btnSaveEdit", function () {
    var yakin = confirm("Apakah anda yakin akan merubah data ini?");
    var idRow = $(this).attr("id").replace("btnSave_", "");
  
    if (yakin) {
        var dataPost = getData(idRow);
        console.log(dataPost);
  
        $.ajax({
            url: "nilai_akhlaq_santri/update",
            type:"POST",
  
            data:dataPost,
            success:function(response) {
                var data = response;
                var dataTd = data.data;
                console.log('response', response);
                console.log('data id', response);
                $(`.formEdit_${idRow}`).before(`
                    <tr class="tr_${data.id}">
                        <td class="id_santri">${dataPost.id_santri}</td>
                        <td class="id_semester">${dataPost.id_semester}</td>
                        <td class="akhlaq">${dataPost.akhlaq}</td>
                        <td class="kerapihan">${dataPost.kerapihan}</td>
                        <td class="kerajinan">${dataPost.kerajinan}</td>
                        <td>
                            <button class='btn btn-info btn-xs btnEdit' id="tbnEdit_${idRow}">Edit</button> 
                            <button class='btn btn-danger btn-xs' id="btnRemove_${idRow}">Hapus</button> 
                        </td>
                    </tr>
                `);
  
                $(".DataTable td").css({ 'font-size': 20 });
                $(`.formEdit_${idRow}`).remove();
                $(`.lama_${idRow}`).remove();
            },
            error:function(){
                alert("Terjadi kesalahan");
            }
  
        });
    } else {
        console.log('batal', idRow);
        $(`.tr_${idRow}`).show();
        $(`.formEdit_${idRow}`).remove();
        $(`.tr_${idRow}`).removeClass(`lama_${idRow}`);
    }
});