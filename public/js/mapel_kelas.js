var dropdownKelas = "";
var dropdownSemester = "";
var dropdownMapel = "";

$(document).ready(function () {
    $(".dtMapel_kelas .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddMapel_kelas'>Tambah Data </button>  ");

    // mengambil data kelas
    $.ajax({
        url: "UniversalGetData/kelas",
        type:"Get",
        success:function(response) {
            dtKelas = response;
            console.log('dtKelas', dtKelas);

            var i;
            for (i = 0; i < dtKelas.length; ++i) {
                dropdownKelas += `<option value="${dtKelas[i]["id"]}">${dtKelas[i]["nama"]}</option>`;
            }
            dropdownKelas = `<select class="form-control kelas_id">${dropdownKelas} </select>`;
        },
        error:function(){
            alert("Gagal ambil data kelas");
        }

    });

    // mengambil data semester
    $.ajax({
        url: "UniversalGetData/semester",
        type:"Get",
        success:function(response) {
            dtSemester = response;
            console.log('dtSemester', dtSemester);

            var i;
            for (i = 0; i < dtSemester.length; ++i) {
                dropdownSemester += `<option value="${dtSemester[i]["id"]}">${dtSemester[i]["nama"]}</option>`;
            }
            dropdownSemester = `<select class="form-control semester_id">${dropdownSemester} </select>`;
        },
        error:function(){
            alert("Gagal ambil data semester");
        }

    });

    // mengambil data mapel
    $.ajax({
        url: "UniversalGetData/mapel",
        type:"Get",
        success:function(response) {
            dtMapel = response;
            console.log('dtMapel', dtMapel);

            var i;
            for (i = 0; i < dtMapel.length; ++i) {
                dropdownMapel += `<option value="${dtMapel[i]["id"]}">${dtMapel[i]["nama"]}</option>`;
            }
            dropdownMapel = `<select class="form-control mapel_id">${dropdownMapel} </select>`;
        },
        error:function(){
            alert("Gagal ambil data mapel");
        }

    });
});

$(document).on("click", "#btnAddMapel_kelas", function () {
    var className =  makeid(10);
    $("tbody").prepend(`
        <tr class="tr_${className}">
            <td><input type='text' class="form-control nama" id=''></td>
            <td>
                ${dropdownKelas}     
            </td>
            <td>
                ${dropdownSemester}    
            </td>
            <td>
                ${dropdownMapel}    
            </td>
            <td><input type='text' class="form-control mustahiq" id=''></td>
            <td><input type='text' class="form-control keterangan" id=''></td>
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
    dataPost.kelas_id =  $(`.tr_${tr} .kelas_id`).val();
    dataPost.semester_id = $(`.tr_${tr} .semester_id`).val();
    dataPost.mapel_id = $(`.tr_${tr} .mapel_id`).val();
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
                      <td class="mapel_id">${dataPost.mapel_id}</td> 
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
  
// edit data

$(document).on("click", ".btnEdit", function () {
    var idRow = $(this).attr("id").replace("btnEdit_", "");
    console.log('idRow', idRow)
    var dataPost = getData(idRow);
    console.log(dataPost);
    var nama = $(`.tr_${idRow} .nama`).html().trim();;
    var kelas_id = $(`.tr_${idRow} .kelas_id`).html().trim();;
    var semester_id = $(`.tr_${idRow} .semester_id`).html().trim();;
    var mapel_id = $(`.tr_${idRow} .mapel_id`).html().trim();;
    var mustahiq = $(`.tr_${idRow} .mustahiq`).html().trim();;
    var keterangan = $(`.tr_${idRow} .keterangan`).html().trim();;
  
    $(`.tr_${idRow}`).hide();
    $(`.tr_${idRow}`).addClass(`lama_${idRow}`);
  
    $(`.tr_${idRow}`).before(`
        <tr class="tr_${idRow} formEdit_${idRow}">
            <td><input type='text' class="form-control nama" id='' value='${nama}'></td>
            <td><input type='text' class="form-control kelas_id" id='' value='${kelas_id}'></td>
            <td><input type='text' class="form-control semester_id" id='' value='${semester_id}'></td>
            <td><input type='text' class="form-control mapel_id" id='' value='${mapel_id}'></td>
            <td><input type='text' class="form-control mustahiq" id='' value='${mustahiq}'></td>
            <td><input type='text' class="form-control keterangan" id='' value='${keterangan}'></td>
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
            url: "mapel_kelas/update",
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
                        <td class="kelas-id">${dataPost.kelas_id}</td>
                        <td class="semester_id">${dataPost.semester_id}</td>
                        <td class="mapel_id">${dataPost.mapel_id}</td>
                        <td class="mustahiq">${dataPost.mustahiq}</td>
                        <td class="keterangan">${dataPost.keterangan}</td>
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