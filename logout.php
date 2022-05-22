<?php
session_start();
session_destroy();
echo "<script>alert('Berhasil Logout.');document.location.href='index.php'</script>";
?>