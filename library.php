<?php

class library
{
    public function __construct()
    {
        $this->con = new PDO("mysql:host=localhost;dbname=furniture", "root", "");
    }

    public function __destruct()
    {
        $this->con = NULL;
    }

    public function createData($name, $description, $category, $price, $quantity, $photo)
    {   $sql = "INSERT INTO products(name,description,category,price,quantity,photo) VALUES ('$name','$description','$category','$price','$quantity','$photo')";
        $query = $this->con->prepare($sql);
        $query->execute();
    }

    public function editData($id)
    {
        $query = $this->con->prepare("SELECT * FROM products WHERE id = :id");
        $query->execute(array(':id' => $id));
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function updateData($id, $name, $description, $category, $price, $quantity, $photo)
    {
        $query = $this->con->prepare("UPDATE products SET name = '$name', description = '$description', category = '$category', price = '$price', photo = '$photo', quantity = '$quantity' WHERE id = '$id'");
        $query->execute();
    }

    public function readData()
    {
        $query = $this->con->prepare("SELECT * FROM products");
        $query->execute();
        return $query;
    }

    public function deleteData($id)
    {
        $query = $this->con->prepare("DELETE FROM products WHERE id = '$id'");
        $query->execute();
    }

    public function readDatabyCategory($category)
    {
        $query = $this->con->prepare("SELECT * FROM products WHERE category = '$category'");
        $query->execute();
        return $query;
    }

    public function countData()
    {
        $sql = "SELECT COUNT(*) FROM products";
        $res = $this->con->query($sql);
        $count = $res->fetchColumn();
        return $count;
    }

    public function readDataP($awaldata, $JumlahDataPerHalaman)
    {
        
        $query = $this->con->prepare("SELECT * FROM products LIMIT $awaldata, $JumlahDataPerHalaman");
        $query->execute();
        return $query;
    }   

    public function search($keyword)
    {
        $query = $this->con->prepare("SELECT * FROM products WHERE name LIKE '%$keyword%'" );
        $query->execute();
        return $query;
    }

    public function detailP($id)
    {
        $query = $this->con->prepare("SELECT * FROM products WHERE id = '$id'");
        $query->execute();
        return $query;
    }
    public function readSearchCategoryData(?string $search, ?string $category)
    {
        $sql = $this->con->prepare("SELECT * FROM products WHERE name LIKE '%".$search."%' AND category LIKE '%".$category."%'");
        $sql->execute();
        return $sql;
    }
    
    public function countsDatabySearch(?string $search, ?string $category)
    {
        $result = $this->con->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM products WHERE name LIKE '%".$search."%' AND category LIKE '%".$category."%'"); 
        $result->execute();
        $result = $this->con->prepare("SELECT FOUND_ROWS()"); 
        $result->execute();
        $row_count = $result->fetchColumn();
        return $row_count;
    }

    public function beli($nama, $total, $category, $jumlah_barang)
    {   $sql = "INSERT INTO orders(id, nama_furnitur, total, category, price_date, jumlah_barang) VALUES ('','$nama', '$total','$category', NOW(), $jumlah_barang)";
        $query = $this->con->prepare($sql);
        $query->execute();
    }

    public function kuantitas($jumlah_barang, $id)
    {   $sql = "UPDATE products SET quantity = quantity - '$jumlah_barang' WHERE id = $id";
        $query = $this->con->prepare($sql);
        $query->execute();
    }

    public function loginAdmin($name, $password)
    {
        $sql = "SELECT * FROM user WHERE name = :name AND password = :password;";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":name", $name);
        $statement->bindParam(":password", $password);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function DataOrders()
    {
        $query = $this->con->prepare("SELECT * FROM orders");
        $query->execute();
        return $query;
    }

    public function countDataOrders()
    {
        $sql = "SELECT COUNT(*) FROM orders";
        $res = $this->con->query($sql);
        $count = $res->fetchColumn();
        return $count;
    }

    public function readDataOrders($awaldata, $JumlahDataPerHalaman)
    {
        $query = $this->con->prepare("SELECT * FROM orders LIMIT $awaldata, $JumlahDataPerHalaman");
        $query->execute();
        return $query;
    }   

    public function readbyUptoDateData()
    {
        $query = $this->con->prepare("SELECT * FROM products WHERE quantity > 0 ORDER BY id DESC LIMIT 8");
        $query->execute();
        return $query;
    }

}


