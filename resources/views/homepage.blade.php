<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
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

    button {
        padding: 10px 20px;   
        text-transform: uppercase;
        border-radius: 8px;
        font-size: 24px;
        font-weight: 500;
        color: #00000080;
        text-shadow: none;
        background: whitesmoke; 
        cursor: pointer;
        box-shadow: transparent;
        border: 1px solid #00000080;
        transition: 0.5s ease;
        user-select: none;
        box-shadow: rgb(0, 0, 0) 0px 20px 30px -10px;
        font-family: "Helvetica";
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
    <div class="btn">
        <button  class="button" style="text-align: center" onclick="window.location.href='/pengembalian';">PENGEMBALIAN BARANG</button>
        <img src="{{ asset('aset/logo.png') }}" alt="">
        <button class="button" class="cursor-pointer" onclick="window.location.href='/pinjaman';">ㅤㅤㅤPEMINJAMANㅤㅤㅤ</button>
    </div>
    
  </body>
</html>



{{-- cursor-pointer px-6 py-4 text-black bg-zinc-200 text-lg text-xl uppercase rounded-2xl border duration-0,5 transition-shadow select-none shadow-xl/60 font-[Helvetica]  hover:text-white hover:bg-black --}}