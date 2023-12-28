<?php
    require_once(__DIR__."../../../Dentist/Model/Dentist.php");
    require_once(__DIR__."../../../Specialization/Model/Specialization.php");

    class FixedDentist extends Dentist {
        private $CRO;

        public function __construct($fullName, $email, $password, $phoneNumber, $CPF, $fullAddress, $salary, $CRO, Profile $profile, StandardSchedule $standardSchedule){
            parent::__construct($fullName, $email, $password, $phoneNumber, $salary, $fullAddress, $CPF, $profile, $standardSchedule);
            $this->CRO = $CRO;
        }

        public function getCRO(){return $this->CRO;}

        public function setCRO($CRO){$this->CRO = $CRO;}
    }
?>