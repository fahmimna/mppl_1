<?php 
session_start();
error_reporting(0);
	include("library.php");
    $library = new library();
	$read = $library->detailP($_GET['id']);
    $p = $read->fetch(PDO::FETCH_OBJ);
    

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


	<!-- product detail -->
	<div class="section">
		<div class="container">
			<h3>Detail Produk</h3>
			<div class="box">
				<div class="col-2">
					<img src="asset/<?= $p->category; ?>/<?= $p->photo; ?>" width="100%">
				</div>
				<div class="col-2">
					<h3><?php echo $p->name ?></h3>
					<h4>Rp. <?= number_format($p->price,2,",","."); ?></h4>
					<p>Deskripsi :<br>
						<?php echo nl2br($p->description) ?>
					</p>
					<p>Stok :
						<?php echo $p->quantity ?>
					</p>
					<?php if($p->quantity!=0) {?>
					<td>
						<?php if(isset($_SESSION["login"])){ 
							if($_SESSION['login']==true){?>
                         <a href="beli.php?id=<?= $p->id; ?>" class="btn">BELI</a>
						 
						<?php }} ?>
                    </td>
					<?php }else{ ?>
						 <td>
        				 <input type="button" value="Stok Kosong" class="btn" disabled>
       					 </td>
						<?php } ?>
				</div>
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