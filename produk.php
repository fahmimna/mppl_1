<?php 
error_reporting(0);
session_start();

	include("library.php");
	$library = new library();
	$count = $library->countData();
	$read = $library->readData();
	if (isset($_GET["search"]) or isset($_GET["kat"])) {
		//$read = $library->search($_GET["keyword"]);
		if($_GET['search'] != '' || $_GET['kat'] != ''){
			//$search = $_GET['cari'];
			//$kategori = $_GET['kategori'];
			$read = $library->readSearchCategoryData($_GET['search'], $_GET['kat']);
			$count = $library->countsDatabySearch($_GET['search'], $_GET['kat']);
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buka Furniture</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<?php if($_SESSION['login'] == true){ ?>
				<h1><a href="dashboard.php">Buka Furniture</a></h1>
			<?php }else{ ?>
				<h1><a href="home.php">Buka Furniture</a></h1>
			<?php } ?>
			<ul>
				<?php 
				if($_SESSION['login'] == true){ ?>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="produk.php">Produk</a></li>
				<li><a href="data-bayar.php">Data Bayar</a></li>
				<li><a href="data-product.php">Data Produk</a></li>
				<li><a href="proses.php?action=logout">Logout</a></li>
				<?php }else{?>
				<li><a href="home.php">Home</a></li>
				<li><a href="produk.php">Produk</a></li>
				<?php } ?>
			</ul>
		</div>
	</header>

	<!-- search -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<!-- new product -->
	<div class="section">
		<div class="container">
			<h3>Produk</h3>
			<div class="box">
				<?php 
					if($count > 0){
					while($p = $read->fetch(PDO::FETCH_OBJ)){
				?>	
					<a href="detail-produk.php?id=<?php echo $p->id ?>">
						<div class="col-4">
							<img src="asset/<?= $p->category; ?>/<?= $p->photo; ?>">
							<p class="nama"><?php echo substr($p->name, 0, 30) ?></p>
							<p class="harga">Rp. <?= number_format($p->price,2,",","."); ?></p>
						</div>
					</a>
				<?php }}?>
					
			</div>
		</div>
	</div>

	<!-- footer -->
	<div class="footer">
		<div class="container">
			<h4>Alamat</h4>
			<p>Jl. RS. Fatmawati Raya, Pd. Labu, Kec. Cilandak, Kota Depok, Daerah Khusus Ibukota Jakarta 12450</p>

			<h4>Email</h4>
			<p>furnitureku@gmail.com</p>

			<h4>No. Hp</h4>
			<p>089666378899</p>
			<small>Copyright &copy; 2021 -Buka Furniture.</small>
		</div>
	</div>
</body>
</html>