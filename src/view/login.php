<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/dist/output.css" rel="stylesheet">
</head>
<body>
    <main class=" h-screen flex justify-center items-center bg-[#fff5d2]">
        <div class=" flex flex-col items-center ">
            <div class=" w-36 h-36">
                <img class="w-36 h-36" src="/public/logo.jpg" alt="">
            </div>
            <form class=" w-[350px] h-[250px]  flex flex-col gap-6 justify-center items-center rounded-2xl bg-slate-200 " action="" method="post">
                <p>Bienvenido Ingresa con tu cuenta</p>
                <div class="flex">
                    <img class=" w-7 h-7" src="/public/email.png" alt="email">
                     <input class="  ml-6  rounded-md w-56 h-8 " type="email" placeholder="email">
                </div>
                <div class="flex  ">
                    <img class=" w-7 h-7 " src="/public/pass.png" alt="password">
                    <input class="ml-6 rounded-md w-56 h-8 relative " type="password" placeholder="password">
                </div> 
                
                <button class=" bg-[#007aff] rounded-lg w-28 h-8 items-end" type="submit">Ingresar</button>
            </form>
        </div>
    </main>
</body>
</html>