<?php
require 'logic.php';
$hari = tampil("SELECT * FROM hari");
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
            <a href="tambah.php" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
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
        </table>
    </div>
</body>
</html>