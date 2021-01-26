const actionHarian = document.querySelector("#action-harian");
const actionCuti = document.querySelector("#action-cuti");
const actionLembur = document.querySelector("#action-lembur");

// gaji harian
actionHarian.addEventListener("click", function () {
  const inputHarian = document.querySelector(".input-harian");
  fetch(
    "http://localhost/sistem-web-karyawan/action/action-finance/update-gaji.php?value=" +
      inputHarian.value
  );
  alert("Gaji harian berhasil diset");
});

// uang lembur
actionLembur.addEventListener("click", function () {
  const inputLembur = document.querySelector(".input-lembur");
  fetch(
    "http://localhost/sistem-web-karyawan/action/action-finance/update-lembur.php?value=" +
      inputLembur.value
  );
  alert("Uang lembur per jam berhasil diset");
});

// update potoongan cuti
actionCuti.addEventListener("click", function () {
  const inputCuti = document.querySelector(".input-cuti");
  fetch(
    "http://localhost/sistem-web-karyawan/action/action-finance/update-potongan-cuti.php?value=" +
      inputCuti.value
  );
  alert("Uang potongan cuti per hari berhasil diset");
});

const hoverable = document.querySelectorAll(".hoverable");

for (let i = 0; i < hoverable.length; i++) {
  hoverable[i].addEventListener("mouseenter", function () {
    hoverable[i].classList.add("shadow");
  });
  hoverable[i].addEventListener("mouseleave", function () {
    hoverable[i].classList.remove("shadow");
  });
}
