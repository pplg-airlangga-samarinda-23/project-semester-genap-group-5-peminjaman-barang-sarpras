<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<style>
  

    header {
        padding: 30px;
        background-color: black;
        color: white;
        text-align: center;
        border-radius: 10px;
        margin-top: -10px;
        font-size: 20px;
        text-transform: uppercase;
    }

    

    button:hover,
    :focus {
        color: #ffffff;
        background: #000000;
        border: 1px solid #000000;
        text-shadow: 0 0 5px #ffffff, 0 0 10px #ffffff, 0 0 20px #ffffff;
        box-shadow: 0 0 5px #000000, 0 0 20px #000000, 0 0 50px #000000,
            0 0 100px #000000;
    }

    .btn {
        display: flex;
        justify-content: space-evenly;
        margin: 0 auto;
        width: 80%;
        margin-top: 8%;
        padding: 100px 50px 100px 50px;
        border-radius: 10px;
        background-color: rgb(233, 233, 233);
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }
</style>

<body>
    <header>
        <h1>PEMINJAMAN ALAT-ALAT SAPRAS</h1>
        <h1>SMK TI AIRLANGGA</h1>
    </header>
    <div class="btn ">
        <button class="button cursor-pointer px-6 py-4 text-black bg-zinc-300 text-lg text-xl uppercase rounded-2xl border duration-0,5 transition-shadow select-none shadow-xl/60 font-[Helvetica]  hover:text-white hover:bg-black " style="text-align: center" onclick="window.location.href='pengembalian.view.php';">PENGEMBALIAN BARANG</button>
        <img src="aset/logo.png" alt="">
        <button class="button cursor-pointer px-6 py-4 text-black bg-zinc-300 text-lg text-xl uppercase rounded-2xl border duration-0,5 transition-shadow select-none shadow-xl/60 font-[Helvetica]  hover:text-white hover:bg-black " class="cursor-pointer" onclick="window.location.href='peminjaman.view.php';">ㅤㅤㅤPEMINJAMANㅤㅤㅤ</button>
    </div>

</body>

</html>



 