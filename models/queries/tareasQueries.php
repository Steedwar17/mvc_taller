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
        $titulo = $tarea->get('titulo');
        $descripcion = $tarea->get('descripcion');
        $fechaEstimadaFinalizacion = $tarea->get('fechaEstimadaFinalizacion');
        $fechaFinalizacion = $tarea->get('fechaFinalizacion');
        $creadorTarea = $tarea->get('creadorTarea');
        $observaciones = $tarea->get('observaciones');
        $idEmpleado = $tarea->get('idEmpleado');
        $idEstado = $tarea->get('idEstado');
        $idPrioridad = $tarea->get('idPrioridad');
        $created_at = $tarea->get('created_at');
        $updated_at = $tarea->get('updated_at');
        $sql = "insert into tareas (titulo, descripcion, fechaEstimadaFinalizacion, fechaFinalizacion, creadorTarea, observaciones, idEmpleado, idEstado, idPrioridad, created_at, updated_at) values ";
        $sql .= "('$titulo','$descripcion', '$fechaEstimadaFinalizacion','$fechaFinalizacion','$creadorTarea','$observaciones','$idEmpleado','$idEstado','$idPrioridad','$created_at','$updated_at')";
        return $sql;
    }
    static function whereId($id)
    {
        return "select * from tareas where id=$id";
    }
    static function update($tarea)
    {
        $id = $tarea->get('id');
        $titulo = $tarea->get('titulo');
        $descripcion = $tarea->get('descripcion');
        $fechaEstimadaFinalizacion = $tarea->get('fechaEstimadaFinalizacion');
        $fechaFinalizacion = $tarea->get('fechaFinalizacion');
        $creadorTarea = $tarea->get('creadorTarea');
        $observaciones = $tarea->get('observaciones');
        $idEmpleado = $tarea->get('idEmpleado');
        $idEstado = $tarea->get('idEstado');
        $idPrioridad = $tarea->get('idPrioridad');
        $updated_at = $tarea->get('updated_at');
        $sql = "update tareas set titulo='$titulo', descripcion='$descripcion', fechaEstimadaFinalizacion='$fechaEstimadaFinalizacion', fechaFinalizacion='$fechaFinalizacion', creadorTarea='$creadorTarea', observaciones='$observaciones', idEmpleado='$idEmpleado', idEstado='$idEstado', idPrioridad='$idPrioridad', updated_at='$updated_at' where id=$id";
        return $sql;
    }
    static function delete($tarea)
    {
        $id = $tarea->get('id');
        return "delete from tareas where id=$id";
    }
    static function whereIdPrioridad($IdPrioridad)
    {
        return "select * from tareas where IdPrioridad=$IdPrioridad";
    }
    static function orderPrioridad($IdPrioridad)
    {
        $sql = "SELECT * FROM `tareas`  \n"

    . "ORDER BY `tareas`.`idPrioridad` ASC;";
        return $sql;
    }
}