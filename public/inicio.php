<?php
require '../controllers/tareascontroller.php';
require '../controllers/empleadocontroller.php';
require '../controllers/prioridadcontroller.php';
require '../controllers/estadocontroller.php';


require '../models/db/tareas_db.php';
require '../models/entities/tarea.php';
require '../models/entities/prioridad.php';
require '../models/entities/estado.php';
require '../models/entities/empleado.php';

require '../models/queries/tareasQueries.php';
require '../models/queries/empleadoQueries.php';
require '../models/queries/estadoQueries.php';


require '../views/tareasView.php';
require '../views/estadosView.php';
require '../views/empleadosView.php';
require '../views/prioridadesView.php';
require '../models/queries/prioridadQueries.php';



use App\views\TareasViews;
use App\views\PrioridadesViews;
use App\views\EmpleadosViews;
use App\views\EstadosViews;



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
    </header>
    <section>
        <form action="#" method="get" id="formTareas">
            <h2 class="tituloFormulario">Filtrar tareas</h2>
            <fieldset class="fieldsetFormulario">
                <legend class="legendFormulario">Rango de fechas (Fecha de finalización estimada):</legend>
                <div class="campoFormulario">
                    <label for="fechainicio" class="textoEjem">Fecha de inicio</label>
                    <input type="date" name="fechainicio" id="fechainicio" class="inputFecha">
                </div>
                <div class="campoFormulario">
                    <label for="fechaFinalizacion" class="textoEjem">Fecha de fin</label>
                    <input type="date" name="fechaFinalizacion" id="fechaFinalizacion" class="inputFecha">
                </div>
            </fieldset>

            <div class="campoFormulario">
                <label for="titulo" class="textoEjem">Título</label>
                <input type="text" name="titulo" id="titulo" class="inputTexto">
            </div>

            <div class="campoFormulario">
                <label for="descripcion" class="textoEjem">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="inputTexto">
            </div>

            <div class="campoFormulario">
                <label for="personaResponsable" class="textoEjem">Persona responsable</label>
                <?php
                echo (new EmpleadosViews())->getSelect(true);
                ?>
            </div>

            <div class="campoFormulario">
                <label for="estado" class="textoEjem">Estado</label>
                <?php
                echo (new EstadosViews())->getSelect(true);
                ?>
            </div>

            <div class="campoFormulario">
                <label for="prioridad" class="textoEjem">Prioridad</label>
                <?php
                echo (new PrioridadesViews())->getSelect(true);
                ?>
            </div>

            <div class="botonFormulario">
                <button type="submit" id="btnFiltrar" class="btnFormulario">Filtrar</button>
            </div>
        </form>
        <br>
        <?php
        echo $tareasView->getTable($_GET);
        ?>
        <br>
    </section>
</body>


</html>