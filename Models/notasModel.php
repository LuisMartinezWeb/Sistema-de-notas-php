<?php

    class notasModel extends Mysql{

        private $strid; //aqui deberia ser intId haciendo referencia a que es un valor entero, pero no hay problema con tenerlo con str id de la nota
        private $intIdUser; //id del usuario, dueño de la nota
        private $strtitle;
        private $strcontent;


        public function __construct(){
            parent::__construct();
        }


        public function getNotas(int $id){
            $this->strid = $id;
            

            $sql = "SELECT id,title,content,create_at FROM notes WHERE user_id = '$this->strid' AND recycle = 0";
            
            $request = $this->select_all($sql);
            return $request;
        }

        public function insertNote($title,$content,$idUser){
            $this->strtitle = $title;
            $this->strcontent = $content;
            $this->intIdUser = $idUser;
            
            $query_insert = "INSERT INTO notes(user_id,title,content) VALUES(?,?,?)";
            $arrData = array($this->intIdUser,$this->strtitle,$this->strcontent);
            $request = $this->insert($query_insert, $arrData);
            
            
            return $request;
        }


        public function getNotasTrash(int $id)
        {
            $this->strid = $id;
            

            $sql = "SELECT id,title,content,create_at FROM notes WHERE user_id = '$this->strid' AND recycle = 1";
            
            $request = $this->select_all($sql);
            return $request;
        }

        public function updateNote(int $id , int $idUser , string $title, string $content){
            $this->strid = $id;
            $this->intIdUser = $idUser;
            $this->strtitle = $title;
            $this->strcontent = $content;

            $sql = "UPDATE notes SET title = ?, content = ?  WHERE id = $this->strid AND user_id = $this->intIdUser";
            $arrData = array($this->strtitle,$this->strcontent);
            $request = $this->update($sql, $arrData);
            return $request;
        }

        public function updateRecycle(int $id, int $idUser){
            $this->strid = $id;
            $this->intIdUser = $idUser;
            $sql = "UPDATE notes SET recycle = '1' WHERE id = $this->strid AND user_id = $this->intIdUser";
            
            $request = $this->updateSinArgumentos($sql);
            return $request;
        }



        public function updateRestore(int $id, int $idUser){
            $this->strid = $id;
            $this->intIdUser = $idUser;
            $sql = "UPDATE notes SET recycle = '0' WHERE id = $this->strid AND user_id = $this->intIdUser";
            
            $request = $this->updateSinArgumentos($sql);
            return $request;
        }

        public function deleteNota(int $id, int $idUser)
        {
            $this->strid = $id;
            $this->intIdUser = $idUser;

            $sql = "DELETE FROM notes WHERE id = $this->strid AND user_id = $this->intIdUser";
            
            $request = $this->delete($sql);
            return $request;
        }

    }
?>