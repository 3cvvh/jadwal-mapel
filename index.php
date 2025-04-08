<?php
require 'logic.php';
$jumlahdatahalaman = 2;
$total_data = count(tampil("SELECT*FROM hari"));
$jumlahhalaman = ceil($total_data/$jumlahdatahalaman);
$halaman_aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awal_halaman = ($jumlahdatahalaman * $halaman_aktif) - $jumlahdatahalaman;

$hari = tampil("SELECT*FROM hari LIMIT $awal_halaman,$jumlahdatahalaman");
if(isset($_POST["kirim"])){
    $hari = cari($_POST["search"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pelajaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-500 min-h-screen flex items-center justify-center">
    <div class="container mx-auto p-5 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-5 text-gray-800">Jadwal Pelajaran</h1>
<div class="mb-5 text-center">
    <form action="" method="post" class="flex justify-center items-center gap-2">
        <input 
            type="text" 
            name="search" 
            placeholder="Cari jadwal..." 
            class="w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off" autofocus
        >
        <button 
            name="kirim" 
            type="submit" 
            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300"
        >
            Cari
        </button>
    </form>
    <a href="tambah.php" class="mt-3 inline-block bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300">
        Tambahkan Jadwal
    </a>
</div>
        <table class="table-auto w-full border-collapse border border-gray-300 shadow-md">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    <th class="border border-gray-300 px-4 py-2">Senin</th>
                    <th class="border border-gray-300 px-4 py-2">Selasa</th>
                    <th class="border border-gray-300 px-4 py-2">Rabu</th>
                    <th class="border border-gray-300 px-4 py-2">Kamis</th>
                    <th class="border border-gray-300 px-4 py-2">Jam</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($hari as $h): ?>
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $i++; ?></td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="update.php?id=<?php echo $h["id"]; ?>" class="text-blue-500 hover:underline">Update</a> |
                        <a href="delete.php?id=<?php echo $h['id']?>" class="text-red-500 hover:underline">Delete</a>
                    </td>
                    <td class="border border-gray-300 px-4 py-2"><?php echo $h["senin"]; ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?php echo $h["selasa"]; ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?php echo $h["rabu"]; ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?php echo $h["kamis"]; ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?php echo $h["waktu"]; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            
        <div class="mt-5 flex justify-center">
    <nav class="inline-flex shadow-sm">
        <?php if ($halaman_aktif > 1): ?>
            <a href="?halaman=<?php echo $halaman_aktif - 1; ?>" 
               class="px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-100">
                &laquo; Previous
            </a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $jumlahhalaman; $i++): ?>
            <a href="?halaman=<?php echo $i; ?>" 
               class="px-4 py-2 border border-gray-300 <?php echo ($i == $halaman_aktif) ? 'bg-blue-500 text-white' : 'bg-white text-gray-700 hover:bg-gray-100'; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>

        <?php if ($halaman_aktif < $jumlahhalaman): ?>
            <a href="?halaman=<?php echo $halaman_aktif + 1; ?>" 
               class="px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-100">
                Next &raquo;
            </a>
        <?php endif; ?>
    </nav>
</div>
        </table>
    </div>
</body>
</html>