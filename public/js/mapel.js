var dropdownMapelTipe = "";
var dropdownMapel_kategori = "";

$(document).ready(function () {
    $(".dtMapel .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddMapel'>Tambah Data </button>  ");
    
    // mengambil data mapel tipe
    $.ajax({
        url: "UniversalGetData/mapelTipe",
        type:"Get",
        success:function(response) {
            dtMapelType = response;
            console.log('dtMapelType', dtMapelType);

            var i;
            for (i = 0; i < dtMapelType.length; ++i) {
                dropdownMapelTipe += `<option value="${dtMapelType[i]["id"]}">${dtMapelType[i]["nama"]}</option>`;
            }
            dropdownMapelTipe = `<select class="form-control mapel_type">${dropdownMapelTipe} </select>`;
        },
        error:function(){
            alert("Gagal ambil data mapel tipe");
        }

    });
    
    // mapel_kategori
    $.ajax({
        url: "UniversalGetData/mapel_kategori",
        type:"Get",
        success:function(response) {
            dtMapel_kategori = response;
            console.log('dtMapel_kategori', dtMapel_kategori);

            var i;
            for (i = 0; i < dtMapel_kategori.length; ++i) {
                dropdownMapel_kategori += `<option value="${dtMapel_kategori[i]["id"]}">${dtMapel_kategori[i]["nama"]}</option>`;
            }
            dropdownMapel_kategori = `<select class="form-control mapel_kategori_id">${dropdownMapel_kategori} </select>`;
        },
        error:function(){
            alert("Gagal ambil data Mapel_kategori");
        }

    });
});

$(document).on("click", "#btnAddMapel", function () {
    var className =  makeid(10);
    
    $("tbody").prepend(`
        <tr class="tr_${className}">
            <td><input type='text' class="form-control nama" id=''></td>
            <td><input type='text' class="form-control deskripsi" id=''></td>
            <td>
                ${dropdownMapel_kategori}    
            </td>
            <td>
                ${dropdownMapelTipe}
            </td>
            <td><input type='text' class="form-control is_active" id=''></td>
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
    dataPost.nama = $(`.tr_${tr} .nama`).val();
    dataPost.deskripsi =  $(`.tr_${tr} .deskripsi`).val();
    dataPost.mapel_kategori_id = $(`.tr_${tr} .mapel_kategori_id`).val();
    dataPost.mapel_type = $(`.tr_${tr} .mapel_type`).val();
    dataPost.is_active = $(`.tr_${tr} .is_active`).val();

    return dataPost;
}

$(document).on("click", ".btnSave", function () {
    var idRow = $(this).attr("id").replace("btnSave_", "");
    var dataPost = getData(idRow);
    console.log("dataPost", dataPost);
  
    $.ajax({
      url: "mapel/add ",
      type: "POST",
  
      data: dataPost,
      success: function (response) {
        console.log(response);
  
        var data = response;
        if (data.id != "0") {
          $("tbody").prepend(`
                  <tr class="tr_${data.id}">
                      <td class="nama">${dataPost.nama}</td>
                      <td class="deskripsi">${dataPost.deskripsi}</td>
                      <td class="mapel_kategori_id">${dataPost.mapel_kategori_id}</td> 
                      <td class="mapel_type">${dataPost.mapel_type}</td> 
                      <td class="is_active">${dataPost.is_active}</td> 
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
    var nama = $(`.tr_${idRow} .nama`).html().trim();;
    var deskripsi = $(`.tr_${idRow} .deskripsi`).html().trim();
    var mapel_kategori_id = $(`.tr_${idRow} .mapel_kategori_id`).html().trim();;
    var mapel_type = $(`.tr_${idRow} .mapel_type`).html().trim();;
    var is_active = $(`.tr_${idRow} .is_active`).html().trim();;
  
    $(`.tr_${idRow}`).hide();
    $(`.tr_${idRow}`).addClass(`lama_${idRow}`);
  
    $(`.tr_${idRow}`).before(`
        <tr class="tr_${idRow} formEdit_${idRow}">
            <td><input type='text' class="form-control nama" id='' value='${nama}'></td>
            <td><input type='text' class="form-control deskripsi" id='' value='${deskripsi}'></td>
            <td><input type='text' class="form-control mapel_kategori_id" id='' value='${mapel_kategori_id}'></td>
            <td><input type='text' class="form-control mapel_type" id='' value='${mapel_type}'></td>
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
    var yakin = confirm("Apakah anda yakin akan merubah data ini?");
    var idRow = $(this).attr("id").replace("btnSave_", "");
  
    if (yakin) {
        var dataPost = getData(idRow);
        console.log(dataPost);
  
        $.ajax({
            url: "mapel/update",
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
                        <td class="deskripsi">${dataPost.deskripsi}</td>
                        <td class="mapel_kategori_id">${dataPost.mapel_kategori_id}</td>
                        <td class="mapel_type">${dataPost.mapel_type}</td>
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