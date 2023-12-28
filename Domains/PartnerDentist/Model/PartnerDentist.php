<?php
    require_once(__DIR__."../../../Dentist/Model/Dentist.php");

    class PartnerDentist extends Dentist {
        public function __construct($fullName, $email, $password, $phoneNumber, $CPF, $fullAddress, $salary, Profile $profile, StandardSchedule $standardSchedule){
            parent::__construct($fullName, $email, $password, $phoneNumber, $salary, $fullAddress, $CPF, $profile, $standardSchedule);          
        }
    }
?>