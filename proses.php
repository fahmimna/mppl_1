<?php
session_start();
include("library.php");
$action = $_GET['action'];

if ($action == "create") {
    //$id = $_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	//$description = nl2br($description);
	$category = $_POST['category'];
    $quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$photo = $_FILES['photo']['tmp_name'];
	$nama_foto = $_FILES['photo']['name'];
	$directory = "asset/$category/";
	$move = move_uploaded_file($photo, $directory . $nama_foto);

	if ($move) {
		$library = new library();
		$library->createData($name, $description, $category, $price,$quantity, $nama_foto);
		header("location:data-product.php");
	}
}

if ($action == "edit") {
	$id = $_POST['id'];
	$name = $_POST['nama'];
	$description = $_POST['description'];
	//$description = nl2br($description);
	$category = $_POST['category'];
	$kategori_lama = $_POST['kategori_lama'];
	$price = $_POST['price'];
    $quantity = $_POST['quantity'];
	$foto_lama = $_POST['foto_lama'];
	$photo = $_FILES['photo']['tmp_name'];
	$nama_foto = $_FILES['photo']['name'];
	$directory = "asset/$category/";
	$library = new library();

	if (empty($_FILES['photo']['tmp_name'])) {
		$library->updateData($id, $name,$description, $category, $price,$quantity, $foto_lama);
		header("location:data-product.php");
	} else {
		$directory_lama = "asset/$kategori_lama/";
		move_uploaded_file($photo, $directory . $nama_foto);
		unlink($directory_lama . $foto_lama);
		$library->updateData($id, $name, $description, $category, $price,$quantity, $nama_foto);
		header("location:data-product.php");
	}
}

if ($action == "delete") {
	$library = new library();
	$library->deleteData($_GET['id']);
	header("location:data-product.php");
}

if ($action == "login"){
	$name = $_POST['name'];
	$password = $_POST['password'];

	$library = new library();
	$user = $library->loginAdmin($name, $password);
	if($user != NULL){
		$_SESSION["login"] = true;
        $_SESSION['name'] = $user['name'];
        $_SESSION['id'] = $user['id'];
        header('Location:dashboard.php');
	}else{
		
		header('Location:login.php?pesan=gagal');
	}

}

if ($action == 'logout'){
	session_destroy();
	header('Location:login.php');
}

if ($action == "beli") {
    //$id = $_POST['id'];
	$total = $_POST['total'];
	$category = $_POST['category'];
	$jumlah_barang = $_POST['quantity'];
	$stok = $_POST['jumlah_barang'];
	$nama = $_POST['nama'];
	$id = $_POST['id'];
	$total = $total * $jumlah_barang;
	if ($jumlah_barang > $stok || $jumlah_barang<1) {
		echo "<script>
        alert('pembelian melebihi stok atau anda salah input');
        document.location.href = 'beli.php?id=$id';
        </script>";
	}else {
		$library = new library();
		$library->beli($nama, $total, $category, $jumlah_barang);
		$library->kuantitas($jumlah_barang, $id);
		echo "<script>
        alert('pembelian berhasil');
        document.location.href = 'produk.php';
        </script>";
	}
}


