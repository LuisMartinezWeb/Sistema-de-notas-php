<?php
    class Notas extends  Controllers{
        
        public function __construct(){
            parent::__construct();

            session_start();
            if(empty($_SESSION['login'])){
                header('location:' .base_url().'login');
            }
        }

        public function notas($params){
            $data['page_title'] = "misnotas";
        $this->views->getView($this,"misnotas",$data);
        }


        public function getNotas(){
                        
                $id = $_SESSION['id'];
                $requestNotas = $this->model->getNotas($id);
                if(empty($requestNotas)){
                    $arrResponse = array('status' => false, 'msg' => 'sinNotas' ,'Error' => 'sinNotas');
                }else{
                    $arrResponse = $requestNotas;
                    
                }

                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            
        }



        public function createNotes(){

        
            if($_POST){
                if(empty($_POST['title'] || $_POST['content'])){
                    $arrResponse = array('status' => false, 'msg' => 'campos vacios');
                }else{
                    $title = strtolower(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
                    $content = strtolower(filter_var($_POST['content'], FILTER_SANITIZE_STRING));

                    $idUser = $_SESSION['id'];
                
                        $requestUser = $this->model->insertNote($title,$content,$idUser);

                        if($requestUser != 0){
                            $arrResponse = array('status' => true, 'msg' => 'Registro Exitoso');
                        }else{
                            $arrResponse = array('status' => false, 'msg' => 'Falla al registrar Nota');
                        }
                    
                
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function updateNotes(){

 
            if($_POST){
                if(empty($_POST['title']) || empty($_POST['content']) || empty($_POST['id'])){
                    $arrResponse = array('status' => false, 'msg' => 'campos vacios');
                }else{
                    $title = strtolower(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
                    $content = strtolower(filter_var($_POST['content'], FILTER_SANITIZE_STRING));
                    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
                    $idUser = $_SESSION['id'];

                    if (filter_var($id, FILTER_VALIDATE_INT)) {
                        $requestNota = $this->model->updateNote($id,$idUser,$title,$content);
                        $arrResponse = array('status' => true, 'msg' => 'Nota editada');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Error al editar la nota');
                        
                    }
                    
                
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function trash(){
            $id = $_SESSION['id'];
            $requestNotas = $this->model->getNotasTrash($id);
            if(empty($requestNotas)){
                $arrResponse = array('status' => false, 'msg' => 'sinNotas' ,'Error' => 'sinNotas');
            }else{
                $arrResponse = $requestNotas;
                
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        
        public function trashNote()
        {
            if($_POST){
                if(empty($_POST['id'])){
                    $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la nota');
                }else{
                    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
                    if (filter_var($id, FILTER_VALIDATE_INT)) {
                        $idUser = $_SESSION['id'];
                        $requestNota = $this->model->updateRecycle($id,$idUser);
                        $arrResponse = array('status' => true, 'msg' => 'Nota enviada a la papelera');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la nota');
                        
                    }
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }


        public function restoreNote(){
            if($_POST){
                if(empty($_POST['id'])){
                    $arrResponse = array('status' => false, 'msg' => 'Error al restaurar la nota');
                }else{
                    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
                    if (filter_var($id, FILTER_VALIDATE_INT)) {
                        $idUser = $_SESSION['id'];
                        $requestNota = $this->model->updateRestore($id,$idUser);
                        $arrResponse = array('status' => true, 'msg' => 'Nota enviada a la papelera');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la nota');
                        
                    }
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function deleteDbNote()
        {
        
            if($_POST){
                if(empty($_POST['id'])){
                    $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la nota');
                }else{
                    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
                    if (filter_var($id, FILTER_VALIDATE_INT)) {
                        $idUser = $_SESSION['id'];
                        $requestNota = $this->model->deleteNota($id,$idUser);
                        $arrResponse = array('status' => true, 'msg' => 'Nota Eliminada de la DB');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la nota');
                        
                    }
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    }