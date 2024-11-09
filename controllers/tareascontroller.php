<?php
namespace App\controllers;
use App\models\entities\Tarea;
use date;

class TareasController {
    function getAllTareas($filtro) {
        $datos = [
            'fechainicio',
            'fechaFinalizacion',
            'prioridad',
            'empleado',
            'titulo',
            'descripcion',
        ];
        $i = 0;
        $llegoDato = false;
        while ($i < count($datos)) {
            $key = $datos[$i];
            if (!empty($filtro[$key])) {
                $llegoDato = true;
                break;
            }
            $i++;
        }
        if ($llegoDato) {
            return Tarea::filtro($filtro);
        } else {
            return Tarea::all();
        }
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
}
?>
