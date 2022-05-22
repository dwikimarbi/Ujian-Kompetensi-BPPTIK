<?php
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$cek      = mysqli_query($connect, "select * from login where username='$username' and password='$password'");
$result   = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);
 
if($result>0){
    if ($data['level'] == 'admin') {
        session_start();
        $_SESSION['username'] = $data['username'];
        // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
        $_SESSION['level']    = $data['level'];
        echo "<script>alert('Selamat Datang, Admin.');document.location.href='menu.php'</script>";
 
    }elseif($data['level'] == 'user'){
        session_start();
        $_SESSION['username'] = $data['username'];
        $nama =$data['username'];
        // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
        $_SESSION['level']    = $data['level'];
        echo "<script>alert('Selamat Datang, User.');document.location.href='login_user.php?cari=$nama'</script>";
    }
}else{
    header("location:index.php");
}
?>