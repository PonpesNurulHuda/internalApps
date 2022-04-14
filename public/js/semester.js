var dropdownTahun_ajaran = "";

$(document).ready(function () {
    $(".dtSemester .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddSemester'>Tambah Data </button>  ");

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

$(document).on("click", "#btnAddSemester", function () {
    var className =  makeid(10);
    $("tbody").prepend(`
        <tr class="tr_${className}">
            <td>
                ${dropdownTahun_ajaran}
            </td>
            <td><input type='text' class="form-control seqno" id=''></td>
            <td><input type='text' class="form-control nama" id=''></td>
            <td><input type='date' class="form-control dimulai" id=''></td>
            <td><input type='date' class="form-control selesai" id=''></td>
            <td>
                <select class='form-control is_active'>
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
    dataPost.tahun_ajaran_id = $(`.tr_${tr} .tahun_ajaran_id`).val();
    dataPost.namaAjaran = $(`.tr_${tr} .tahun_ajaran_id option:selected`).text();
    dataPost.seqno =  $(`.tr_${tr} .seqno`).val().trim();
    dataPost.nama = $(`.tr_${tr} .nama`).val().trim();
    dataPost.dimulai = $(`.tr_${tr} .dimulai`).val();
    dataPost.selesai = $(`.tr_${tr} .selesai`).val();
    dataPost.is_active = $(`.tr_${tr} .is_active`).val();


    return dataPost;
}

$(document).on("click", ".btnSave", function () {
    var idRow = $(this).attr("id").replace("btnSave_", "");
    var dataPost = getData(idRow);
    console.log("dataPost", dataPost);

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
    if(dataPost.nama == ""){
        error = error + 1;
        $(`.tr_${idRow} td .nama`).after(`
        <span class='pesanError' style="color:red">Nama wajib diisi</span>
        `);
    }

    if(error == 0){
        $.ajax({
            url: "semester/add ",
            type: "POST",
        
            data: dataPost,
            success: function (response) {
              console.log(response);
        
              var data = response;
              if (data.id != "0") {
                $("tbody").prepend(`
                        <tr class="tr_${data.id}">
                            <td hidden class="tahun_ajaran_id">${dataPost.tahun_ajaran_id}</td>
                            <td class="namaAjaran">${dataPost.namaAjaran}</td>
                            <td class="seqno">${dataPost.seqno}</td>
                            <td class="nama">${dataPost.nama}</td> 
                            <td class="dimulai">${dataPost.dimulai}</td>
                            <td class="selesai">${dataPost.selesai}</td> 
                            <td class="is_active">${dataPost.is_active}</td> 
                            <td>
                                <button class='btn btn-info btn-xs btnEdit' id="tbnEdit_${data.id}">Edit</button> 
                                <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_${data.id}">Hapus</button> 
                            </td>
                        </tr>
                    `);
        
                $(".DataTable td").css({ "font-size": 20 });
                $(`.tr_${idRow}`).remove();
                addAlertSuccess('Data semester berhasil di tambah', 'success');
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
    var tahun_ajaran_id = $(`.tr_${idRow} .tahun_ajaran_id`).html().trim();;
    var seqno = $(`.tr_${idRow} .seqno`).html().trim();;
    var nama = $(`.tr_${idRow} .nama`).html().trim();;
    var dimulai = $(`.tr_${idRow} .dimulai`).html().trim();;
    var selesai = $(`.tr_${idRow} .selesai`).html().trim();;
    var is_active = $(`.tr_${idRow} .is_active`).html().trim();;
  
    $(`.tr_${idRow}`).hide();
    $(`.tr_${idRow}`).addClass(`lama_${idRow}`);
  
    $(`.tr_${idRow}`).before(`
        <tr class="tr_${idRow} formEdit_${idRow}">
            <td>
                ${dropdownTahun_ajaran}
            </td>
            <td><input type='text' class="form-control seqno" id='' value='${seqno}'></td>
            <td><input type='text' class="form-control nama" id='' value='${nama}'></td>
            <td><input type='date' class="form-control dimulai" id='' value='${dimulai}'></td>
            <td><input type='date' class="form-control selesai" id='' value='${selesai}'></td>
            <td><input type='text' class="form-control is_active" id='' value='${is_active}'></td>
            <td>
                <button class='btn btn-primary btnSaveEdit' id="btnSave_${idRow}">Simpan</button>
                <button class='btn btn-danger btnCancelEdit' id="btnCancel_${idRow}">Batal</button>
            </td>
        </tr>
    `);

    $(`.tr_${idRow} .tahun_ajaran_id`).val(tahun_ajaran_id);
});

// action update data
$(document).on("click", ".btnSaveEdit", function () {
    var idRow = $(this).attr("id").replace("btnSave_", "");
    var dataPost = getData(idRow);

    console.log(dataPost);

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
                url: "semester/update",
                type:"POST",
      
                data:dataPost,
                success:function(response) {
                    var data = response;
                    var dataTd = data.data;
                    console.log('response', response);
                    console.log('data id', response);
                    $(`.formEdit_${idRow}`).before(`
                        <tr class="tr_${data.id}">
                            <td hidden class="tahun_ajaran_id">${dataPost.tahun_ajaran_id}</td>
                            <td class="namaAjaran">${dataPost.namaAjaran}</td>
                            <td class="seqno">${dataPost.seqno}</td>
                            <td class="nama">${dataPost.nama}</td>
                            <td class="dimulai">${dataPost.dimulai}</td>
                            <td class="selesai">${dataPost.selesai}</td>
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
                    addAlertSuccess('Data semester berhasil di ubah', 'info');
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