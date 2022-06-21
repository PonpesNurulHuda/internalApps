let idTagihan;
let statusPenerimaaan;

$(document).on("click", "#btnCari", function () {
    idTagihan = $('.tagihan').val();
    statusPenerimaaan = $('.status').val();

    $('#tableRekap').DataTable().clear().destroy();
    $('#tableRekap').DataTable({
        ajax: `rekapTagihan/${idTagihan}/${statusPenerimaaan}`,
        columns: [
            //{ data: 'id' },
            { data: 'santri' },
            { data: 'kelas' },
            { data: 'tanggal_pembuatan' },
            { data: 'tanggal_jatuh_tempo' },
            { data: 'tanggal_pembayaran' },
            { data: 'bendahara' },
            //{ data: 'status' },
        ],
    });

});
