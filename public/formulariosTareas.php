<?php
require '../controllers/tareascontroller.php';
require '../models/db/tareas_db.php';
require '../models/entities/tarea.php';
require '../models/queries/tareasQueries.php';
require '../views/tareasView.php';

use App\views\TareasViews;

$tareasViews = new TareasViews();
$title = empty($_GET['cod'])?'Registrar Tarea':'Modificar Tarea';
$form = $tareasViews->getFormTarea($_GET);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario tareas</title>
</head>

<body>
    <header>
        <h1><?php echo $title;?></h1>
    </header>
    <section>
        <?php echo $form;?>
    </section>
</body>

</html>