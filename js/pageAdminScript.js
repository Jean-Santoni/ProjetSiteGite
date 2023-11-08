
$(document).ready(function () {

  loadImageList();

  function loadImageList() {
    $.ajax({
      type: "GET",
      url: "GestionImages.php",
      success: function (data) {
        $("#ListImage").html(data);
      }
    });
  }
  $(document).on("click", ".delete-button", function () {
    var fileName = $(this).data("file");
    var confirmation = confirm("Voulez-vous supprimer le fichier " + fileName + " ?");

    if (confirmation) {
      $.ajax({
        type: "POST",
        url: "GestionImages.php",
        data: { file: fileName },
        success: function (response) {
          if (response === "success") {
            loadImageList();
          } else {
            alert("La suppression a échoué.");
          }
        }
      });
    }
  });
  $("#uploadButton").on("click", function () {
    var formData = new FormData();
    formData.append("imageInput", $("#imageInput")[0].files[0]);

    $.ajax({
      type: "POST",
      url: "GestionImages.php",
      contentType: false,
      processData: false,
      success: function (response) {
        $("#resultMessage").text(response);
        loadImageList();
        $("#imageInput").val("");
      },
      error: function (error) {
        console.log("Erreur : " + error);
      }
    });
  });
});
