<?php

namespace App\views;

use App\controllers\PrioridadController;


class PrioridadesViews
{
    function getSelect()
    {
        $select = '<select name="prioridad">';
        $select .= '<option value="">Seleccione una opción</option>';
        $prioridadController = new PrioridadController();
        $prioridades = $prioridadController->Prioridad();
        foreach ($prioridades as $prioridad) {
            $id = $prioridad->get('id');
            $nombre = $prioridad->get('nombre');
            $select .= "<option value=\"$id\">$nombre</option>";
        }
        $select .= '</select>';
        return $select;
    }
}
