$(document).ready(function () {
    $(".dtMenu .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddMenu'>Tambah Data </button>  ");

});

$(document).on("click", "#btnAddMenu", function () {
    var className =  makeid(10);
    $("tbody").prepend(`
        <tr class="tr_${className}">
            <td><input type='text' class="form-control nama" id=''></td>
            <td><input type='text' class="form-control icon" id=''></td>
            <td><input type='text' class="form-control app_controller" id=''></td>
            <td><input type='text' class="form-control app_funciton" id=''></td>
            <td>
                <select class='form-control is_have_child'>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </td>
            <td><input type='text' class="form-control related_id" id=''></td>
            <td>
                <select class='form-control is_active'>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </td>
            <td><input type='text' class="form-control seqno" id=''></td>
            <td><input type='text' class="form-control menu_kategori" id=''></td>
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
    dataPost.icon =  $(`.tr_${tr} .icon`).val().trim();
    dataPost.app_controller = $(`.tr_${tr} .app_controller`).val().trim();
    dataPost.app_funciton = $(`.tr_${tr} .app_funciton`).val().trim();
    dataPost.is_have_child = $(`.tr_${tr} .is_have_child`).val();
    dataPost.related_id = $(`.tr_${tr} .related_id`).val().trim();
    dataPost.is_active = $(`.tr_${tr} .is_active`).val();
    dataPost.seqno = $(`.tr_${tr} .seqno`).val().trim();
    dataPost.menu_kategori = $(`.tr_${tr} .menu_kategori`).val().trim();

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

    var error = 0;
    $(".pesanError").remove();
    if(dataPost.icon == ""){
        error = error + 1;
        $(`.tr_${idRow} td .icon`).after(`
        <span class='pesanError' style="color:red">Icon wajib diisi</span>
        `);
    }

    var error = 0;
    $(".pesanError").remove();
    if(dataPost.app_controller == ""){
        error = error + 1;
        $(`.tr_${idRow} td .app_controller`).after(`
        <span class='pesanError' style="color:red">App_controller wajib diisi</span>
        `);
    }

    var error = 0;
    $(".pesanError").remove();
    if(dataPost.app_funciton == ""){
        error = error + 1;
        $(`.tr_${idRow} td .app_funciton`).after(`
        <span class='pesanError' style="color:red">App_funciton wajib diisi</span>
        `);
    }

    var error = 0;
    $(".pesanError").remove();
    if(dataPost.related_id == ""){
        error = error + 1;
        $(`.tr_${idRow} td .related_id`).after(`
        <span class='pesanError' style="color:red">Related_id wajib diisi</span>
        `);
    }

    var error = 0;
    $(".pesanError").remove();
    if(dataPost.seqno == ""){
        error = error + 1;
        $(`.tr_${idRow} td .seqno`).after(`
        <span class='pesanError' style="color:red">Seqno wajib diisi</span>
        `);
    }

    var error = 0;
    $(".pesanError").remove();
    if(dataPost.menu_kategori == ""){
        error = error + 1;
        $(`.tr_${idRow} td .menu_kategori`).after(`
        <span class='pesanError' style="color:red">Menu_kategori wajib diisi</span>
        `);
    }

    if(error == 0){
        $.ajax({
            url: "menu/add ",
            type: "POST",
        
            data: dataPost,
            success: function (response) {
              console.log(response);
        
              var data = response;
              if (data.id != "0") {
                $("tbody").prepend(`
                        <tr class="tr_${data.id}">
                            <td class="nama">${dataPost.nama}</td>
                            <td class="icon">${dataPost.icon}</td>
                            <td class="app_controller">${dataPost.app_controller}</td>  
                            <td class="app_funciton">${dataPost.app_funciton}</td>  
                            <td class="is_have_child">${dataPost.is_have_child}</td>  
                            <td class="related_id">${dataPost.related_id}</td>  
                            <td class="is_active">${dataPost.is_active}</td>  
                            <td class="seqno">${dataPost.seqno}</td>  
                            <td class="menu_kategori">${dataPost.menu_kategori}</td>  
                            <td>
                                <button class='btn btn-info btn-xs btnEdit' id="tbnEdit_${data.id}">Edit</button> 
                                <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_${data.id}">Hapus</button> 
                            </td>
                        </tr>
                    `);
        
                $(".DataTable td").css({ "font-size": 20 });
                $(`.tr_${idRow}`).remove();
                addAlertSuccess('Data menu berhasil di tambah', 'success');
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
    var icon = $(`.tr_${idRow} .icon`).html().trim();;
    var app_controller = $(`.tr_${idRow} .app_controller`).html().trim();;
    var app_funciton = $(`.tr_${idRow} .app_funciton`).html().trim();;
    var is_have_child = $(`.tr_${idRow} .is_have_child`).html().trim();;
    var related_id = $(`.tr_${idRow} .related_id`).html().trim();;
    var is_active = $(`.tr_${idRow} .is_active`).html().trim();;
    var seqno = $(`.tr_${idRow} .seqno`).html().trim();;
    var menu_kategori = $(`.tr_${idRow} .menu_kategori`).html().trim();;
  
    $(`.tr_${idRow}`).hide();
    $(`.tr_${idRow}`).addClass(`lama_${idRow}`);
  
    $(`.tr_${idRow}`).before(`
        <tr class="tr_${idRow} formEdit_${idRow}">
            <td><input type='text' class="form-control nama" id='' value='${nama}'></td>
            <td><input type='text' class="form-control icon" id='' value='${icon}'></td>
            <td><input type='text' class="form-control app_controller" id='' value='${app_controller}'></td>
            <td><input type='text' class="form-control app_funciton" id='' value='${app_funciton}'></td>
            <td><input type='text' class="form-control is_have_child" id='' value='${is_have_child}'></td>
            <td><input type='text' class="form-control related_id" id='' value='${related_id}'></td>
            <td><input type='text' class="form-control is_active" id='' value='${is_active}'></td>
            <td><input type='text' class="form-control seqno" id='' value='${seqno}'></td>
            <td><input type='text' class="form-control menu_kategori" id='' value='${menu_kategori}'></td>
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

    var error = 0;
    $(".pesanError").remove();
    if(dataPost.icon == ""){
        error = error + 1;
        $(`.tr_${idRow} td .icon`).after(`
        <span class='pesanError' style="color:red">Icon wajib diisi</span>
        `);
    }

    var error = 0;
    $(".pesanError").remove();
    if(dataPost.app_controller == ""){
        error = error + 1;
        $(`.tr_${idRow} td .app_controller`).after(`
        <span class='pesanError' style="color:red">App_controller wajib diisi</span>
        `);
    }

    var error = 0;
    $(".pesanError").remove();
    if(dataPost.app_funciton == ""){
        error = error + 1;
        $(`.tr_${idRow} td .app_funciton`).after(`
        <span class='pesanError' style="color:red">App_funciton wajib diisi</span>
        `);
    }

    var error = 0;
    $(".pesanError").remove();
    if(dataPost.related_id == ""){
        error = error + 1;
        $(`.tr_${idRow} td .related_id`).after(`
        <span class='pesanError' style="color:red">Related_id wajib diisi</span>
        `);
    }
    console.log('error', error);

    var error = 0;
    $(".pesanError").remove();
    if(dataPost.seqno == ""){
        error = error + 1;
        $(`.tr_${idRow} td .seqno`).after(`
        <span class='pesanError' style="color:red">Seqno wajib diisi</span>
        `);
    }
    console.log('error', error);

    var error = 0;
    $(".pesanError").remove();
    if(dataPost.menu_kategori == ""){
        error = error + 1;
        $(`.tr_${idRow} td .menu_kategori`).after(`
        <span class='pesanError' style="color:red">Menu_kategori wajib diisi</span>
        `);
    }
    console.log('error', error);

    if(error == 0){
        var yakin = confirm("Apakah anda yakin akan merubah data ini?");
        if (yakin) {
            $.ajax({
                url: "menu/update",
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
                            <td class="icon">${dataPost.icon}</td>
                            <td class="app_controller">${dataPost.app_controller}</td>
                            <td class="app_funciton">${dataPost.app_funciton}</td>
                            <td class="is_have_child">${dataPost.is_have_child}</td>
                            <td class="related_id">${dataPost.related_id}</td>
                            <td class="is_active">${dataPost.is_active}</td>
                            <td class="seqno">${dataPost.seqno}</td>
                            <td class="menu_kategori">${dataPost.menu_kategori}</td>
                            <td>
                                <button class='btn btn-info btn-xs btnEdit' id="tbnEdit_${idRow}">Edit</button> 
                                <button class='btn btn-danger btn-xs' id="btnRemove_${idRow}">Hapus</button> 
                            </td>
                        </tr>
                    `);
      
                    $(".DataTable td").css({ 'font-size': 20 });
                    $(`.formEdit_${idRow}`).remove();
                    $(`.lama_${idRow}`).remove();
                    addAlertSuccess('Data menu berhasil di ubah', 'info');
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