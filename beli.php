<?php 
session_start();
if($_SESSION['login'] != true){
	echo '<script>window.location="login.php"</script>';
    exit();
}
include("library.php");
$library = new library();
$id = $_GET['id'];
extract($library->editData($id));

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
			<h3>Beli Produk</h3>
			<div class="box">
				<form action="proses.php?action=beli" method="POST">
					<input type="hidden" name="id" value="<?= $id; ?>">
                    <input type="hidden" name="jumlah_barang" class="input-control" placeholder="Harga" value="<?=$quantity; ?>" required>
                    <input type="hidden" name="nama" class="input-control" placeholder="Nama Produk" value="<?= $name; ?>" required>
                    <input type="hidden" name="total" class="input-control" placeholder="Harga" value="<?= $price; ?>" required >
                    <input type="hidden" name="category" class="input-control" value="<?= $category; ?>" required>
                    <input type="hidden" name="id" class="input-control" value="<?= $id; ?>" required>
					<h4 class="input-control">Nama Produk	: <?php echo $name ?></h4>
                    <h4 class="input-control">Kategori		: <?php echo $category ?></h4>
                    <h4 class="input-control">Harga		: <?php echo $price ?></h4>
					<img src="asset/<?= $category;?>/<?= $photo; ?>" width="100px">
					<h4>
					<label for="quantity" class="input-control">Jumlah :</label>
					<input type="number" id="jumlah" name="quantity" class="" placeholder="Banyak Barang" min="0" max="<?= $quantity; ?>" required oninput="myFunction()">
					</h4>
					<h4 class="input-control">Total		: <input type="text" id="total" name="tes" onchange="myFunction()" value="0" readonly> </h4>
					
                    <br>
					<script>
						var quantity = document.getElementById("jumlah");
						quantity.onkeydown = function(e) {
							if(!((e.keyCode > 95 && e.keyCode < 106)
							|| (e.keyCode > 47 && e.keyCode < 58) 
							|| e.keyCode == 8)) {
								return false;
							}
						}
						function myFunction(){
						var harga = "<?php echo $price; ?>";
						var jumlah = parseFloat(quantity.value);
						if (isNaN(jumlah)) jumlah = 0;
						var total = harga * jumlah;
						document.getElementById("total").value = total;

						}
					</script>
					<input type="submit" value="beli" class="btn">
				    <a href="produk.php"><input type="button" value="Cancel" class="btn"></a>
					
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