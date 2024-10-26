<?php
namespace App\controllers;
class TareassController{
    function getAllTareas(){
        return Tareas::all();
    }
}