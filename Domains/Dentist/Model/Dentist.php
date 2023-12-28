<?php 
    require_once(__DIR__."../../../Employee/Model/Employee.php");
    require_once(__DIR__."../../../Specialization/Model/Specialization.php");
    require_once(__DIR__."../../../StandardSchedule/Model/StandardSchedule.php");

    class Dentist extends Employee{
        private $specializations = array();
        private StandardSchedule $standardSchedule;
        private $schedule = array();

        public function __construct($fullName, $email, $password, $phoneNumber, $salary ,$fullAddress ,$CPF, Profile $profile, StandardSchedule $standardSchedule){
            parent::__construct($fullName, $email, $password, $phoneNumber, $salary ,$fullAddress ,$CPF, $profile);
            $this->standardSchedule = $standardSchedule; 
        }

        public function openStandardSchedule(){
            $standardScheduleArray = $this->standardSchedule->getAvailability();

        foreach ($standardScheduleArray as $day => $time) {
            $this->schedule[$day] = $time;
    }
        }

        public function openSchedule($newAvailability){
            $this->schedule[] = $newAvailability;
        }
        public function getSchedule(){return $this->schedule;}

        public function addSpecialization(Specialization $specialization){
            $this->specializations[] = $specialization;
        }
        public function getSpecializations(){return $this->specializations;}
    }
?>