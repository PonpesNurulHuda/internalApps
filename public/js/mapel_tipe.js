$(document).ready(function () {
    $(".dtMapel_tipe .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddMapel_tipe'>Tambah Data </button>  ");

});

$(document).on("click", "#btnAddMapel_tipe", function () {
    var className =  makeid(10);
    $("tbody").prepend(`
        <tr class="tr_${className}">
            <td><input type='text' class="form-control nama" id=''></td>
            <td><input type='text' class="form-control deskripsi" id=''></td>
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
    dataPost.deskripsi = $(`.tr_${tr} .deskripsi`).val();
    dataPost.is_active = $(`.tr_${tr} .is_active`).val();

    return dataPost;
}