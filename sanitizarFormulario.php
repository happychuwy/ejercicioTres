<?php
    if(isset($_POST['enviar']))
    {   
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $signos=array("+","-");
        $telefono = filter_var(str_replace($signos,"",$_POST['telefono']), FILTER_SANITIZE_NUMBER_INT);
        $tema = filter_var($_POST['tema'], FILTER_SANITIZE_STRING);
        $mensaje = filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);
    }
?>