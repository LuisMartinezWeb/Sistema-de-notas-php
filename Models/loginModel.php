<?php

    class loginModel extends Mysql{

        private $strid;
        private $strname;
        private $strsurname;
        private $stremail;
        private $strpassword;
        public function __construct(){
            parent::__construct();
        }


        public function insertUser(string $name,string $surname, string $email, string $password){
            $query_email = "SELECT email FROM users WHERE email ='$email'";
            $request_email = $this->select($query_email);

            if($request_email != "" && $request_email['email'] == $email){
                $request = "CorreoRegister";
            }else{
            $query_insert = "INSERT INTO users(name,surname,email,password) VALUES(?,?,?,?)";
            $arrData = array($name,$surname,$email,$password);
            $request = $this->insert($query_insert, $arrData);
            }

            
            return $request;
        }

        public function loginUser(string $email){
            $this->stremail = $email;
            

            $sql = "SELECT id,name,surname,password FROM users WHERE email = '$this->stremail'";
            
        
            $request = $this->select($sql);
            return $request;
        }

    }
?>
