<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';
include 'entidades/personajes.php';
$jsonPersonajes = file_get_contents('personajes.json');

$pg = "Personaje Del Bosque";

$personajes = json_decode($jsonPersonajes, true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api Bosque</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="container-fluid h-100 m-0 p-0">
    <div class="fondo">
        <main class="d-flex align-items-center justify-content-center">
            <section id="inicio" class="d-flex align-items-center justify-content-center">
                <h1>Sullivan</h1>
            </section>
    </div>
    <section>
        <table class="table table-hover">
            <div class="row">
                <div class="col-12">
                    <tr class="text-center">
                        <th class="bg-dark text-white">Nombre</th>
                        <th class="bg-dark text-white">Estado</th>
                        <th class="bg-dark text-white">Historia</th>
                        <th class="bg-dark text-white">Raza</th>
                    </tr>
                    <?php foreach($personajes as $item):?>
                    <tr class="text-center">
                            <td class="bg-secondary text-white"><?php echo $item["nombre"] ;?></td>
                            <td class="bg-secondary text-white"><?php echo $item["estado"] ;?></td>
                            <td class="bg-secondary text-white"><?php echo $item["historia"] ;?></td>
                            <td class="bg-secondary text-white"><?php echo $item["raza"] ;?></td>
                        </tr>
                        <?php endforeach;?>
                </div>
            </div>
        </table>
    </section>
    </main>
</body>

</html>