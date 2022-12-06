<?php 
	session_start();
	
	if($_SESSION['login'] != true){
		echo '<script>window.location="login.php"</script>';
		exit();
	}
error_reporting(0); 
include "library.php";
$library = new library();
$banyak = $library->countData();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buka Furniture</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Buka Furniture</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="produk.php">Produk</a></li>
				<li><a href="data-bayar.php">Data Bayar</a></li>
				<li><a href="data-product.php">Data Produk</a></li>
				<li><a href="proses.php?action=logout">Logout</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Tambah Data Produk</h3>
			<div class="box">
                            
            <form action="proses.php?action=create" method="post" enctype="multipart/form-data">
				<select class="input-control" name="category" required>
					<option value="">--Pilih--</option>
                    <option value="Meja" >Meja</option>
                    <option value="Kursi" >Kursi</option>
                     <option value="Lemari" >Lemari</option>
                </select>

				<!--<input type="text" name="id" class="input-control" placeholder="ID Produk" required>-->
				<input type="text" name="name" class="input-control" placeholder="Nama Produk" required>
				<input type="number" name="price" class="input-control" placeholder="Harga" required>
				<input type="number" name="quantity" class="input-control" placeholder="Jumlah" required>
				<input type="file" name="photo" class="input-control" required>
				<textarea class="input-control" name="description" placeholder="Deskripsi"style="white-space: pre-wrap; text-indent: 50px;" required></textarea><br>
				
               
                <input type="submit" class="btn" value="Create">
                <a href="data-product.php"><input type="button" value="Cancel" class="btn"></a>
            </form>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2021 - Buka Furniture.</small>
		</div>
	</footer>
</body>
</html>