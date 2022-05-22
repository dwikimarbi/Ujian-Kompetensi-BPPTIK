<!-- Dwiki Sulthon Saputra Marbi - 26 Maret 2019 -->
<?php

include "config.php";
include "prosesClass.php";
// Mengambil data dari input
$proses = new proses();
$nama 	= $_POST['Nama'];
$nim 	= $_POST['NIM'];
$matkul = $_POST['MataKuliah'];
$nilai = $_POST['Nilai'];

$query =$pdo->prepare("SELECT sks FROM matakuliah WHERE nama_matkul='$matkul'");
$query->execute();
$data = $query->fetch();

$sks = $data['sks'];
$nilai_huruf = $proses->konversi_huruf($nilai);
$nilai = $proses->konversi_ip($nilai);
$nilai_kumulatif = $nilai*$sks;
$ipk = 0;

$sql = $pdo->prepare("SELECT count(id) as sumid FROM khs");
$sql->execute();
$data3 = $sql->fetch();
$no = $data3['sumid'] + 1;


$sql = $pdo->prepare("INSERT INTO `khs` (`id`,`nama`, `nim`, `nama_matkul`, `nilai_angka`, `nilai_huruf`, `sks`, `nilai_kumulatif`, `ipk`) VALUES ('$no','$nama', '$nim', '$matkul', '$nilai', '$nilai_huruf', '$sks', '$nilai_kumulatif', '$ipk')");

$sql->execute();
$sql = $pdo->prepare("SELECT (sum(nilai_kumulatif)/sum(sks)) as ipk FROM khs WHERE nim='$nim'");
$sql->execute();
$data2 = $sql->fetch();
$ipk = $data2['ipk'];
$ipk = round($ipk,2);
$sql = $pdo->prepare("UPDATE `khs` SET `ipk`='$ipk' WHERE `khs`.`nama`='$nama'");
$sql->execute();

// Buat sebuah alert sukses, dan redirect ke halaman awal (index.php)
echo "<script>alert('Data berhasil disimpan');window.location = 'form.php';</script>";
?>