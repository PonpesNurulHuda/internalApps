
$(document).on("click", ".btnMasuk", function () {
    var dataPost = new Object;
    dataPost.email = $("#email").val();
    dataPost.password = $("#Password").val();

    console.log("dataPost", dataPost);
    $.ajax({
        url: "login",
        type: "POST",
    
        data: dataPost,
        success: function (response) {
          alert(response.pesan)
          if(response.status == 1){
            window.location.replace("dashboard");
          }
        },
        error: function () {
          alert("Terjadi kesalahan");
        },
    });
});