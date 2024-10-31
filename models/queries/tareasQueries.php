<?php

namespace App\models\queries;

class TareasQueries
{

    static function selectAll()
    {
        return "select * from tareas";
    }
    
    static function insert($tarea)
    {
        $id = $tarea->get('id');
        $título = $tarea->get('título');
        $descripción = $tarea->get('descripción');
        $fechaEstimadaFinalizacion = $tarea->get('fechaEstimadaFinalizacion');
        $fechaFinalizacion = $tarea->get('fechaFinalizacion');
        $creadorTarea = $tarea->get('creadorTarea');
        $observaciones = $tarea->get('observaciones');
        $idEmpleado = $tarea->get('idEmpleado');
        $idEstado = $tarea->get('idEstado');
        $idPrioridad = $tarea->get('idPrioridad');
        $created_at = $tarea->get('created_at');
        $updated_at = $tarea->get('updated_at');
        $sql = "insert into tareas (id, titulo, descripcion, fechaEstimadaFinalizacion, fechaFinalizacion, creadorTarea, observaciones, idEmpleado, idEstado, idPrioridad, created_at, updated_at) values ";
        $sql .= "('$id','$título','$descripción', '$fechaEstimadaFinalizacion','$fechaFinalizacion','$creadorTarea','$observaciones','$idEmpleado','$idEstado','$idPrioridad','$created_at','$updated_at')";
        return $sql;
    }
    static function whereId($id)
    {
        return "select * from tareas where id=$id";
    }
    static function update($tarea)
    {
        $id = $tarea->get('id');
        $título = $tarea->get('título');
        $descripción = $tarea->get('descripción');
        $fechaEstimadaFinalizacion = $tarea->get('fechaEstimadaFinalizacion');
        $fechaFinalizacion = $tarea->get('fechaFinalizacion');
        $creadorTarea = $tarea->get('creadorTarea');
        $observaciones = $tarea->get('observaciones');
        $idEmpleado = $tarea->get('idEmpleado');
        $idEstado = $tarea->get('idEstado');
        $idPrioridad = $tarea->get('idPrioridad');
        $created_at = $tarea->get('created_at');
        $updated_at = $tarea->get('updated_at');
        $sql = "insert into tareas (id, título, descripción, fechaEstimadaFinalizacion, fechaFinalizacion, creadorTarea, observaciones, idEmpleado, idEstado, idPrioridad, created_at, updated_at) values ";
        $sql .= "('$id','$título','$descripción', '$fechaEstimadaFinalizacion','$fechaFinalizacion','$creadorTarea','$observaciones','$idEmpleado','$idEstado','$idPrioridad','$created_at','$updated_at')";
        return $sql;
    }
}