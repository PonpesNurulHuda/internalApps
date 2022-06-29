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
            { data: 'bendahara' },
            {data: "id" , render : function ( data, type, row, meta ) {
                if(statusPenerimaaan == 0){
                    return type === 'display'  ?
                    '<button class="btn btn-primary btn-sm terimaPembarayan" id="btnTerima_'+ data +'">Terima Uang</button></a>' :

                    data;
                }
              }},
        ],
    });
}

$(document).on("click", ".terimaPembarayan", function () {
    var id = $(this).attr("id").replace("btnTerima_", "");
  
    var dataPost = new Object();
    dataPost.id = id;
    dataPost.status = "1";
  
    let isExecuted = confirm("Apakah anda sudah menerima pembayaran?");
    console.log(isExecuted);
    if(isExecuted){
      $.ajax({
          url: "../terimaPembayaran",
          type: "POST",
      
          data: dataPost,
          success: function (response) {
            console.log(response);
      
            var data = response;
            if (data.id != "0") {
                refressTable(idTagihan, statusPenerimaaan);
                addAlertSuccess("Data berhasil diperbarui", "success");
            } else {
              alert(data.pesan);
            }
          },
          error: function () {
            alert("Terjadi kesalahan");
          },
        });
    }
  });