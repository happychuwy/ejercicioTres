<?php

    function captcha ()
    {
        
        return $random = random_int(1, 12);
        //echo "<script>document.getElementsByName('captcha').value='".$random."';</<script>";
    }

?>