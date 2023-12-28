<?php
    require_once(__DIR__."../../../../Utils/Functions/ValidateCpf.php");
    require_once(__DIR__."../../../../Database/persist.php");

    class Client extends persist{
        private $fullName;
        private $email;
        private $phoneNumber;
        protected $RG;
        protected $CPF;

        protected static $local_filename = "Client.txt";

        public function __construct($fullName, $email, $phoneNumber, $RG, $CPF){
            $this->fullName = $fullName;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;
            $this->RG = $RG;

            validateCPF($CPF);
            $this->CPF = $CPF;
        }

        static public function getFilename(){
            return get_called_class()::$local_filename;
        }

        public function getFullName(){return $this->fullName;}
        public function getEmail(){return $this->email;}
        public function getPhoneNumber(){return $this->phoneNumber;}
        public function getRG(){return $this->RG;}
        public function getCPF(){return $this->CPF;}

        public function setFullName($fullName){$this->fullName = $fullName;}
        public function setEmail($email){$this->email = $email;}
        public function setPhoneNumber($phoneNumber){$this->phoneNumber = $phoneNumber;}
    }
?>