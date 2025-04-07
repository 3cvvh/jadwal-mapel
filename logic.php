<?php
$db = mysqli_connect('localhost','root','','jadwal');
function tampil($query){
global $db;
$hasil = mysqli_query($db, $query);
$row = [];
while($rows = mysqli_fetch_assoc($hasil)){
$row[] = $rows;
}
return $row;
}

function tambah($tambah){
global $db;
$senin = htmlspecialchars($_POST["senin"]);
$selasa = htmlspecialchars($_POST["selasa"]);
$rabu = htmlspecialchars($_POST["rabu"]);
$kamis = htmlspecialchars($_POST["kamis"]);
$waktu = htmlspecialchars($_POST["waktu"]);
$query_tambah = "INSERT INTO hari VALUES
('','$senin','$selasa','$rabu','$kamis','$waktu')";
mysqli_query($db, $query_tambah);
return mysqli_affected_rows($db);
}

?>