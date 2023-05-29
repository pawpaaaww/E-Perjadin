//loader
function showLoader() {
  $("body").addClass("loading");
  setTimeout(function () {
    $("#loader").fadeOut("slow", function () {
      $("body").removeClass("loading");
    });
  }, 100);
}

window.addEventListener("load", function () {
  var loader = document.getElementById("loader");
  if (loader) {
    showLoader();
  }
});
//end loader

//LAMA DINAS
function hitungLamaDinas() {
  var tanggalBerangkat = document.getElementById("tanggal_berangkat").value;
  var tanggalSelesai = document.getElementById("tanggal_selesai").value;

  var selisihHari = Math.ceil(
    (new Date(tanggalSelesai) - new Date(tanggalBerangkat)) /
      (1000 * 60 * 60 * 24)
  );

  document.getElementById("lama_dinas").value = selisihHari + " HARI ";
}
//end lama dinas

//hitung biaya total perjadin
var biayaPenginapanInput = document.getElementById("biaya_penginapan");
var biayaTransaksiInput = document.getElementById("biaya_transaksi");
var uangHarianInput = document.getElementById("uang_harian");
var uangPendampingInput = document.getElementById("uang_pendamping");
var totalBiayaInput = document.getElementById("total_biaya");

biayaPenginapanInput.addEventListener("input", hitungTotalBiaya);
biayaTransaksiInput.addEventListener("input", hitungTotalBiaya);
uangHarianInput.addEventListener("input", hitungTotalBiaya);
uangPendampingInput.addEventListener("input", hitungTotalBiaya);

function hitungTotalBiaya() {
  var biayaPenginapan = parseFloat(biayaPenginapanInput.value) || 0;
  var biayaTransaksi = parseFloat(biayaTransaksiInput.value) || 0;
  var uangHarian = parseFloat(uangHarianInput.value) || 0;
  var uangPendamping = parseFloat(uangPendampingInput.value) || 0;

  var totalBiaya =
    biayaPenginapan + biayaTransaksi + uangHarian + uangPendamping;

  totalBiayaInput.value = totalBiaya;
}
//end total biaya

//validasi input angka
function validateInput(input) {
  input.value = input.value.replace(/[^0-9]/g, "");
}
//end

//ubah ke UPPERCASE
function convertToUppercase(input) {
  // Mengubah nilai input menjadi huruf kapital (UPPERCASE)
  var uppercaseValue = input.value.toUpperCase();

  // Mengganti nilai input dengan hasil konversi
  input.value = uppercaseValue;
}
//end
