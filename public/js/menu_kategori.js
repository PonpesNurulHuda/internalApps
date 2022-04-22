$(document).ready(function () {
    $(".dtMenu_kategori .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddMenu_kategori'>Tambah Data </button>  ");

});

$(document).on("click", "#btnAddMenu_kategori", function () {
    var className =  makeid(10);
    
    $("tbody").prepend(`
        <tr class="tr_${className}">
            <td><input type='text' class="form-control nama" id=''></td>
            <td>
                <select class="form-control is_active">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
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

function getData(tr){
    var dataPost = new Object();
    dataPost.id =  tr;
    dataPost.nama = $(`.tr_${tr} .nama`).val().trim();
    dataPost.is_active = $(`.tr_${tr} .is_active`).val();

    return dataPost;
}

$(document).on("click", ".btnSave", function () {
    var idRow = $(this).attr("id").replace("btnSave_", "");
    var dataPost = getData(idRow);
    console.log("dataPost", dataPost);

    var error = 0;
    $(".pesanError").remove();
    if(dataPost.nama == ""){
        error = error + 1;
        $(`.tr_${idRow} td .nama`).after(`
        <span class='pesanError' style="color:red">Nama wajib diisi</span>
        `);
    }

    if(error == 0){
        $.ajax({
            url: "menu_kategori/add ",
            type: "POST",
        
            data: dataPost,
            success: function (response) {
              console.log(response);
        
              var data = response;
              if (data.id != "0") {
                $("tbody").prepend(`
                        <tr class="tr_${data.id}">
                            <td class="nama">${dataPost.nama}</td> 
                            <td class="is_active">${dataPost.is_active}</td> 
                            <td>
                                <button class='btn btn-info btn-xs btnEdit' id="tbnEdit_${data.id}">Edit</button> 
                                <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_${data.id}">Hapus</button> 
                            </td>
                        </tr>
                    `);
        
                $(".DataTable td").css({ "font-size": 20 });
                $(`.tr_${idRow}`).remove();
                addAlertSuccess('Data menu_kategori berhasil di tambah', 'success');
              }else{
                  alert(data.pesan);
              }
            },
            error: function () {
              alert("Terjadi kesalahan");
            },
        });
    }
  
    
});
  
// edit data

$(document).on("click", ".btnEdit", function () {
    var idRow = $(this).attr("id").replace("btnEdit_", "");
    console.log('idRow', idRow)
    var dataPost = getData(idRow);
    console.log(dataPost);
    var nama = $(`.tr_${idRow} .nama`).html().trim();;
    var is_active = $(`.tr_${idRow} .is_active`).html().trim();;
  
    $(`.tr_${idRow}`).hide();
    $(`.tr_${idRow}`).addClass(`lama_${idRow}`);
  
    $(`.tr_${idRow}`).before(`
        <tr class="tr_${idRow} formEdit_${idRow}">
            <td><input type='text' class="form-control nama" id='' value='${nama}'></td>
            <td><input type='text' class="form-control is_active" id='' value='${is_active}'></td>
            <td>
                <button class='btn btn-primary btnSaveEdit' id="btnSave_${idRow}">Simpan</button>
                <button class='btn btn-danger btnCancelEdit' id="btnCancel_${idRow}">Batal</button>
            </td>
        </tr>
    `);

});
  
// action update data
$(document).on("click", ".btnSaveEdit", function () {
    var idRow = $(this).attr("id").replace("btnSave_", "");
    var dataPost = getData(idRow);

    console.log(dataPost);

    var error = 0;
    $(".pesanError").remove();
    if(dataPost.nama == ""){
        error = error + 1;
        $(`.tr_${idRow} td .nama`).after(`
        <span class='pesanError' style="color:red">Nama wajib diisi</span>
        `);
    }
    console.log('error', error);

    if(error == 0){
        var yakin = confirm("Apakah anda yakin akan merubah data ini?");
        if (yakin) {
            $.ajax({
                url: "menu_kategori/update",
                type:"POST",
      
                data:dataPost,
                success:function(response) {
                    var data = response;
                    var dataTd = data.data;
                    console.log('response', response);
                    console.log('data id', response);
                    $(`.formEdit_${idRow}`).before(`
                        <tr class="tr_${data.id}">
                            <td class="nama">${dataPost.nama}</td>
                            <td class="is_active">${dataPost.is_active}</td>
                            <td>
                                <button class='btn btn-info btn-xs btnEdit' id="tbnEdit_${idRow}">Edit</button> 
                                <button class='btn btn-danger btn-xs' id="btnRemove_${idRow}">Hapus</button> 
                            </td>
                        </tr>
                    `);
      
                    $(".DataTable td").css({ 'font-size': 20 });
                    $(`.formEdit_${idRow}`).remove();
                    $(`.lama_${idRow}`).remove();
                    addAlertSuccess('Data menu_kategori berhasil di ubah', 'info');
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
    }
    
});