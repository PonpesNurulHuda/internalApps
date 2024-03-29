$(document).ready(function () {
  $(".dtSantri .dataTable-dropdown label").before(
    "<button class='btn btn-primary' id='btnAddSantri'>Tambah Data </button>  "
  );
});

$(document).on("click", "#btnAddSantri", function () {
  var className = makeid(10);
  $("tbody").prepend(`
        <tr class="tr_${className}">
            <td><input type='text' class="form-control nis" id=''></td>
            <td><input type='text' class="form-control nama" id=''></td>
            <td><input type='date' class="form-control tanggal_lahir" id=''></td>
            <td>
                <select class="form-control gender">
                    <option value="L">Laki - Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </td>
            <td colspan="2">
                <input type='text' class="form-control no_hp1" id='' value=''>
                <input type='text' class="form-control no_hp2" id='' value=''>
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

function getData(tr) {
  var dataPost = new Object();
  dataPost.id = tr;
  dataPost.nis = $(`.tr_${tr} .nis`).val().trim();
  dataPost.nama = $(`.tr_${tr} .nama`).val().trim();
  dataPost.no_hp1 = $(`.tr_${tr} .no_hp1`).val().trim();
  dataPost.no_hp2 = $(`.tr_${tr} .no_hp2`).val().trim();
  
  dataPost.tanggal_lahir = $(`.tr_${tr} .tanggal_lahir`).html();
  dataPost.gender = $(`.tr_${tr} .gender`).val();
  dataPost.is_mustahiq = $(`.tr_${tr} .is_mustahiq`).html();


  return dataPost;
}

$(document).on("click", ".btnSave", function () {
  var idRow = $(this).attr("id").replace("btnSave_", "");
  var dataPost = getData(idRow);
  console.log("dataPost", dataPost);

  var error = 0;
    $(".pesanError").remove();
    var error = 0;
    $(".pesanError").remove();
    if(dataPost.nis == ""){
        error = error + 1;
        $(`.tr_${idRow} td .nis`).after(`
        <span class='pesanError' style="color:red">Nis wajib diisi</span>
        `);
    }

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
        url: "santri/add",
        type: "POST",
    
        data: dataPost,
        success: function (response) {
          console.log(response);
    
          var data = response;
          if (data.id != "0") {
            $("tbody").prepend(`
                    <tr class="tr_${data.id}">
                        <td class="nis">${dataPost.nis}</td> 
                        <td class="nama">${dataPost.nama}</td> 
                        <td class="tanggal_lahir">${dataPost.tanggal_lahir}</td> 
                        <td class="gender">${dataPost.gender}</td> 
                        <td class="no_hp1">${dataPost.no_hp1}</td> 
                        <td class="no_hp2">${dataPost.no_hp2}</td> 
                        <td>
                            <button class='btn btn-info btn-xs btnEdit' id="tbnEdit_${data.id}">Edit</button> 
                            <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_${data.id}">Hapus</button> 
                        </td>
                    </tr>
                `);
    
            $(".DataTable td").css({ "font-size": 20 });
            $(`.tr_${idRow}`).remove();
            addAlertSuccess('Data santri berhasil di tambah', 'success');
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
  var nis = $(`.tr_${idRow} .nis`).html().trim();;
  var nama = $(`.tr_${idRow} .nama`).html().trim();;
  var tanggal_lahir = $(`.tr_${idRow} .tanggal_lahir`).html().trim();;
  var gender = $(`.tr_${idRow} .gender`).html().trim();;
  var no_hp1 = $(`.tr_${idRow} .no_hp1`).html().trim();;
  var no_hp2 = $(`.tr_${idRow} .no_hp2`).html().trim();;
  var is_mustahiq = $(`.tr_${idRow} .is_mustahiq`).html().trim();;

  $(`.tr_${idRow}`).hide();
  $(`.tr_${idRow}`).addClass(`lama_${idRow}`);

  $(`.tr_${idRow}`).before(`
      <tr class="tr_${idRow} formEdit_${idRow}">
          <td><input type='text' class="form-control nis" id='' value='${nis}'></td>
          <td><input type='text' class="form-control nama" id='' value='${nama}'></td>
          <td><input type='date' class="form-control tanggal_lahir" id='' value='${tanggal_lahir}'></td>
          <td><input type='text' class="form-control gender" id='' value='${gender}'></td>
          <td colspan="2">
            <input type='text' class="form-control no_hp1" id='' value='${no_hp1}'>
            <input type='text' class="form-control no_hp2" id='' value='${no_hp2}'>
          </td>
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

    var error = 0;
    $(".pesanError").remove();
    if(dataPost.nis == ""){
        error = error + 1;
        $(`.tr_${idRow} td .nis`).after(`
        <span class='pesanError' style="color:red">Nis wajib diisi</span>
        `);
    }
    console.log('error', error);

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
            url: "santri/update",
            type:"POST",
  
            data:dataPost,
            success:function(response) {
                var data = response;
                var dataTd = data.data;
                console.log('response', response);
                console.log('data id', response);
                $(`.formEdit_${idRow}`).before(`
                    <tr class="tr_${data.id}">
                        <td class="nis">${dataPost.nis}</td>
                        <td class="nama">${dataPost.nama}</td>
                        <td class="tanggal_lahir">${dataPost.tanggal_lahir}</td>
                        <td class="gender">${dataPost.gender}</td>
                        <td class="is_mustahiq">${dataPost.is_mustahiq}</td>
                        <td>
                            <button class='btn btn-info btn-xs btnEdit' id="tbnEdit_${idRow}">Edit</button> 
                            <button class='btn btn-danger btn-xs' id="btnRemove_${idRow}">Hapus</button> 
                        </td>
                    </tr>
                `);
  
                $(".DataTable td").css({ 'font-size': 20 });
                $(`.formEdit_${idRow}`).remove();
                $(`.lama_${idRow}`).remove();
                addAlertSuccess('Data santri berhasil di ubah', 'info');
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