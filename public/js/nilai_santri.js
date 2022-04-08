var dropdownSiswa_kelas = "";
var dropdownMapel_kelas = "";

$(document).ready(function () {
  $(".dtNilai_santri .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddNilai_santri'>Tambah Data </button>  ");

  // mengambil data siswa_kelas
  $.ajax({
    url: "UniversalGetData/siswa_kelas",
    type:"Get",
    success:function(response) {
        dtSiswa_kelas = response;
        console.log('dtSiswa_kelas', dtSiswa_kelas);

        var i;
        for (i = 0; i < dtSiswa_kelas.length; ++i) {
            dropdownSiswa_kelas += `<option value="${dtSiswa_kelas[i]["id"]}">${dtSiswa_kelas[i]["id_siswa"]}</option>`;
        }
        dropdownSiswa_kelas = `<select class="form-control id_siswa_kelas">${dropdownSiswa_kelas} </select>`;
    },
    error:function(){
        alert("Gagal ambil data siswa_kelas");
    }

  });

    // mengambil data mapel_kelas
    $.ajax({
        url: "UniversalGetData/mapel_kelas",
        type:"Get",
        success:function(response) {
            dtMapel_kelas = response;
            console.log('dtMapel_kelas', dtMapel_kelas);

            var i;
            for (i = 0; i < dtMapel_kelas.length; ++i) {
                dropdownMapel_kelas += `<option value="${dtMapel_kelas[i]["id"]}">${dtMapel_kelas[i]["id_siswa"]}</option>`;
            }
            dropdownMapel_kelas = `<select class="form-control id_mapel_kelas">${dropdownMapel_kelas} </select>`;
        },
        error:function(){
            alert("Gagal ambil data mapel_kelas");
        }

    });
});

$(document).on("click", "#btnAddNilai_santri", function () {
  var className =  makeid(10);
  $("tbody").prepend(`
      <tr class="tr_${className}">
          <td>
              ${dropdownSiswa_kelas}
          </td>
          <td>
              ${dropdownMapel_kelas}
          </td>
          <td><input type='text' class="form-control nilai" id=''></td>
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
  dataPost.id_siswa_kelas = $(`.tr_${tr} .id_siswa_kelas`).val();
  ataPost.namaSiswa = $(`.tr_${tr} .id_siswa_kelas option:selected`).text();
  dataPost.id_mapel_kelas =  $(`.tr_${tr} .id_mapel_kelas`).val();
  ataPost.namaMapel = $(`.tr_${tr} .id_mapel_kelas option:selected`).text();
  dataPost.nilai = $(`.tr_${tr} .nilai`).val();

  return dataPost;
}

$(document).on("click", ".btnSave", function () {
  var idRow = $(this).attr("id").replace("btnSave_", "");
  var dataPost = getData(idRow);
  console.log("dataPost", dataPost);

  $.ajax({
    url: "nilai_santri/add ",
    type: "POST",

    data: dataPost,
    success: function (response) {
      console.log(response);

      var data = response;
      if (data.id != "0") {
        $("tbody").prepend(`
                <tr class="tr_${data.id}">
                    <td hidden class="id_siswa_kelas">${dataPost.id_siswa_kelas}</td>
                    <td class="namaSiswa">${dataPost.namaSiswa}</td>
                    <td hidden class="id_mapel_kelas">${dataPost.id_mapel_kelas}</td>
                    <td class="namaMapel">${dataPost.namaMapel}</td>
                    <td class="nilai">${dataPost.nilai}</td>  
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
  var id_siswa_kelas = $(`.tr_${idRow} .id_siswa_kelas`).html().trim();;
  var id_mapel_kelas = $(`.tr_${idRow} .id_mapel_kelas`).html().trim();;
  var nilai = $(`.tr_${idRow} .nilai`).html().trim();;

  $(`.tr_${idRow}`).hide();
  $(`.tr_${idRow}`).addClass(`lama_${idRow}`);

  $(`.tr_${idRow}`).before(`
      <tr class="tr_${idRow} formEdit_${idRow}">
          <td><input type='text' class="form-control id_siswa_kelas" id='' value='${id_siswa_kelas}'></td>
          <td><input type='text' class="form-control id_mapel_kelas" id='' value='${id_mapel_kelas}'></td>
          <td><input type='text' class="form-control nilai" id='' value='${nilai}'></td>
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
            url: "nilai_santri/update",
            type:"POST",
  
            data:dataPost,
            success:function(response) {
                var data = response;
                var dataTd = data.data;
                console.log('response', response);
                console.log('data id', response);
                $(`.formEdit_${idRow}`).before(`
                    <tr class="tr_${data.id}">
                        <td class="id_siswa_kelas">${dataPost.id_siswa_kelas}</td>
                        <td class="id_mapel_kelas">${dataPost.id_mapel_kelas}</td>
                        <td class="nilai">${dataPost.nilai}</td>
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