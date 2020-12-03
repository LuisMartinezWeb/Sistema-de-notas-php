<?php
    class Views{
        function getView($controller, $view,$data=""){
            $controller = get_class($controller);

            if($controller == "Login"){
                $view = "views/".$view.".php";            
            }else{
                $view = "views/".$controller."/".$view.".php";   
            }

            require_once($view);
        }
    }
?>