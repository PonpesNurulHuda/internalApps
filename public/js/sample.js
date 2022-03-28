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
            <td><input type='text' class="form-control tanggal_lahir" id=''></td>
            <td><input type='text' class="form-control jenis_kelamin" id=''></td>
            <td>
                <button class='btn btn-primary btnSave' id="btnSave_${className}">Simpan</button>
                <button class='btn btn-danger btnCancel' id="btnCancel_${className}">Batal</button>
            </td>
        </tr>
    `);
});