let idTagihan;
let statusPenerimaaan;

$(document).on("click", "#btnCari", function () {
    idTagihan = $('.tagihan').val();
    statusPenerimaaan = $('.status').val();
    refressTable(idTagihan, statusPenerimaaan);
});

function refressTable(idTagihan, statusPenerimaaan){
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
            {data: "id" , render : function ( data, type, row, meta ) {
                // if(statusPenerimaaan == 0){
                //     return type === 'display'  ?
                //     '<button class="btn btn-primary btn-sm terimaPembarayan" id="btnTerima_'+ data +'">Terima Uang</button></a>' :
                //     data;
                // }
                return "";
              }
            },
        ],
    });
}
