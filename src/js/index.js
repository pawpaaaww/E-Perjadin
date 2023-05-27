function showLoader() {
  $("body").addClass("loading");
  setTimeout(function () {
    $("#loader").fadeOut("slow", function () {
      $("body").removeClass("loading");
    });
  }, 100); // Change the value of 100 to the desired delay time in milliseconds (e.g., 5000 for 5 seconds)
}

window.addEventListener("load", function () {
  var loader = document.getElementById("loader");
  if (loader) {
    showLoader();
  }
});

var keluar = document.getElementById("keluar");

keluar.onclick = function () {
  Swal.fire({
    icon: "success",
    title: "Login Berhasil!",
    showConfirmButton: false,
    timer: 1500,
  });
  window.location.href = "menuUtama.php";
};
