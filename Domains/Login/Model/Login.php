<?php
    require_once(__DIR__."../../../../Errors/PermissionError.php");
    require_once(__DIR__."../../../../Utils/Functions/VerifyCredentials.php");
    require_once(__DIR__."../../../User/Model/User.php");

    class Login{
        protected User $loggedUser;
        protected bool $isLogged = false;

        public function login($email, $password){
            if($this->isLogged() == true)
                throw new PermissionError("Você já está logado no sistema");
    
            $this->loggedUser = verifyCredentials($email, $password);
            echo("Login realizado com sucesso" .PHP_EOL);
            $this->isLogged = true;
        }

        public function logout(){
            if($this->isLogged() == true){
                echo("Logout realizado com sucesso".PHP_EOL);
                $this->isLogged = false;
            }else
                throw new PermissionError("Você precisa estar logado para fazer isso");            
        }

        public function isLogged(){
            return $this->isLogged;
        }

        public function getLogged(){
            if($this->isLogged() == true)
                return $this->loggedUser;
            else
                throw new PermissionError("Nenhum usuário logado no sistema");
        }
    };
?>