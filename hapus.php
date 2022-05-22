<?php 
include 'config.php';

$id = $_GET['id'];

$sql = $pdo->prepare("SELECT nama FROM khs WHERE id='$id'");
$sql->execute();
$data2 = $sql->fetch();
$nama = $data2['nama'];

$sql = $pdo->prepare("DELETE FROM khs WHERE id='$id'");
$sql->execute();

$sql = $pdo->prepare("SELECT (sum(nilai_kumulatif)/sum(sks)) as ipk FROM khs WHERE nama='$nama'");
$sql->execute();
$data2 = $sql->fetch();
$ipk = $data2['ipk'];
$ipk = round($ipk,2);
$sql = $pdo->prepare("UPDATE `khs` SET `ipk`='$ipk' WHERE `khs`.`nama`='$nama'");
$sql->execute();
 
header("location:number.php?pesan=hapus");
?>