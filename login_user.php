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
  <h1 class="sansserif" style="text-align:center;"> Selamat Datang Di Pencarian dan Pencetakan KHS! </h1>
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
    </tr>
    
    <?php
        require_once('config.php');
        if (isset($_GET['cari'])) {
            $cari = $_GET["cari"];
            $sql = $pdo->prepare("SELECT * FROM `khs` WHERE `nama` LIKE '%$cari%' or `nim` LIKE '%$cari%'");
            $sql->execute();
        }
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
            echo "</tr>";
            $no++; //Tambah 1 setiap kali looping
        }
        echo "<th></th><th></th><th></th><th></th><th></th><th>Nilai IPK = </th><th></th>";
        $sql = $pdo->prepare("SELECT * FROM `khs` WHERE `nama` LIKE '%$cari%' or `nim` LIKE '%$cari%'");
        $sql->execute();
        $data1 = $sql->fetch();
        echo "<td>".$data1['ipk']."</td>";
        $simpan = $data1['nama'];
        ?>
        <form action = "cetak.php" method="POST">
          <a href="cetak.php?cari=<?php echo $simpan; ?>"class="tombol"> Cetak KHS</a><br><br>
        </form>
        <?php
    ?>
</table>
<br>
<a href="logout.php"class="tombol"> Logout</a><br><br>
</body>
</html>