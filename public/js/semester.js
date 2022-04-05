$(document).ready(function () {
    $(".dtSemester .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddSemester'>Tambah Data </button>  ");

});

$(document).on("click", "#btnAddSemester", function () {
    var className =  makeid(10);
    $("tbody").prepend(`
        <tr class="tr_${className}">
            <td><input type='text' class="form-control tahun_ajaran_id" id=''></td>
            <td><input type='text' class="form-control seqno" id=''></td>
            <td><input type='text' class="form-control nama" id=''></td>
            <td><input type='date' class="form-control dimulai" id=''></td>
            <td><input type='date' class="form-control selesai" id=''></td>
            <td><input type='text' class="form-control status" id=''></td>
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
    dataPost.seqno =  $(`.tr_${tr} .seqno`).val();
    dataPost.nama = $(`.tr_${tr} .nama`).val();
    dataPost.dimulai = $(`.tr_${tr} .dimulai`).val();
    dataPost.selesai = $(`.tr_${tr} .selesai`).val();
    dataPost.status = $(`.tr_${tr} .status`).val();


    return dataPost;
}

$(document).on("click", ".btnSave", function () {
    var idRow = $(this).attr("id").replace("btnSave_", "");
    var dataPost = getData(idRow);
    console.log("dataPost", dataPost);
  
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
                      <td class="tahun_ajaran_id">${dataPost.tahun_ajaran_id}</td>
                      <td class="seqno">${dataPost.seqno}</td>
                      <td class="nama">${dataPost.nama}</td> 
                      <td class="dimulai">${dataPost.dimulai}</td>
                      <td class="selesai">${dataPost.selesai}</td> 
                      <td class="status">${dataPost.status}</td> 
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
    var tahun_ajaran_id = $(`.tr_${idRow} .tahun_ajaran_id`).html().trim();;
    var seqno = $(`.tr_${idRow} .seqno`).html().trim();;
    var nama = $(`.tr_${idRow} .nama`).html().trim();;
    var dimulai = $(`.tr_${idRow} .dimulai`).html().trim();;
    var selesai = $(`.tr_${idRow} .selesai`).html().trim();;
    var status = $(`.tr_${idRow} .status`).html().trim();;
  
    $(`.tr_${idRow}`).hide();
    $(`.tr_${idRow}`).addClass(`lama_${idRow}`);
  
    $(`.tr_${idRow}`).before(`
        <tr class="tr_${idRow} formEdit_${idRow}">
            <td><input type='text' class="form-control tahun_ajaran_id" id='' value='${tahun_ajaran_id}'></td>
            <td><input type='text' class="form-control seqno" id='' value='${seqno}'></td>
            <td><input type='text' class="form-control nama" id='' value='${nama}'></td>
            <td><input type='date' class="form-control dimulai" id='' value='${dimulai}'></td>
            <td><input type='date' class="form-control selesai" id='' value='${selesai}'></td>
            <td><input type='text' class="form-control status" id='' value='${status}'></td>
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
                        <td class="tahun_ajaran_id">${dataPost.tahun_ajaran_id}</td>
                        <td class="seqno">${dataPost.seqno}</td>
                        <td class="nama">${dataPost.nama}</td>
                        <td class="dimulai">${dataPost.dimulai}</td>
                        <td class="selesai">${dataPost.selesai}</td>
                        <td class="status">${dataPost.status}</td>
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