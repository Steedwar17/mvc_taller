<?php

namespace App\views;

use App\controllers\TareasController;

class TareasViews
{
    private $controller;
    function __construct()
    {
        $this->controller = new TareasController();
    }

    

    function getTable()
    {
        $rows = '';
        $tareas = $this->controller->getAllTareas();

        
        if (count($tareas ) > 0) {
            foreach ($tareas  as $tareas) {
                $id = $tareas ->get('id');
                $rows .= '<tr>';
                $rows .= '   <td>' . $tareas ->get('titulo') . '</td>';
                $rows .= '   <td>' . $tareas ->get('descripcion') . '</td>';
                $rows .= '   <td>' . $tareas ->get('fechaEstimadaFinalizacion') . '</td>';
                $rows .= '   <td>' . $tareas ->get('fechaFinalizacion') . '</td>';
                $rows .= '   <td>' . $tareas ->get('creadorTarea') . '</td>';
                $rows .= '   <td>' . $tareas ->get('observaciones') . '</td>';
                $rows .= '   <td>' . $tareas ->get('idEmpleado') . '</td>';
                $rows .= '   <td>' . $tareas ->get('idEstado') . '</td>';
                $rows .= '   <td>' . $tareas ->get('idPrioridad') . '</td>';
                $rows .= '   <td>' . $tareas ->get('created_at') . '</td>';
                $rows .= '   <td>' . $tareas ->get('updated_at') . '</td>';
                $rows .= '   </td>';
                $rows .= '   <td>';
                $rows .= '      <a href="formulariosTareas.php?cod=' . $id . '">Modificar</a>';
                $rows .= '   </td>';
                $rows .= '   <td>';
                $rows .= '     <a href="eliminarTarea.php?cod=' . $id . '">Eliminar</a>';
                $rows .= '   </td>';
                $rows .= '   <td>';
                $rows .= '     <a href=".php?cod=' . $id . '">Filtrar por prioridad</a>';
                $rows .= '   </td>';
                $rows .= '</tr>';
            }
        } else {
            $rows .= '<tr>';
            $rows .= '   <td colspan="3">No hay datos registrados</td>';
            $rows .= '</tr>';
        }
        $table = '<table class= "tabla">';
        $table .= '  <thead>';
        $table .= '         <th>Título</th>';
        $table .= '         <th>Descripción</th>';
        $table .= '         <th>fechaEstimadaFinalizacion</th>';
        $table .= '         <th>fechaFinalizacion</th>';
        $table .= '         <th>creadorTarea</th>';
        $table .= '         <th>observaciones</th>';
        $table .= '         <th>idEmpleado</th>';
        $table .= '         <th>idEstado</th>';
        $table .= '         <th>idPrioridad</th>';
        $table .= '         <th>created_at </th>';
        $table .= '         <th>updated_at</th>';
        $rows .= '      <th><a href="formulariosTareas.php">Crear</a></th>';
        $table .= '     </tr>';
        $table .= '  </thead>';
        $table .= ' <tbody>';
        $table .=  $rows;
        $table .= ' </tbody>';
        $table .= '</table>';
        return $table;
    }
    function getMsgNewTarea($datosFormulario)
    {
        $datos = [
            "titulo" => $datosFormulario['titulo'],
            "descripcion" => $datosFormulario['descripcion'],
            "fechaEstimadaFinalizacion" => $datosFormulario['fechaEstimadaFinalizacion'],
            "fechaFinalizacion" => $datosFormulario['fechaFinalizacion'],
            "creadorTarea" => $datosFormulario['creadorTarea'],
            "observaciones" => $datosFormulario['observaciones'],
            "idEmpleado" => $datosFormulario['idEmpleado'],
            "idEstado" => $datosFormulario['idEstado'],
            "idPrioridad" => $datosFormulario['idPrioridad'],
        ];
        $confirmarAccion = $this->controller->saveTarea($datos);
        $msg = '<h2>Resultado de la operación</h2>';
        if ($confirmarAccion) {
            $msg .= '<p>Datos de la tarea guardados.</p>';
        } else {
            $msg .= '<p>No se pudo guardar la información de la tarea</p>';
        }
        return $msg;
    }
    function getFormTarea($data)
    {
        $datos = null;
        $form = '<form action="confirmarRegistro.php" method="post">';
        if (!empty($data['cod'])) {
            $form .= '<input type="hidden" name="cod" value="' . $data['cod'] . '">';
            $datos = $this->controller->getTarea($data['cod']);
        }
        $titulo = empty($datos) ? '' : $datos->get('titulo');
        $descripcion = empty($datos) ? '' : $datos->get('descripcion');
        $fechaEstimadaFinalizacion = empty($datos) ? '' : $datos->get('fechaEstimadaFinalizacion');
        $fechaFinalizacion = empty($datos) ? '' : $datos->get('fechaFinalizacion');
        $creadorTarea = empty($datos) ? '' : $datos->get('creadorTarea');
        $observaciones = empty($datos) ? '' : $datos->get('observaciones');
        $idEmpleado = empty($datos) ? '' : $datos->get('idEmpleado');
        $idEstado = empty($datos) ? '' : $datos->get('idEstado');
        $idPrioridad = empty($datos) ? '' : $datos->get('idPrioridad');
        date_default_timezone_set('America/Bogota');
        $fecha_actual = date("Y-m-d H:i:s");

      
        $form .= '  <div>';
        $form .= '      <label>título</label>';
        $form .= '      <input type="text" name="titulo" value="' . $titulo . '" required>';
        $form .= '  </div>';
        $form .= '  <div>';
        $form .= '      <label>descripción</label>';
        $form .= '      <input type="text" name="descripcion" value="' . $descripcion . '" required>';
        $form .= '  </div>';
        $form .= '  <div>';
        $form .= '      <label>fechaEstimadaFinalizacion</label>';
        $form .= '      <input type="text" name="fechaEstimadaFinalizacion" value="' . $fechaEstimadaFinalizacion . '" required>';
        $form .= '  </div>';
        $form .= '  <div>';
        $form .= '      <label>fechaFinalizacion</label>';
        $form .= '      <input type="text" name="fechaFinalizacion" value="' . $fechaFinalizacion . '" required>';
        $form .= '  </div>';
        $form .= '  <div>';
        $form .= '      <label>creadorTarea</label>';
        $form .= '      <input type="text" name="creadorTarea" value="' . $creadorTarea . '" required>';
        $form .= '  </div>';
        $form .= '  <div>';
        $form .= '      <label>observaciones</label>';
        $form .= '      <input type="text" name="observaciones" value="' . $observaciones . '" required>';
        $form .= '  </div>';
        $form .= '  <div>';
        $form .= '      <label>idEmpleado</label>';
        $form .= '      <input type="text" pattern="[1-4]" name="idEmpleado" value="' . $idEmpleado . '" required>';
        $form .= '  </div>';
        $form .= '  <div>';
        $form .= '      <label>idEstado</label>';
        $form .= '      <input type="text" pattern="[1-4]" name="idEstado" value="' . $idEstado . '" required>';
        $form .= '  </div>';
        $form .= '  <div>';
        $form .= '      <label>idPrioridad</label>';
        $form .= '      <input type="text" pattern="[1-3]" name="idPrioridad" value="' . $idPrioridad . '" required>';
        $form .= '  </div>';
        $form .= '  <div>';
        $form .= '      <button type="submit">Guardar</button>';
        $form .= '  </div>';
        $form .= '</form>';
        return $form;
    }
    function getMsgUpdateTarea($datosFormulario)
    {
        $datos = [
            'id' => $datosFormulario['cod'],
            "titulo" => $datosFormulario['titulo'],
            "descripcion" => $datosFormulario['descripcion'],
            "fechaEstimadaFinalizacion" => $datosFormulario['fechaEstimadaFinalizacion'],
            "fechaFinalizacion" => $datosFormulario['fechaFinalizacion'],
            "creadorTarea" => $datosFormulario['creadorTarea'],
            "observaciones" => $datosFormulario['observaciones'],
            "idEmpleado" => $datosFormulario['idEmpleado'],
            "idEstado" => $datosFormulario['idEstado'],
            "idPrioridad" => $datosFormulario['idPrioridad'],
        ];
        if (isset($datosFormulario['created_at'])) {
            $datos['created_at'] = $datosFormulario['created_at'];
        }
        $confirmarAccion = $this->controller->updateTarea($datos);
        $msg = '<h2>Resultado de la operación</h2>';
        if ($confirmarAccion) {
            $msg .= '<p>Datos de la tarea modificados.</p>';
        } else {
            $msg .= '<p>No se pudo guardar la información de la tarea</p>';
        }
        return $msg;
    }
    function getMsgDeleteTarea($id){
        $confirmarAccion = $this->controller->deleteTarea($id);
        $msg = '<h2>Resultado de la operación</h2>';
        if ($confirmarAccion) {
            $msg .= '<p>Datos de la tarea eliminados.</p>';
        } else {
            $msg .= '<p>No se pudo eliminar la información de la tarea</p>';
        }
        return $msg;
    }
    function getMsgOrdenPrioridad($IdPrioridad){
        $confirmarAccion = $this->controller->orderPrioridad($IdPrioridad);
        $msg = '<h2>Resultado de la operación</h2>';
        if ($confirmarAccion) {
            $msg .= '<p>Datos filtrados.</p>';
        } else {
            $msg .= '<p>No se pudo filtrar la información de la tarea</p>';
        }
        return $msg;
    }
}