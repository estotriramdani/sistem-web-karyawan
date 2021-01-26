<?php
$hari_ini = date("Y-m-d");
$tgl_pertama = date('Y-m-01', strtotime($hari_ini));
$tgl_terakhir = date('Y-m-t', strtotime($hari_ini));
 //tgl Awal
$tgl_awal=$tgl_pertama;
//Tgl Akhir


$tgl_akhir = substr($tgl_terakhir, 8);

// Ubah tgl ke format time
$awal=strtotime($tgl_awal);

$akhir=strtotime(date('Y-m-t', strtotime($hari_ini)));
 //set awal jumlah hari kerja                               
 $hari_kerja= 0;
  //looping dari tgl awal sampai tgl akhir dengan increment 1 hari (60 * 60 * 24 second)
  for ($i=$awal; $i <= $akhir; $i += (60 * 60 * 24)) {
      //ubah format time ke date
      $i_date=date("Y-m-d",$i);
      //cek apakah hari sabtu, minggu atau hari libur nasional, Jika bukan maka tambahkan hari kerja
      if (date("w",$i) !="0" AND date("w",$i) !="6") {
             $hari_kerja++;
      }
  }
        
//tampilkan hasil
// echo  "Jumlah hari kerja ". $hari_kerja;
$hari_kerja = intval($hari_kerja);
$tgl_akhir =  intval($tgl_akhir);
// $tgl_akhir =  31;
$tgl_awal = intval($tgl_awal);

?>