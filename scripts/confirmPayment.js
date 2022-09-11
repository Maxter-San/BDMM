jQuery(document).ready(function(e) {
    $('#exampleModal').on('hidden.bs.modal', function () {
      window.location.href = "main.php";
    })
});