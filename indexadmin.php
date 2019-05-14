<?php 
require "../config.php";
// $connect - new PDO('mysql:host=localhost; dbname=latihan', 'root', '');

if(isset($_POST['simpan'])){
    $judul = $_POST['judul'];
    $tgl = $_POST['tgl'];
    $isi = $_POST['isi'];
    $sql = "INSERT INTO  berita (judul, tgl, isi) VALUES (:judul, :tgl, :isi)";
    $stmt = $connect->prepare($sql);
    
    $stmt->bindParam(':judul', $judul);
    $stmt->bindParam(':tgl', $tgl);
    $stmt->bindParam(':isi', $isi);

    $stmt->execute();
    header('Location:index.php');
    exit;
}

$queryUser = $connect->prepare("SELECT * from berita");
$queryUser->execute();
$datas = $queryUser->fetchAll(PDO::FETCH_ASSOC);
// return;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>List berita</p>
    <?php
    foreach($datas as $data){
        echo '<li> <a href="detail.php?id=' .$data['id_berita'] . '">' . $data['judul']. '</a>' . '<a href="drop.php?id=' . $data['id_berita']. '">' . ' hapus' .'</a>' . '<a href="update.php?id=' . $data['id_berita']. '">' . ' edit' .'</a></li>';
    }
    ?>

    <p>Input Berita</p>
    <form action="" method="POST">
    <label>Judul:</label>
      <br>
      <input name="judul" type="text" size="40" id="judul" value="<?php if(isset($_POST['judul'])) echo $_POST['judul'] ?>" placeholder="judul">
      <br><br>

      <label>tanggal:</label>
      <br>
      <input name="tgl" type="date" size="40" id="tgl" value="<?php if(isset($_POST['tgl'])) echo $_POST['tgl'] ?>" placeholder="Ini tanggal">
      <br><br>

      <label>isi:</label>
      <br>
      <input name="isi" type="text" size="40" id="isi" value="<?php if(isset($_POST['isi'])) echo $_POST['isi'] ?>" placeholder="Ini isi"><br>
      <br />
      <p><input type="submit" value="input" name="simpan" ></p>
    </form>
</body>
</html>