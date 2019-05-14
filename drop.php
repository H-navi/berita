<?php
require "../config.php";
$id_berita = $_GET['id'];
$sql = "DELETE FROM berita where id_berita = :id_berita";
$stmt = $connect->prepare($sql);
$stmt->bindParam(':id_berita', $id_berita);
$stmt->execute();
var_dump($connect);



// $user = $stmt->fetch(PDO::FETCH_ASSOC);
header('Location:index.php');
// exit;
?>