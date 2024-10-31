<?php
namespace App\controllers;
use App\models\entities\tarea;
class TareasController{
    function getAllTareas(){
        return Tarea::all();
    }
    function saveTarea($datos)
    {
        $tarea = new tarea();
        $tarea->set('id', $datos['id']);
        $tarea->set('título', $datos['título']);
        $tarea->set('descripción', $datos['descripción']);
        $tarea->set('fechaEstimadaFinalizacion', $datos['fechaEstimadaFinalizacion']);
        $tarea->set('fechaFinalizacion', $datos['fechaFinalizacion']);
        $tarea->set('creadorTarea', $datos['creadorTarea']);
        $tarea->set('observaciones', $datos['observaciones']);
        $tarea->set('idEmpleado', $datos['idEmpleado']);
        $tarea->set('idEstado', $datos['idEstado']);
        $tarea->set('idPrioridad', $datos['idPrioridad']);
        $tarea->set('created_at', $datos['created_at']);
        $tarea->set('updated_at', $datos['updated_at']);
        return $tarea->save();
    }
    function getTarea($id)
    {
        return Tarea::find($id);
    }
    function updateTarea($datos)
    {
        $tarea = new Tarea();
        $tarea->set('id', $datos['id']);
        $tarea->set('nombre', $datos['nombre']);
        $tarea->set('email', $datos['email']);
        $tarea->set('telefono', $datos['telefono']);
        return $tarea->update();
    }
}