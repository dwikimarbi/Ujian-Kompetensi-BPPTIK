<html>
<head><link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
body {background-color: lightblue;}
h1   {color: white;}
h1.sansserif {
  font-family: Verdana, Geneva, sans-serif;
}
</style>
<body>
	<form action="login.php" method="post">
	<h1 class="sansserif" style="text-align:center;"> Selamat Datang Di Sistem Informasi Kampus !</h1>
	<table align="center">
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="username" placeholder="Username" required /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password" placeholder="Password" required /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="submit" name="login" value="Login" class="tombol" /></td>
		</tr>
	</table>
	</form>
 
</body>
</html>