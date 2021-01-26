const setujui = document.querySelector("#setujui");
const tolak = document.querySelector("#tolak");

setujui.addEventListener("click", function () {
  fetch(
    "http://localhost/sistem-web-karyawan/action/action-cuti/action-setujui.php?id= "
  );
});
