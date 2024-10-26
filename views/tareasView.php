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
                $rows .= '   <td>';
                $rows .= '      <a href="">Crear</a>';
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
        $table .= '     </tr>';
        $table .= '  </thead>';
        $table .= ' <tbody>';
        $table .=  $rows;
        $table .= ' </tbody>';
        $table .= '</table>';
        return $table;
    }
}