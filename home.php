<?php 
	include 'library.php';
	error_reporting(0);
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
			<h1><a href="home.php">Buka Furniture</a></h1>
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="produk.php">Produk</a></li>
			</ul>
		</div>
	</header>

	<!-- search -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<!-- category -->
	<div class="section">
		<div class="container">
			<h3>Kategori</h3>
			<div class="box">
				<div class="row">
					<a href="produk.php?kat=Meja">
						<div class="col-5">
							<img src="img/icon-kategori.png" width="50px" style="margin-bottom:5px;">
							<p>Meja</p>
						</div>
					</a>
					<a href="produk.php?kat=Kursi">
						<div class="col-5">
							<img src="img/icon-kategori.png" width="50px" style="margin-bottom:5px;">
							<p>Kursi</p>
						</div>
					</a>
					<a href="produk.php?kat=Lemari">
						<div class="col-5">
							<img src="img/icon-kategori.png" width="50px" style="margin-bottom:5px;">
							<p>Lemari</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- new product -->
	<div class="section">
		<div class="container">
			<h3>Produk Terbaru</h3>
			<div class="box">
				<?php 
					$library = new library();
					
					$read = $library->readbyUptoDateData();
					$count = $library->countData();
					if($count > 0){
						while($p = $read->fetch(PDO::FETCH_OBJ)){
				?>	
					<a href="detail-produk.php?id=<?php echo $p->id ?>">
						<div class="col-4">
							<img src="asset/<?= $p->category; ?>/<?= $p->photo; ?>">
							<p class="nama"><?php echo substr($p->name, 0, 30) ?></p>
							<p class="harga">Rp. <?php echo number_format($p->price) ?></p>
						</div>
					</a>
						
				<?php }}else{ ?>
					<p>Produk tidak ada</p>
				<?php } ?>
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