<?php

include("enviarCorreo.php");

$bandVal=0;

if(isset($_POST['enviar']))
{
    $datos="";
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
        $datos.=$nombre."<br>";
        $bandVal++;
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
        $datos.=$email."<br>";
        $bandVal++;
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
        $datos.=$telefono."<br>";
        $bandVal++;
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
        $datos.=$tema."<br>";
        $bandVal++;
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
        $datos.=$mensaje."<br>";
        $bandVal++;
    }

    if(!empty($captcha))
    {
        //echo "<div class='inputInvalido'>Escribe un nombre</div>";
        echo "<div>datos: ".$captcha."</div>";
        if((int)$captcha > 9)
        {
            $resultCorreo = enviarCorreo($datos);
            if(!$resultCorreo)
            {
                echo "<div>".$resultCorreo."</div>";
            }
        }
        if($captcha > 6 )
        {
            $bandVal++;
        }
    }

    //echo "<div>contador: ".$bandVal."</di>";

    if($captcha<6){
        
        $arregloDatos = array('nombre'=> $nombre, 'email'=> $email, 'telefono'=> $telefono, 'tema'=> $tema, 'mensaje'=> $mensaje);

        //Creamos el JSON
        $json_string = json_encode($arregloDatos);
        $file = 'logs.json';
        file_put_contents($file, $json_string);
    }

    if($bandVal==6 && $captcha>6)
    {
        header("Location: success.php");
        die();  
    }
    else
    {
        header("Location: fail.php");
        die();
    }

    

    //$resultCorreo = enviarCorreo($datos);
    //echo "<div>".$resultCorreo."</div>";
}

?>