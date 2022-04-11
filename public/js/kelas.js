var dropdownTahun_ajaran = "";
var dropdownTingkat = "";

$(document).ready(function () {
    $(".dtKelas .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddKelas'>Tambah Data </button>  ");

    // mengambil data tingkat
    $.ajax({
        url: "UniversalGetData/tingkat",
        type:"Get",
        success:function(response) {
            dtTingkat = response;
            console.log('dtTingkat', dtTingkat);

            var i;
            for (i = 0; i < dtTingkat.length; ++i) {
                dropdownTingkat += `<option value="${dtTingkat[i]["id"]}">${dtTingkat[i]["nama"]}</option>`;
            }
            dropdownTingkat = `<select class="form-control tingkat_id">${dropdownTingkat} </select>`;
        },
        error:function(){
            alert("Gagal ambil data tingkat");
        }

    });

    // mengambil data tahun_ajaran
    $.ajax({
        url: "UniversalGetData/tahun_ajaran",
        type:"Get",
        success:function(response) {
            dtTahun_ajaran = response;
            console.log('dtTahun_ajaran', dtTahun_ajaran);

            var i;
            for (i = 0; i < dtTahun_ajaran.length; ++i) {
                dropdownTahun_ajaran += `<option value="${dtTahun_ajaran[i]["id"]}">${dtTahun_ajaran[i]["nama"]}</option>`;
            }
            dropdownTahun_ajaran = `<select class="form-control tahun_ajaran_id">${dropdownTahun_ajaran} </select>`;
        },
        error:function(){
            alert("Gagal ambil data tahun_ajaran");
        }

    });
});

$(document).on("click", "#btnAddKelas", function () {
    var className =  makeid(10);
    $("tbody").prepend(`
    
        <tr class="tr_${className}">
            <td><input type='text' class="form-control kode" id=''></td>
            <td><input type='text' class="form-control nama" id=''></td>
            <td>
                ${dropdownTingkat} 
            </td>
            <td>
                ${dropdownTahun_ajaran}    
            </td>
            <td><input type='text' class="form-control walikelas" id=''></td>
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
    dataPost.kode = $(`.tr_${tr} .kode`).val();
    dataPost.nama = $(`.tr_${tr} .nama`).val();
    dataPost.tingkat_id =  $(`.tr_${tr} .tingkat_id`).val();
    dataPost.namaTingkat = $(`.tr_${tr} .tingkat_id option:selected`).text();
    dataPost.tahun_ajaran_id = $(`.tr_${tr} .tahun_ajaran_id`).val();
    dataPost.namaAjaran = $(`.tr_${tr} .tahun_ajaran_id option:selected`).text();
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
                      <td class="nama">${dataPost.nama}</td>
                      <td hidden class="tingkat_id">${dataPost.tingkat_id}</td>
                      <td class="namaTingkat">${dataPost.namaTingkat}</td>
                      <td hidden class="tahun_ajaran_id">${dataPost.tahun_ajaran_id}</td>
                      <td class="namaAjaran">${dataPost.namaAjaran}</td> 
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
  
// edit data

$(document).on("click", ".btnEdit", function () {
    var idRow = $(this).attr("id").replace("btnEdit_", "");
    console.log('idRow', idRow)
    var dataPost = getData(idRow);
    console.log(dataPost);
    var kode = $(`.tr_${idRow} .kode`).html().trim();;
    var nama = $(`.tr_${idRow} .nama`).html().trim();;
    var tingkat_id = $(`.tr_${idRow} .tingkat_id`).html().trim();;
    var tahun_ajaran_id = $(`.tr_${idRow} .tahun_ajaran_id`).html().trim();;
    var walikelas = $(`.tr_${idRow} .walikelas`).html().trim();;
    var is_active = $(`.tr_${idRow} .is_active`).html().trim();;
    var created_at = $(`.tr_${idRow} .created_at`).html().trim();;
    var updated_at = $(`.tr_${idRow} .updated_at`).html().trim();;
  
    $(`.tr_${idRow}`).hide();
    $(`.tr_${idRow}`).addClass(`lama_${idRow}`);
  
    $(`.tr_${idRow}`).before(`
        <tr class="tr_${idRow} formEdit_${idRow}">
            <td><input type='text' class="form-control kode" id='' value='${kode}'></td>
            <td><input type='text' class="form-control nama" id='' value='${nama}'></td>
            <td>
                ${dropdownTingkat}  
            </td>
            <td>
                ${dropdownTahun_ajaran}    
            </td>
            <td><input type='text' class="form-control walikelas" id='' value='${walikelas}'></td>
            <td><input type='text' class="form-control is_active" id='' value='${is_active}'></td>
            <td><input type='date' class="form-control created_at" id='' value='${created_at}'></td>
            <td><input type='date' class="form-control updated_at" id='' value='${updated_at}'></td>
            <td>
                <button class='btn btn-primary btnSaveEdit' id="btnSave_${idRow}">Simpan</button>
                <button class='btn btn-danger btnCancelEdit' id="btnCancel_${idRow}">Batal</button>
            </td>
        </tr>
    `);

    $(`.tr_${idRow} .tahun_ajaran_id`).val(tahun_ajaran_id);
    $(`.tr_${idRow} .tingkat_id`).val(tingkat_id);
});

  // action update data
$(document).on("click", ".btnSaveEdit", function () {
    var yakin = confirm("Apakah anda yakin akan merubah data ini?");
    var idRow = $(this).attr("id").replace("btnSave_", "");
  
    if (yakin) {
        var dataPost = getData(idRow);
        console.log(dataPost);
  
        $.ajax({
            url: "kelas/update",
            type:"POST",
  
            data:dataPost,
            success:function(response) {
                var data = response;
                var dataTd = data.data;
                console.log('response', response);
                console.log('data id', response);
                $(`.formEdit_${idRow}`).before(`
                    <tr class="tr_${data.id}">
                        <td class="kode">${dataPost.kode}</td>
                        <td class="nama">${dataPost.nama}</td>
                        <td hidden class="tingkat_id">${dataPost.tingkat_id}</td>
                        <td class="namaTingkat">${dataPost.namaTingkat}</td>
                        <td hidden class="tahun_ajaran_id">${dataPost.tahun_ajaran_id}</td>
                        <td class="namaAjaran">${dataPost.namaAjaran}</td>
                        <td class="walikelas">${dataPost.walikelas}</td>
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
    }    $(`.tr_${idRow}`).removeClass(`lama_${idRow}`);

});
