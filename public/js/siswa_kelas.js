var dropdownSantri = "";
var dropdownKelas = "";


$(document).ready(function () {
    $(".dtSiswa_kelas .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddSiswa_kelas'>Tambah Data </button>  ");

        // siswa
        $.ajax({
            url: "UniversalGetData/santri",
            type:"Get",
            success:function(response) {
                dtSantri = response;
                console.log('dtSantri', dtSantri);
    
                var i;
                for (i = 0; i < dtSantri.length; ++i) {
                    dropdownSantri += `<option value="${dtSantri[i]["id"]}">${dtSantri[i]["nama"]}</option>`;
                }

                dropdownSantri = `<select class="form-control id_siswa">${dropdownSantri} </select>`;
            },
            error:function(){
                alert("Gagal ambil data santri");
            }
    
        });

        // kelas
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

                dropdownKelas = `<select class="form-control id_kelas">${dropdownKelas} </select>`;
            },
            error:function(){
                alert("Gagal ambil data kelas");
            }
    
        });
});

$(document).on("click", "#btnAddSiswa_kelas", function () {
    var className =  makeid(10);

    $("tbody").prepend(`
        <tr class="tr_${className}">
            <td>
                ${dropdownSantri}
            </td>
            <td>
                ${dropdownKelas}
            </td>
            <td>
                <select class='form-control is_active'>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </td>
            <td><input type='date' class="form-control created_at" id=''></td>
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
    dataPost.id_siswa = $(`.tr_${tr} .id_siswa`).val();
    dataPost.namaSiswa = $(`.tr_${tr} .id_siswa option:selected`).text();
    dataPost.id_kelas =  $(`.tr_${tr} .id_kelas`).val();
    dataPost.namaKelas = $(`.tr_${tr} .id_kelas option:selected`).text();
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
      url: "siswa_kelas/add ",
      type: "POST",
  
      data: dataPost,
      success: function (response) {
        console.log(response);
  
        var data = response;
        if (data.id != "0") {
          $("tbody").prepend(`
                  <tr class="tr_${data.id}">
                      <td hidden class="id_siswa">${dataPost.id_siswa}</td>
                      <td class="namaSiswa">${dataPost.namaSiswa}</td>
                      <td hidden class="id_kelas">${dataPost.id_kelas}</td>
                      <td class="namaKelas">${dataPost.namaKelas}</td>
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
  
// edit data

$(document).on("click", ".btnEdit", function () {
    var idRow = $(this).attr("id").replace("btnEdit_", "");
    console.log('idRow', idRow)
    var dataPost = getData(idRow);
    console.log(dataPost);
    var id_siswa = $(`.tr_${idRow} .id_siswa`).html().trim();;
    var id_kelas = $(`.tr_${idRow} .id_kelas`).html().trim();;
    var is_active = $(`.tr_${idRow} .is_active`).html().trim();;
    var created_at = $(`.tr_${idRow} .created_at`).html().trim();;
    var updated_at = $(`.tr_${idRow} .updated_at`).html().trim();;
  
    $(`.tr_${idRow}`).hide();
    $(`.tr_${idRow}`).addClass(`lama_${idRow}`);
  
    $(`.tr_${idRow}`).before(`
        <tr class="tr_${idRow} formEdit_${idRow}">
            <td>
                ${dropdownSantri}
            </td>
            <td>
                ${dropdownKelas}
            </td>
            <td><input type='text' class="form-control is_active" id='' value='${is_active}'></td>
            <td><input type='date' class="form-control created_at" id='' value='${created_at}'></td>
            <td><input type='date' class="form-control updated_at" id='' value='${updated_at}'></td>
            <td>
                <button class='btn btn-primary btnSaveEdit' id="btnSave_${idRow}">Simpan</button>
                <button class='btn btn-danger btnCancelEdit' id="btnCancel_${idRow}">Batal</button>
            </td>
        </tr>
    `);

    $(`.tr_${idRow} .id_siswa`).val(id_siswa);
    $(`.tr_${idRow} .id_kelas`).val(id_kelas);
  });

  // action update data
$(document).on("click", ".btnSaveEdit", function () {
    var yakin = confirm("Apakah anda yakin akan merubah data ini?");
    var idRow = $(this).attr("id").replace("btnSave_", "");
  
    if (yakin) {
        var dataPost = getData(idRow);
        console.log(dataPost);
  
        $.ajax({
            url: "siswa_kelas/update",
            type:"POST",
  
            data:dataPost,
            success:function(response) {
                var data = response;
                var dataTd = data.data;
                console.log('response', response);
                console.log('data id', response);
                $(`.formEdit_${idRow}`).before(`
                    <tr class="tr_${data.id}">
                        <td hidden class="id_siswa">${dataPost.id_siswa}</td>
                        <td class="namaSiswa">${dataPost.namaSiswa}</td>
                        <td hidden class="id_kelas">${dataPost.id_kelas}</td>
                        <td class="namaKelas">${dataPost.namaKelas}</td>
                        <td class="is_active">${dataPost.is_active}</td>
                        <td class="created_at">${dataPost.created_at}</td>
                        <td class="updated_at">${dataPost.updated_at}</td>
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
  