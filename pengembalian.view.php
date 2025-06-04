<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PEMINJAMAN</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class=" flex flex-col items-center bg-stone-100">
    
    <h1 class="font-sans text-5xl uppercase">Pengembalian</h1>
    <form action="backside/kembali.php" method="POST" class="m-10 flex w-5/6 flex-col gap-y-5 items-center">
        
        <div class="flex flex-col w-5/6">
            <label for="nama" class="font-sans font-bold">Nama Lengkap</label>
            <input type="text" class="border rounded-md h-10 capitalize px-8 bg-white" name="nama-kembali" id="" placeholder="naim">
        </div>
        <div class="flex flex-col w-5/6">
            <label for="nama" class="font-sans font-bold">Kelas</label>
            <input type="text" class="border rounded-md h-10 capitalize px-8 bg-white" name="kelas-kembali" id="" placeholder="xpplg">
        </div>
        <div class="flex flex-col w-5/6">
            <label for="nama" class="font-sans font-bold">Nisn</label>
            <input type="text" class="border rounded-md h-10 capitalize px-8 bg-white" name="nisn-kembali" id="" placeholder="00*****">
        </div>
        <div class="flex flex-col w-5/6">
            <label for="nama" class="font-sans font-bold">Nama Barang</label>
            <input type="text" class="border rounded-md h-10 capitalize px-8 bg-white" name="nama-barang-kembali" id="" placeholder="stop kontak">
        </div>

        <div class="flex flex-col w-5/6">
            <label for="nama" class="font-sans font-bold">foto bukti Pengembalian</label>
            <input type="file" name="imagin_dragon" id="" class="bg-amber-500 w-1/3">
        </div>


        <button class="bg-slate-600 cursor-pointer rounded-md w-4/6 font-bold hover:bg-slate-500 " name="subm">submit</button>
      
    </form>
    <div class="flex flex-row items-start w-5/6">
        <button class="w-1/3 bg-slate-600 rounded-r-2xl -translate-x-10 cursor-pointer hover:bg-red-600 " onclick="window.location.href='/';">kembali</button>
    </div>

</body>
</html>