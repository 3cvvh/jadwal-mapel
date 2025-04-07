<?php
require 'logic.php';
$id = $_GET["id"];
$result = tampil("SELECT*FROM hari WHERE id = $id")[0];
if(isset($_POST["submit"])){

    if(update($_POST) > 0){
        $status = "success"; 
    }else{
        $status = "error"; 
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Jadwal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gradient-to-r from-green-400 to-blue-500 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-lg transform transition duration-500 hover:scale-105">
        <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-6">Tambahkan Jadwal</h1>

        
        <div x-data="{ show: <?php echo $status ? 'true' : 'false'; ?>, type: '<?php echo $status; ?>' }" x-show="show" x-transition class="mb-6">
            <div x-show="type === 'success'" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">Data diubah ditambahkan.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" @click="show = false">&times;</span>
            </div>
            <div x-show="type === 'error'" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Gagal!</strong>
                <span class="block sm:inline">Data gagal diubah.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" @click="show = false">&times;</span>
            </div>
        </div>
        <p class="text-center text-gray-600 mb-4">Silakan isi form di bawah ini untuk menambahkan jadwal pelajaran.</p>
        <form action="" method="post" class="space-y-6">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div>
                <label for="senin" class="block text-gray-700 font-semibold mb-1">Senin</label>
                <input type="text" id="senin" name="senin" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required value="<?php echo $result["senin"]; ?>">
            </div>
            <div>
                <label for="selasa" class="block text-gray-700 font-semibold mb-1">Selasa</label>
                <input type="text" id="selasa" name="selasa" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required value="<?php echo $result["selasa"]; ?>">
            </div>
            <div>
                <label for="rabu" class="block text-gray-700 font-semibold mb-1">Rabu</label>
                <input type="text" id="rabu" name="rabu" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required value="<?php echo $result["rabu"]; ?>">
            </div>
            <div>
                <label for="kamis" class="block text-gray-700 font-semibold mb-1">Kamis</label>
                <input type="text" id="kamis" name="kamis" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required value="<?php echo $result["kamis"]; ?>">
            </div>
            <div>
                <label for="waktu" class="block text-gray-700 font-semibold mb-1">Waktu</label>
                <input type="text" id="waktu" name="waktu" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required value="<?php echo $result["waktu"]; ?>">
            </div>
            <div class="text-center">
                <button name="submit" type="submit" class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-2 rounded-lg shadow-md hover:shadow-lg hover:from-blue-600 hover:to-purple-600 cursor-pointer transition duration-300">Tambahkan</button>
            </div>
        </form>
    </div>
</body>
</html>