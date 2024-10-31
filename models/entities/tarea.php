<?php

namespace App\models\entities;

use App\models\db\TareasDb;
use App\models\queries\TareasQueries;

class Tarea
{
    private $id;
    private $título;
    private $descripción;
    private $fechaEstimadaFinalizacion;
    private $fechaFinalizacion;
    private $creadorTarea;
    private $observaciones;
    private $idEmpleado;
    private $idEstado;
    private $idPrioridad;
    private $created_at;
    private $updated_at;
 
    function set($prop, $value)
    {
        $this->{$prop} = $value;
    }

    function get($prop)
    {
        return $this->{$prop};
    }

    static function all()
    {
        $sql = TareasQueries::selectAll();
        $db = new TareasDb();
        $result = $db->query($sql);
        $tareas = [];
        while ($row = $result->fetch_assoc()) {
            $tarea = new Tarea();
            $tarea->set('id', $row['id']);
            $tarea->set('título', $row['título']);
            $tarea->set('descripción', $row['descripción']);
            $tarea->set('fechaEstimadaFinalizacion', $row['fechaEstimadaFinalizacion']);
            $tarea->set('fechaFinalizacion', $row['fechaFinalizacion']);
            $tarea->set('creadorTarea', $row['creadorTarea']);
            $tarea->set('observaciones', $row['observaciones']);
            $tarea->set('idEmpleado', $row['idEmpleado']);
            $tarea->set('idEstado', $row['idEstado']);
            $tarea->set('idPrioridad', $row['idPrioridad']);
            $tarea->set('created_at', $row['created_at']);
            $tarea->set('updated_at', $row['updated_at']);
            array_push($tareas, $tarea);
        }
        $db->close();
        return $tareas;
    }
    static function find($id)
    {
        $sql = TareasQueries::whereId($id);
        $db = new TareasDb();
        $result = $db->query($sql);
        $tarea = null;
        while ($row = $result->fetch_assoc()) {
            $tarea = new Tarea();
            $tarea->set('id', $row['id']);
            $tarea->set('título', $row['título']);
            $tarea->set('descripción', $row['descripción']);
            $tarea->set('fechaEstimadaFinalizacion', $row['fechaEstimadaFinalizacion']);
            $tarea->set('fechaFinalizacion', $row['fechaFinalizacion']);
            $tarea->set('creadorTarea', $row['creadorTarea']);
            $tarea->set('observaciones', $row['observaciones']);
            $tarea->set('idEmpleado', $row['idEmpleado']);
            $tarea->set('idEstado', $row['idEstado']);
            $tarea->set('idPrioridad', $row['idPrioridad']);
            $tarea->set('created_at', $row['created_at']);
            $tarea->set('updated_at', $row['updated_at']);
        }
        $db->close();
        return $tarea;
    }
    function save()
    {
        $sql = TareasQueries::insert($this);
        $db = new TareasDb();
        $result = $db->query($sql);
        $db->close();
        return $result;
    }
    function update()
    {
        $sql = TareasQueries::update($this);
        $db = new TareasDb();
        $result = $db->query($sql);
        $db->close();
        return $result;
    }
}

