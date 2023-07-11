<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="div1">
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Nombor IC</label>
     	<input type="text" name="uname" placeholder="ic"><br>

     	<label>Nama</label>
     	<input type="text" name="nama" placeholder="nama"><br>

     	<button type="submit">Login</button>
     </form>
     </div>
</body>
</html>