<?php
    class Login extends  Controllers{
        
        public function __construct(){
            session_start();
            
            if(isset($_SESSION['login'])){
                header('location:' .base_url().'notas');
            }
            parent::__construct();
        }

        public function login(){
            $data['page_title'] = "Login";
            $this->views->getView($this,"login",$data);
        }

        public function userRegister(){

            if($_POST){
                if(empty($_POST['name-register'] || $_POST['surname-register'] || $_POST['email-register' || $_POST['password-register']])){
                    $arrResponse = array('status' => false, 'msg' => '*Todos los campos son obligatorios');
                }else{
                    $name = strtolower(filter_var($_POST['name-register'], FILTER_SANITIZE_STRING));
                    $surname = strtolower(filter_var($_POST['surname-register'], FILTER_SANITIZE_STRING));
                    $email = strtolower(filter_var($_POST['email-register'], FILTER_SANITIZE_EMAIL));
                    $password = filter_var($_POST['password-register'], FILTER_SANITIZE_STRING);
                    $opciones = array(
                        'cost' => 12
                    );
                    $password_hashed = password_hash($password, PASSWORD_BCRYPT,$opciones);
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $requestUser = $this->model->insertUser($name,$surname,$email, $password_hashed);

                        if($requestUser == "CorreoRegister"){
                            $arrResponse = array('status' => false, 'msg' => 'Correo ya registrado');
                        }else if($requestUser != 0){
                            $arrResponse = array('status' => true, 'msg' => 'Registro Exitoso');
                        }else{
                            $arrResponse = array('status' => false, 'msg' => 'Fallo al registrar usuario');
                        }
                    }else{

                        $arrResponse = array('status' => false, 'msg' => 'Correo no admitido');
                    }

                    
                
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function loginUser(){
        if($_POST){    
            if(empty($_POST['email-login']) || empty($_POST['password-login'])){
                $arrResponse = array('status' => false, 'msg' => '*Todos los campos son obligatorios');

            }else{
                    $email = strtolower(filter_var($_POST['email-login'], FILTER_SANITIZE_EMAIL));
                    $password = filter_var($_POST['password-login'], FILTER_SANITIZE_STRING);
                    // $opciones = array(
                    //     'cost' => 12
                    // );
                    // $password_hashed = password_hash($password, PASSWORD_BCRYPT,$opciones);

                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $requestUser = $this->model->loginUser($email);
                        

                        if(empty($requestUser)){
                            $arrResponse = array('status' => false, 'msg' => 'El usuario o contraseña incorrecta' ,'Error' => 'credencialesincorrectas');
                        }else if(password_verify($password, $requestUser['password'])){
                            $arrData = $requestUser;
                            $_SESSION['id'] = $arrData['id'];
                            $_SESSION['name'] = $arrData['name'];
                            $_SESSION['surname'] = $arrData['surname'];
                            $_SESSION['login'] =true;

                            $arrResponse = array('status' => true, 'msg' => 'ok');
                        }else{
                            $arrResponse = array('status' => false, 'msg' => 'El usuario o contraseña incorrecta' ,'Error' => 'credencialesincorrectas');
                        }
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Correo no admitido');
                    }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            
        }  
        die();
        }



    }



?> 