<html>
<head>
  <!-- Dwiki Sulthon Saputra Marbi - 26 Maret 2019 -->
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
body {background-color: lightblue;}
h1   {color: white;}
h1.sansserif {
  font-family: Verdana, Geneva, sans-serif;
}
</style>
<body>
  <h1 class="sansserif" style="text-align:center;"> Selamat Datang Di Pencarian dan Pengeditan KHS! </h1>
  <form action = "cari_ver_admin.php" method="GET">
  <input type="text" name="cari"/><br>
  <input type="submit" value="Cari" class="tombol"/><br>
  </form>
  <table class="table1">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>NIM</th>
      <th>Mata Kuliah</th>
      <th>Nilai Angka</th>
      <th>Nilai Huruf</th>
      <th>SKS</th>
      <th>Nilai Kumulatif</th>
      <th></th>
      <th></th>
    </tr>
    
    <?php
    include "config.php";
    $sql = $pdo->prepare("SELECT * FROM `khs`");
    $sql->execute();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        while($data = $sql->fetch()){ // Ambil semua data dsari hasil eksekusi $sql
            echo "<tr>";
            echo "<td>".$no."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['nim']."</td>";
            echo "<td>".$data['nama_matkul']."</td>";
            echo "<td>".$data['nilai_angka']."</td>";
            echo "<td>".$data['nilai_huruf']."</td>";
            echo "<td>".$data['sks']."</td>";
            echo "<td>".$data['nilai_kumulatif']."</td>";
            ?>
            <td>
              <a class="edit" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>
            </td>
            <td>
              <a class="hapus" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
            </td>					
            <?php
            echo "</tr>";
            $no++; //Tambah 1 setiap kali looping
        }
    ?>
</table>
<br>
<a href="menu.php"class="tombol"> Menu Utama</a><br><br>
<pre>
<a href="logout.php"class="tombol"> Logout</a><br><br>
</body>
</html>