<?php
namespace App\controllers;
use App\models\entities\Tarea;
use date;

class TareasController {
    function getAllTareas() {
        return Tarea::all();
    }
    function saveTarea($datos) {
        $tarea = new Tarea();
        $tarea->set('titulo', $datos['titulo']);
        $tarea->set('descripcion', $datos['descripcion']);
        $tarea->set('fechaEstimadaFinalizacion', $datos['fechaEstimadaFinalizacion']);
        $tarea->set('fechaFinalizacion', $datos['fechaFinalizacion']);
        $tarea->set('creadorTarea', $datos['creadorTarea']);
        $tarea->set('observaciones', $datos['observaciones']);
        $tarea->set('idEmpleado', $datos['idEmpleado']);
        $tarea->set('idEstado', $datos['idEstado']);
        $tarea->set('idPrioridad', $datos['idPrioridad']);
        $tarea->set('created_at', date("Y-m-d H:i:s"));
        $tarea->set('updated_at', date("Y-m-d H:i:s"));
        return $tarea->save();
    }
    function getTarea($id) {
        return Tarea::find($id);
    }
    function updateTarea($datos) {
        $tarea = new Tarea();
        $tarea->set('id', $datos['id']);
        $tarea->set('titulo', $datos['titulo']);
        $tarea->set('descripcion', $datos['descripcion']);
        $tarea->set('fechaEstimadaFinalizacion', $datos['fechaEstimadaFinalizacion']);
        $tarea->set('fechaFinalizacion', $datos['fechaFinalizacion']);
        $tarea->set('creadorTarea', $datos['creadorTarea']);
        $tarea->set('observaciones', $datos['observaciones']);
        $tarea->set('idEmpleado', $datos['idEmpleado']);
        $tarea->set('idEstado', $datos['idEstado']);
        $tarea->set('idPrioridad', $datos['idPrioridad']);
        $tarea->set('updated_at',  date("Y-m-d H:i:s"));
        return $tarea->update();
    }
    function deleteTarea($id)
    {
        $tarea = new Tarea();
        $tarea->set('id', $id);
        return $tarea->delete();
    }
    function  orderPrioridad($IdPrioridad)
    {
        $tarea = new Tarea();
        $tarea->set('IdPrioridad', $IdPrioridad);
        return $tarea->IdPrioridad();
    }
}
?>
