$(document).ready(function () {
    $(".dtMapel_kelas .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddMapel_kelas'>Tambah Data </button>  ");

});

$(document).on("click", "#btnAddMapel_kelas", function () {
    var className =  makeid(10);
    $("tbody").prepend(`
        <tr class="tr_${className}">
            <td><input type='text' class="form-control nama" id=''></td>
            <td><input type='text' class="form-control kelas_id" id=''></td>
            <td><input type='text' class="form-control semester_id" id=''></td>
            <td><input type='text' class="form-control maple_id" id=''></td>
            <td><input type='date' class="form-control mustahiq" id=''></td>
            <td><input type='date' class="form-control keterangan" id=''></td>
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
    dataPost.kelas =  $(`.tr_${tr} .kelas`).val();
    dataPost.semester_id = $(`.tr_${tr} .semester_id`).val();
    dataPost.maple_id = $(`.tr_${tr} .maple_id`).val();
    dataPost.mustahiq = $(`.tr_${tr} .mustahiq`).val();
    dataPost.keterangan = $(`.tr_${tr} .keterangan`).val();


    return dataPost;
}