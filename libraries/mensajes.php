<?php
class mensajes
{

function m_correcto($texto)
{
    $mensaje="<div class='alert alert-success' role='alert'>
                <button type = 'button' class='close' data-dismiss='alert'>&times;</button>
                <strong>¡Bien hecho!</strong>".$texto."
                </div>";
    return $mensaje;
}

function m_error($texto)
{
    $mensaje="<div class='alert alert-danger' role='alert'>
              <button type = 'button' class='close' data-dismiss='alert'>&times;</button>
              <strong>Error!</strong>".$texto." 
              </div>";
   return $mensaje;
}

function m_info($texto)
{

}

}
?>