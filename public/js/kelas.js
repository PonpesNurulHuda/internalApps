$(document).ready(function () {
    $(".dtKelas .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddKelas'>Tambah Data </button>  ");

});

$(document).on("click", "#btnAddKelas", function () {
    var className =  makeid(10);
    $("tbody").prepend(`
        <tr class="tr_${className}">
            <td><input type='text' class="form-control kode" id=''></td>
            <td><input type='text' class="form-control tingkat_id" id=''></td>
            <td><input type='text' class="form-control tahun_ajaran_id" id=''></td>
            <td><input type='text' class="form-control walikelas" id=''></td>
            <td><input type='date' class="form-control is_active" id=''></td>
            <td><input type='text' class="form-control created_at" id=''></td>
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
    dataPost.tingkat_id =  $(`.tr_${tr} .tingkat_id`).val();
    dataPost.tahun_ajaran_id = $(`.tr_${tr} .tahun_ajaran`).val();
    dataPost.walikelas = $(`.tr_${tr} .walikelas`).val();
    dataPost.is_active = $(`.tr_${tr} .is_active`).html();
    dataPost.created_at = $(`.tr_${tr} .created_at`).val();
    dataPost.updated_at = $(`.tr_${tr} .updated`).html();

    return dataPost;
}