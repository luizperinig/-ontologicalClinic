<?php
    require_once(__DIR__."../../../../Utils/Functions/ValidateCpf.php");
    require_once(__DIR__."../../../User/Model/User.php");

    class Employee extends User{
        private $salary;
        private $fullAddress;
        protected $CPF;

        public function __construct($fullName, $email, $password, $phoneNumber, $salary ,$fullAddress ,$CPF, Profile $profile){
          parent::__construct($fullName, $email, $password, $phoneNumber, $profile); // Chama o construtor da classe Pai
          $this->salary = $salary;
          $this->fullAddress = $fullAddress;
          validateCPF($CPF);
          $this->CPF = $CPF;
        }
      
        public function getSalary(){return $this->salary;}
        public function getAddress(){return $this->fullAddress;}
        public function getCPF(){return $this->CPF;}

        public function setSalary($salary){$this->salary = $salary;}
        public function setAddress($fullAddress){$this->fullAddress = $fullAddress;}
        public function setCPF($CPF){$this->CPF = $CPF;}
      
    } 
?>
