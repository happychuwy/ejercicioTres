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
        echo "<div class='inputInvalido'>Escribe una dirección de email válida</div>";
    }
    else
    {
        echo "<div>".$email."</div>";
    }

    if(empty($telefono))
    {
        echo "<div class='inputInvalido'>Escribe un Telefono</div>";
    }
    elseif(strlen($telefono) != 10)
    {
        echo "<div class='inputInvalido'>El número debe de tener 10 dígitos</div>";
    }
    else
    {
        echo "<div>".$telefono."</div>";
    }

    if(empty($tema))
    {
        echo "<div class='inputInvalido'>Escribe un Tema</div>";
    }
    elseif(strlen($tema) > 40)
    {
        echo "<div class='inputInvalido'>El tema no debe tener más de 40 caracteres</div>";
    }
    else
    {
        echo "<div>".$tema."</div>";
    }

    if(empty($mensaje))
    {
        echo "<div class='inputInvalido'>Escribe un mensaje</div>";
    }
    elseif(strlen($mensaje) > 255)
    {
        echo "<div class='inputInvalido'>El mensaje no debe tener más de 255 caracteres</div>";
    }
    else
    {
        echo "<div>".$mensaje."</div>";
    }
}

?>