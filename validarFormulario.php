<?php

if(isset($_POST['enviar']))
{
    if(empty($nombre))
    {
        echo "<div class='inputInvalido'>Escribe un nombre</div>";
    }
    elseif(strlen($nombre) > 20)
    {
        echo "<div class='inputInvalido'>Nombre demasiado largo, máximo 20 caracteres</div>";
    }
    else{
        echo "<div>".$nombre."</div>";
    }

    if(empty($email))
    {
        echo "<div class='inputInvalido'>Escribe un Email</div>";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "<div class='inputInvalido'>Escribe un Email</div>";
    }

    if(empty($telefono))
    {
        echo "<div class='inputInvalido'>Escribe un Telefono</div>";
    }
    elseif(!is_numeric($telefono))
    {
        echo "<div class='inputInvalido'>Inserta sólo números para el teléfono</div>";
    }

    if(empty($tema))
    {
        echo "<div class='inputInvalido'>Escribe un Tema</div>";
    }

    if(empty($mensaje))
    {
        echo "<div class='inputInvalido'>Escribe un mensaje</div>";
    }
}

?>