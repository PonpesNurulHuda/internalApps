$(document).ready(function () {
    $(".dtSantri .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddSantri'>Tambah Data </button>  ");

});

$(document).on("click", "#btnAddSantri", function () {
    var className =  makeid(10);
    $("tbody").prepend(`
        <tr class="tr_${className}">
            <td><input type='text' class="form-control nik" id=''></td>
            <td><input type='text' class="form-control kk" id=''></td>
            <td><input type='text' class="form-control nis" id=''></td>
            <td><input type='text' class="form-control nama" id=''></td>
            <td><input type='date' class="form-control tanggal_lahir" id=''></td>
            <td>
                <select class="form-control jenis_kelamin">
                    <option value="L">Laki - Laki</option>
                    <option value="P">Perempuan</option>
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
    dataPost.nik = $(`.tr_${tr} .nik`).val();
    dataPost.kk =  $(`.tr_${tr} .kk`).val();
    dataPost.nis = $(`.tr_${tr} .nis`).val();
    dataPost.nama = $(`.tr_${tr} .nama`).val();
    dataPost.tanggal_lahir = $(`.tr_${tr} .tanggal_lahir`).html();
    dataPost.jenis_kelamin = $(`.tr_${tr} .jenis_kelamin`).html();

    return dataPost;
}