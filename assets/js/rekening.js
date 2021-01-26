const actionRekening = document.querySelector("#action-rekening");

// gaji harian
actionRekening.addEventListener("click", function () {
  const inputRekening = document.querySelector(".input-rekening");
  fetch(
    "action/action-rekening/action-rekening.php?value=" + inputRekening.value
  );
  alert("Rekening berhasil diset");
});
