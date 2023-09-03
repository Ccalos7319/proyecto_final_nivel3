<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Maestro</title>
    <link href="/dist/output.css" rel="stylesheet">
</head>

<body>
    <div class="flex flex-col justify-center  h-screen items-center">

        <form class=" w-[350px] h-[600px]  flex flex-col gap-4 justify-center  rounded-2xl bg-slate-200 p-4" action="/src/handle_db/create_db_maestro.php" method="post">
            <h1 class="text-[30px] font-semibold">Agregar Maestro</h1>
            
            <label class=" font-semibold" for="dni">DNI </label>
            <input class="w-[310px] h-[30px] rounded-md" type="text" name="dni" >
            <label class=" font-semibold" for="correo">Correo Electronico </label>
            <input class="w-[310px] h-[30px] rounded-md" type="text" name="correo" >
            <label class=" font-semibold" for="nombre">Nombre(s) </label>
            <input class="w-[310px] h-[30px] rounded-md" type="text" name="nombre">
            <label class=" font-semibold" for="direccion">Direccion </label>
            <input class="w-[310px] h-[30px] rounded-md" type="text" name="direccion" >
            <label class=" font-semibold" for="fecnac">Fecha de nacimiento</label>
            <input class="w-[310px] h-[30px] rounded-md" type="text" name="fecnac">

            <div class="flex gap-3 justify-end w-[310px] pt-3">
                <button class="bg-[#6c757c] text-white rounded-md w-20 h-7">Close</button>
                <button class="bg-[#007aff] w-20 h-7 rounded-md text-white font-semibold" type="submit">Crear</button>

            </div>

        </form>
    </div>
</body>

</html>