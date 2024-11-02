
<?php
require '../controllers/tareascontroller.php';

require '../models/db/tareas_db.php';
require '../models/entities/tarea.php';
require '../models/entities/prioridad.php';
require '../models/entities/estado.php';
require '../models/entities/empleado.php';

require '../models/queries/tareasQueries.php';

require '../views/tareasView.php';
require '../views/estadosView.php';
require '../views/empleadosView.php';



use App\views\TareasViews;
$tareasView = new TareasViews();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="css/inicio.css">
</head>

<body>
    <header>
        <h1>Lista de Tareas</h1>
    </header>
    <section>
        <br>
        <?php echo $tareasView->getTable(); ?>
        <br>
    </section>


 
</body>

</html>