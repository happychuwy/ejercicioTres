<?php
    /*
    Dado un formulario con los siguientes campos: Nombre, Email, Telefono, Tema, Mensaje

    Se requiere a través del lenguaje PHP la correcta sanitización y validación de cada uno de los campos dónde todos 
    son obligatorios.

    - El/los scripts deberán ser escritos en PHP Nativo 7.4 o superior sin ayuda de CMS's y/o frameworks
    - Deberá sanitizar y validar campos.
    - Deberá crearse una simulación reCaptcha a través de una función que retorne un valor entero randmon donde, 
        si este es menor a 5 simule un captcha rechazado y arriba de 6 simule un captcha válido.
    - Dicho lo anterior, en cuanto la función retorne un valor igual o menor a 5, el script deberá insertar el evento 
        fallido en un archivo llamado logs.json
    - Dicho lo anterior, en cuanto la función retorne un valor igual o mayor a 10, el script deberá a través del servicio 
        Mailtrap, enviar un correo con la información de los campos.
    - El script deberá aterrizar en una pantalla de error o exito según haya sido el caso.

    El ejercicio se limita a únicamente código del lado de backend, es decir, no deberá usarse Javascript.
    El ejercicio no requiere CSS personalizado, puede usarse cualquier libreria/framework CSS para crear la interfaz gráfica
*/
    include("sanitizarFormulario.php");
    include("captcha.php");
?>

<html>
    <head>
        <title>
            Ejercicio 3 - Elihu Romero
        </title>
        <link rel="stylesheet" type="text/css" href="./css/index.css" />

    </head>

    <body>
        <h1>Ejercicio 3 - Validación de formulario</h1>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <fieldset id="fieldsetDatos" class="fieldsetDatos">
                <legend>
                    INGRESA TUS DATOS
                </legend>

                <div class="contenedorInput">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" value="<?php if(isset($nombre))echo $nombre; ?>">
                </div>

                <div class="contenedorInput">
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?php if(isset($email))echo $email; ?>">
                </div>

                <div class="contenedorInput">
                    <label for="">Teléfono</label>
                    <input type="text" name="telefono" value="<?php if(isset($telefono))echo $telefono; ?>">
                </div>

                <div class="contenedorInput">
                    <label for="">Tema</label>
                    <input type="text" name="tema" value="<?php if(isset($tema))echo $tema; ?>">
                </div>

                <div class="contenedorInput">
                    <label for="">Mensaje</label>
                    <textarea name="mensaje" id="" cols="30" rows="5" value=""><?php if(isset($mensaje))echo $mensaje; ?></textarea>
                </div>

                <div class="contenedorInput">
                    <label></label>
                    <input type="hidden" name="captcha" >
                    <input type="button" name="captchaButton" value="captcha" onclick="document.write('<?php captcha() ?>');">
                </div>

                <div class="contenedorInput">
                    <input type="submit" name="enviar" value="Enviar">
                </div>

                <?php
                    include("validarFormulario.php");
                ?>

            </fieldset>
        </form>
    </body>
</html>