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
$senin = htmlspecialchars($tambah["senin"]);
$selasa = htmlspecialchars($tambah["selasa"]);
$rabu = htmlspecialchars($tambah["rabu"]);
$kamis = htmlspecialchars($tambah["kamis"]);
$waktu = htmlspecialchars($tambah["waktu"]);
$query_tambah = "INSERT INTO hari VALUES
('','$senin','$selasa','$rabu','$kamis','$waktu')";
mysqli_query($db, $query_tambah);
return mysqli_affected_rows($db);
}
function update($data){
    global $db;
    $id = $data["id"];
    $senin = $data["senin"];
    $selasa = $data["selasa"];
    $rabu = $data["rabu"];
    $kamis = $data["kamis"];
    $waktu = $data["waktu"];
    $query_update = "UPDATE hari SET senin = '$senin', selasa = '$selasa', rabu = '$rabu', kamis = '$kamis', waktu = '$waktu' WHERE id = $id";
    mysqli_query($db, $query_update);
return mysqli_affected_rows($db);
}
function delete($id){
    global $db;
    mysqli_query($db, "DELETE FROM hari WHERE id=$id");
    return mysqli_affected_rows($db);
}

?>