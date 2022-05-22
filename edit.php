<!DOCTYPE html>
<!-- Dwiki Sulthon Saputra Marbi - 26s Maret 2019 -->
<html>
<head> <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
body {background-color: lightblue;}
h1   {color: white;}
h1.sansserif {
  font-family: Verdana, Geneva, sans-serif;
}
</style>
<body>
<h1 class="sansserif" style="text-align:center;"> Selamat Datang Di Penginputan Nilai !</h1>
<p class="sansserif" style="text-align:center;">"Web ini dibuat untuk menyelesaikan Sertifikasi TIK gelombang ke-2 di BPPTIK Cikarang"</p>
<div class="form">
	<?php
	include 'config.php';
	$id = $_GET['id'];
	$sql = $pdo->prepare("SELECT * FROM khs WHERE id='$id'");
	$sql->execute();
	while ($data = $sql->fetch()) {
?>	
<form method="post" action="update.php?edit=$id"style="text-align:center;">
	<pre>
	<label> Masukan Nama Mahasiswa</label>
	<input type="text" name="Nama" value="<?php echo $data['nama'] ?>"/><br>
	<label> Masukan Nomor Induk Mahasiswa</label>
	<input type="number" name="NIM" value="<?php echo $data['nim'] ?>"/><br>
	<select name = "MataKuliah"> 
	<option><?php echo $data['nama_matkul'] ?></option>
	<?php
		include "config.php";
		$sql = $pdo->prepare("SELECT * FROM MataKuliah ORDER BY id_matkul asc");
		$sql->execute();
		while ($data = $sql->fetch()) {
			?>
			<option> <?php echo $data["nama_matkul"] ?> </option>
			<?php
		}
		?>
	</select><br>
	<label> Masukan Nilai</label>
	<input type="number" min="0" max="100" name="Nilai"/><br>
	<input type="submit" name="bhasil" value="Simpan Nilai"class='tombol'/>
	</form>
	<a href="menu.php"class="tombol"> Menu Utama</a><br><br>
	<a href="logout.php"class="tombol"> Logout</a><br><br>
	<?php
}
	?>
</div>
	<p class="sansserif" style="text-align:center;">©Copyright Dwiki Sulthon Saputra Marbi 2019</p>
</body>
</html>