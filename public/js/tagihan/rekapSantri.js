$(document).on("click", ".icon", function () {
    console.log($(this));
    console.log($(this).html());

    if ($(this).find("i").hasClass("bi-box-arrow-in-down-right")) {
        $(this).find("i").removeClass("bi-box-arrow-in-down-right");
        $(this).find("i").addClass("bi-box-arrow-in-up-right");
    } else {
        $(this).find("i").addClass("bi-box-arrow-in-down-right");
        $(this).find("i").removeClass("bi-box-arrow-in-up-right");
    }
});

$(document).on("click", ".sendWa", function () {
    id = $(this).parent().parent().parent().attr('id');
    no_hp1 = $(`#${id} #no_hp1`).val();
    no_hp2 = $(`#${id} #no_hp2`).val();
    ayah = $(`#${id} #ayah`).val();
    ibu = $(`#${id} #ibu`).val();
    jumlah = $(`#${id} .total`).html().trim();
    namaSantri = $(`#${id} .namaSantri`).html().trim();
    link = $(`#${id} #link`).val();
    
    pesan = `Assalamu'alaikum \nDiberitahukan kepada Bapak ${ayah} / Ibu ${ibu} selaku orang tua/ walisanti dari ${namaSantri}, bahwa terdapat tagihan sebesar ${jumlah},\n\nUntuk detail tagihan nya bisa dilihat di ${link}\n\nMatur Suwun\nAdmin Enha`;
    sendWa('085647451640', pesan);
    // sendWa(no_hp1, pesan);
    // sendWa(no_hp2, pesan);
    $(`#${id} .btn`).attr('disabled','disabled')    
    // alert('Pesan sudah dikirim ke Hp, silahkan cek hp pondok');
});

$(document).on("click", "#kirimMasal", function () {
    $(".sendWa").click();
    $(`#kirimMasal`).attr('disabled','disabled')
    alert('Pesan sudah dikirim ke Hp, silahkan cek hp pondok');
});
