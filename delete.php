<?php
require 'logic.php';

$id = $_GET["id"];
$status = delete($id) > 0 ? "success" : "error";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-red-400 to-pink-500 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md text-center">
        <?php if ($status === "success"): ?>
            <div class="text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m-6 4a9 9 0 110-18 9 9 0 010 18z" />
                </svg>
                <h1 class="text-2xl font-bold mb-2">Berhasil!</h1>
                <p>Data berhasil dihapus.</p>
            </div>
        <?php else: ?>
            <div class="text-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <h1 class="text-2xl font-bold mb-2">Gagal!</h1>
                <p>Data gagal dihapus.</p>
            </div>
        <?php endif; ?>
        <a href="index.php" class="mt-6 inline-block bg-blue-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">Kembali ke Halaman Utama</a>
    </div>
</body>
</html>