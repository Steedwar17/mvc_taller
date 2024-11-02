<?php

namespace App\views;

use App\controllers\EstadoController;


class EstadosViews
{
    function getSelect()
    {
        $select = '<select name="estado">';
        $estadoController = new EstadoController();
        $estados = $estadoController->estado();
        foreach ($estados as $estado) {
            $id = $estado->get('id');
            $nombre = $estado->get('nombre');
            $select .= "<option value=\"$id\">$nombre</option>";
        }
        $select .= '</select>';
        return $select;
    }
}
