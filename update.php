<?php
require "../config.php";

$queryUser = $connect->prepare("SELECT * from berita where id_berita=:id_berita");
$queryUser->bindParam(':id_berita', $_GET['id']);
$queryUser->execute();
$datas = $queryUser->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['update'])){
    
    $sql = "UPDATE berita SET judul=:judul, tgl=:tgl, isi=:isi where id_berita = :id_berita";

    // UPDATE user SET judul= 'judul', tgl= 'tgl', isi= 'aang' where id_berita = 1 
    // var_dump($_POST['judul']);
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':judul', $_POST['judul']);
    $stmt->bindParam(':tgl', $_POST['tgl']);
    $stmt->bindParam(':isi', $_POST['isi']);
    $stmt->bindParam(':id_berita', $_GET['id']);
    
    
    $stmt->execute();
    header('Location:index.php');
}
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
<form action="" method="POST">
    <p>judul : <input type="text" name="judul" value="<?php echo $datas['judul'] ?>"> </p>
    <p>tgl : <input type="text" name="tgl" value="<?php echo $datas['tgl'] ?>"></p>
    <p>isi : <input type="text" name="isi" value="<?php echo $datas['isi'] ?>"></p>
    <p><input type="submit" value="update" name="update" ></p>
</form>
</body>
</html>