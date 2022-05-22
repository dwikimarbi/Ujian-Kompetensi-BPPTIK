<?php 
 
include "config.php";
include "prosesClass.php";

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

$sql = $pdo->prepare("UPDATE `khs` SET `nim`='$nim', `nama`='$nama', `nama_matkul`='$matkul', `nilai_angka`='$nilai', `nilai_huruf`='$nilai_huruf', `sks`='$sks', `nilai_kumulatif`='$nilai_kumulatif', `ipk`='$ipk' WHERE `nama_matkul`='$matkul'");
$sql->execute();

$sql = $pdo->prepare("SELECT (sum(nilai_kumulatif)/sum(sks)) as ipk FROM khs WHERE nim='$nim'");
$sql->execute();
$data2 = $sql->fetch();
$ipk = $data2['ipk'];
$ipk = round($ipk,2);
$sql = $pdo->prepare("UPDATE `khs` SET `ipk`='$ipk' WHERE `khs`.`nama`='$nama'");
$sql->execute();
 
header("location:number.php?pesan=update");
 
?>