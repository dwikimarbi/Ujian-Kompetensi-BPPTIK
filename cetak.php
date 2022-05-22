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
h2 {
	color: grey;
	}
h2.sansserif {
  font-family: Verdana, Geneva, sans-serif;
}
</style>
<body>
  <h1 class="sansserif" style="text-align:center;"> KARTU HASIL STUDI </h1>
  <?php
        require_once('config.php');
        $nama = "";
        $nim = "";
        if (isset($_GET['cari'])) {
            $cari = $_GET["cari"];
            $sql = $pdo->prepare("SELECT DISTINCT `nama`,`nim` FROM `khs` WHERE `nama` LIKE '%$cari%'");
            $sql->execute();
        }

        while($data = $sql->fetch()){ 
        	$nama = $data['nama'];
        	$nim = $data['nim'];
        }
    ?>
  <h2><font size= "3" face="Verdana">Nama = <?php echo $nama; ?></font></h2>
  <h2><font size= "3" face="Verdana">NIM  = <?php echo $nim; ?></font></h2>
  <table class="table1">
    <tr>
      <th>No</th>
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
            $sql = $pdo->prepare("SELECT * FROM `khs` WHERE `nama` LIKE '%$cari%'");
            $sql->execute();
        }
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        while($data = $sql->fetch()){ // Ambil semua data dsari hasil eksekusi $sql
            echo "<tr>";
            echo "<td>".$no."</td>";
            echo "<td>".$data['nama_matkul']."</td>";
            echo "<td>".$data['nilai_angka']."</td>";
            echo "<td>".$data['nilai_huruf']."</td>";
            echo "<td>".$data['sks']."</td>";
            echo "<td>".$data['nilai_kumulatif']."</td>";
            echo "</tr>";
            $no++; //Tambah 1 setiap kali looping
        }
        echo "<th></th><th></th><th></th><th>Nilai IPK = </th><th></th>";
        $sql = $pdo->prepare("SELECT * FROM `khs` WHERE `nama` LIKE '%$cari%' or `nim` LIKE '%$cari%'");
        $sql->execute();
        $data = $sql->fetch();
        echo "<td>".$data['ipk']."</td>";
    ?>
</table>
<script>
		window.print();
	</script>
</body>
</html>