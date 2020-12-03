<?php

    //retorna la url del proyecto
    function base_url(){
        return BASE_URL;
    }

    function dep($data){
        $format = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');

        return $format;
    }

    function headerNotas($data =""){
        $view_header = "views/notas/templates/header.php";
        require_once($view_header);
    }

    function footerNotas($data =""){
        $footer_view = "views/notas/templates/footer.php";
        require_once($footer_view);
    }


    function token(){
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;

        return $token;
    }

?>