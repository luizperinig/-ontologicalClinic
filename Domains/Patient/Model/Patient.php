<?php
    require_once(__DIR__."../../../Client/Model/Client.php");
    require_once(__DIR__."../../../../Database/persist.php");

    class Patient extends persist{
        private $fullName;
        private $email;
        private $phoneNumber;
        protected $RG;
        private $birthDate;

        private Client $client;
        protected static $local_filename = "Patient.txt";

        public function __construct($fullName, $email, $phoneNumber, $RG, $birthDate, Client $client){
            $this->fullName = $fullName;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;
            $this->RG = $RG;
            $this->birthDate = $birthDate;
            $this->client = $client;
        }

        static public function getFilename(){
            return get_called_class()::$local_filename;
        }

        public function getFullName(){return $this->fullName;}
        public function getEmail(){return $this->email;}
        public function getPhoneNumber(){return $this->phoneNumber;}
        public function getRG(){return $this->RG;}
        public function getBirthDate(){return $this->birthDate;}
        public function getClient(){return $this->client;}

        public function setFullName($fullName){$this->fullName = $fullName;}
        public function setEmail($email){$this->email = $email;}
        public function setPhoneNumber($phoneNumber){$this->phoneNumber = $phoneNumber;}
        public function setRG($RG){$this->RG = $RG;}
        public function setBirthDate($birthDate){$this->birthDate = $birthDate;}
        public function setClient(Client $client){$this->client = $client;}
    }
?>