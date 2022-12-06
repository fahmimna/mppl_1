<?php
session_start();
if(isset($_SESSION["login"]))
{
    if($_SESSION['login']==true){
    header('Location:dashboard.php');
    exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Furniture</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    
</head>
<body id="bg-login">
	<div class="box-login">
		<h2>Login</h2>
		<form action="proses.php?action=login" method="POST">
			<input type="text" name="name" placeholder="Username" class="input-control">
			<input type="password" name="password" placeholder="Password" class="input-control">
			<input type="submit" name="submit" value="Login" class="btn">
		</form>
		
	</div>
    <div class="row">
    <?php 
			if(isset ($_GET['pesan']))
            {
                if($_GET['pesan']=='gagal')
                 {
                    echo '<script>alert("Username atau password Anda salah!")</script>';
                }else if($_GET['pesan']=='logout')
                {
                    echo '<script>alert("Anda berhasil logout")</script>';
                }else if($_GET['pesan']=='belumlogin')
                { 
                    echo '<script>alert("Username atau password Anda salah!")</script>';
                }
            }
            
		?>
    </div>
    
</body>
</html>