
<?php
require '../controllers/tareascontroller.php';
require '../controllers/empleadocontroller.php';
require '../controllers/prioridadcontroller.php';

require '../models/db/tareas_db.php';
require '../models/entities/tarea.php';
require '../models/entities/prioridad.php';
require '../models/entities/estado.php';
require '../models/entities/empleado.php';

require '../models/queries/tareasQueries.php';
require '../models/queries/empleadoQueries.php';

require '../views/tareasView.php';
require '../views/estadosView.php';
require '../views/empleadosView.php';
require '../views/prioridadesView.php';

require '../models/queries/prioridadQueries.php';

use App\views\TareasViews;
use App\views\PrioridadesViews;
use App\views\EmpleadosViews;


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
        <form action="#" method="get">
            <br>
            <h2>Filtrar tareas</h2>
        <div>
                <label class="textoEjem">fecha de inicio</label>
                <input type="date" name="fechainicio" value="" >
            </div>

            <div>
                <label class="textoEjem">fecha de finalizacion</label>
                <input type="date" name="fechaFinalizacion" value="" >
            </div>
            <div>
                <label class="textoEjem">Prioridad</label>
            <?php
            echo (new PrioridadesViews())->getSelect();
            ?>
            </div>
            <div>
                <label class="textoEjem">Persona responsable</label>
                <?php
            echo (new EmpleadosViews())->getSelect();
            ?>
            </div>
            <div>
                <label class="textoEjem">Título</label>
                <input type="text" name="titulo" value="" >
            </div>
            <div>
                <label class="textoEjem">Descripción</label>
                <input type="text" name="descripcion" value="" >
            </div>
            <div>
            <button type="submit">Filtrar</button>
            </div>
        </form>
        <br>
        <?php echo $tareasView->getTable($_GET); ?>
        <br>
    </section>
</body>

</html>