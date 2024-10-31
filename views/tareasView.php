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
            foreach ($tareas  as $tareas ) {
                $id = $tareas ->get('id');
                $rows .= '<tr>';
                $rows .= '   <td>' . $tareas ->get('id') . '</td>';
                $rows .= '   <td>' . $tareas ->get('título') . '</td>';
                $rows .= '   <td>' . $tareas ->get('descripción') . '</td>';
                $rows .= '   <td>' . $tareas ->get('fechaEstimadaFinalizacio') . '</td>';
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
                $rows .= '      <a href="">Modificar</a>';
                $rows .= '   </td>';
                $rows .= '   <td>';
                $rows .= '     <a href="">Eliminar</a>';
                $rows .= '   </td>';
                $rows .= '</tr>';
            }
        } else {
            $rows .= '<tr>';
            $rows .= '   <td colspan="3">No hay datos registrados</td>';
            $rows .= '</tr>';
        }
        $table = '<table>';
        $table .= '  <thead>';
        $table .= '     <tr>';
        $table .= '         <th>Título</th>';
        $table .= '         <th>Descripción</th>';
        $table .= '         <th>Fecha de creación</th>';
        $table .= '         <th>Fecha de modificación</th>';
        $table .= '         <th>Estado</th>';
        $table .= '         <th>Fecha estimada de finalización</th>';
        $table .= '         <th>Fecha de finalización</th>';
        $table .= '         <th>Autor</th>';
        $table .= '         <th>Responsable</th>';
        $table .= '         <th>Prioridad </th>';
        $table .= '         <th>Observaciones</th>';
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
            "id" => $datosFormulario['id'],
            "título" => $datosFormulario['título'],
            "descripción" => $datosFormulario['descripción'],
            "fechaEstimadaFinalizacion" => $datosFormulario['fechaEstimadaFinalizacion'],
            "fechaFinalizacion" => $datosFormulario['fechaFinalizacion'],
            "creadorTarea" => $datosFormulario['creadorTarea'],
            "observaciones" => $datosFormulario['observaciones'],
            "idEmpleado" => $datosFormulario['idEmpleado'],
            "idEstado" => $datosFormulario['idEstado'],
            "idPrioridad" => $datosFormulario['idPrioridad'],
            "created_at" => $datosFormulario['created_at'],
            "updated_at" => $datosFormulario['updated_at'],
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
        $id = empty($datos) ? '' : $datos->get('id');
        $título = empty($datos) ? '' : $datos->get('título');
        $descripción = empty($datos) ? '' : $datos->get('descripción');
        $fechaEstimadaFinalizacion = empty($datos) ? '' : $datos->get('fechaEstimadaFinalizacion');
        $fechaFinalizacion = empty($datos) ? '' : $datos->get('fechaFinalizacion');
        $creadorTarea = empty($datos) ? '' : $datos->get('creadorTarea');
        $observaciones = empty($datos) ? '' : $datos->get('observaciones');
        $idEmpleado = empty($datos) ? '' : $datos->get('idEmpleado');
        $idEstado = empty($datos) ? '' : $datos->get('idEstado');
        $idPrioridad = empty($datos) ? '' : $datos->get('idPrioridad');
        $created_at = empty($datos) ? '' : $datos->get('created_at');
        $updated_at = empty($datos) ? '' : $datos->get('updated_at');
      

        $form .= '  <div>';
        $form .= '      <label>id</label>';
        $form .= '      <input type="text" name="id" value="' . $id . '" required>';
        $form .= '  </div>';
        $form .= '  <div>';
        $form .= '      <label>título</label>';
        $form .= '      <input type="text" name="título" value="' . $título . '" required>';
        $form .= '  </div>';
        $form .= '  <div>';
        $form .= '      <label>descripción</label>';
        $form .= '      <input type="text" name="descripción" value="' . $descripción . '" required>';
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
        $form .= '      <input type="text" name="idEmpleado" value="' . $idEmpleado . '" required>';
        $form .= '  </div>';
        $form .= '  <div>';
        $form .= '      <label>idEstado</label>';
        $form .= '      <input type="text" name="idEstado" value="' . $idEstado . '" required>';
        $form .= '  </div>';
        $form .= '  <div>';
        $form .= '      <label>idPrioridad</label>';
        $form .= '      <input type="text" name="idPrioridad" value="' . $idPrioridad . '" required>';
        $form .= '  </div>';
        $form .= '  <div>';
        $form .= '      <label>created_at</label>';
        $form .= '      <input type="text" name="created_at" value="' . $created_at . '" required>';
        $form .= '  </div>';
        $form .= '  <div>';
        $form .= '      <label>updated_at</label>';
        $form .= '      <input type="text" name="updated_at" value="' . $updated_at . '" required>';
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
            "id" => $datosFormulario['id'],
            "título" => $datosFormulario['título'],
            "descripción" => $datosFormulario['descripción'],
            "fechaEstimadaFinalizacion" => $datosFormulario['fechaEstimadaFinalizacion'],
            "fechaFinalizacion" => $datosFormulario['fechaFinalizacion'],
            "creadorTarea" => $datosFormulario['creadorTarea'],
            "observaciones" => $datosFormulario['observaciones'],
            "idEmpleado" => $datosFormulario['idEmpleado'],
            "idEstado" => $datosFormulario['idEstado'],
            "idPrioridad" => $datosFormulario['idPrioridad'],
            "created_at" => $datosFormulario['created_at'],
            "updated_at" => $datosFormulario['updated_at'],
        ];
        $confirmarAccion = $this->controller->updateTarea($datos);
        $msg = '<h2>Resultado de la operación</h2>';
        if ($confirmarAccion) {
            $msg .= '<p>Datos de la tarea guardados.</p>';
        } else {
            $msg .= '<p>No se pudo guardar la información de la tarea</p>';
        }
        return $msg;
    }
}