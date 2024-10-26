<?php
namespace App\controllers;
use App\models\entities\tarea;
class TareasController{
    function getAllTareas(){
        return Tarea::all();
    }
}