<?php
    require_once(__DIR__."../../../../Database/persist.php");
    require_once(__DIR__."../../../Dentist/Model/Dentist.php");
    require_once(__DIR__."../../../Patient/Model/Patient.php");

    class Appointment extends persist{
        private Patient $patient;
        private Dentist $appointmentDentist;
        private $appointmentDate;
        private $appointmentTime;
        private $expectedDuration;

        protected static $local_filename = "Appointment.txt";

        public function __construct(Patient $patient, Dentist $appointmentDentist, $appointmentDate, $appointmentTime, $expectedDuration){
            $this->patient = $patient;
            $this->appointmentDentist = $appointmentDentist;
            $this->appointmentDate = $appointmentDate;
            $this->appointmentTime = $appointmentTime;
            $this->expectedDuration = $expectedDuration;

            //Checa se há agenda disponível
            if(!$this->isAppointmentValid()) {
                throw new InvalidParamsError("Horário indisponível");
            }else
                echo("Consulta cadastrada com sucesso".PHP_EOL);
        }

        static public function getFilename(){
            return get_called_class()::$local_filename;
        }

        public function getPatient(){return $this->patient;}
        public function getAppointmentDentist(){return $this->appointmentDentist;}
        public function getAppointmentDate(){return $this->appointmentDate;}
        public function getAppointmentTime(){return $this->appointmentTime;}
        public function getExpectedDuration(){return $this->expectedDuration;}
        
        public function setPatient(Patient $patient){$this->patient = $patient;}
        public function setAppointmentDentist(Dentist $appointmentDentist){$this->appointmentDentist = $appointmentDentist;}
        public function setAppointmentDate($appoitmentDate){$this->appointmentDate = $appoitmentDate;}
        public function setAppointmentTime($appoitmentTime){$this->appointmentTime = $appoitmentTime;}
        public function setExpectedDuration($expectedDuration){$this->expectedDuration = $expectedDuration;}
        
        function compareTimes($time1, $time2) {
            return strtotime($time1) - strtotime($time2);
        }

        private function isAppointmentValid() {
            $standardScheduleArray = $this->appointmentDentist->getSchedule();

            foreach($standardScheduleArray as $day => $time){
                if($day == $this->appointmentDate){
                    list($startTime, $endTime) = explode('-', $time);
                    
                    $minutesStart = date('i', strtotime($startTime)) + date('H', strtotime($startTime)) * 60;
                    $minutesEnd = date('i', strtotime($endTime)) + date('H', strtotime($endTime)) * 60;
                    $minutesAppointment = date('i', strtotime($this->appointmentTime)) + date('H', strtotime($this->appointmentTime)) * 60;

                    if($minutesAppointment >= $minutesStart && $minutesAppointment <= $minutesEnd){
                        return true;
                    }else
                        return false;
                }
            }
        }
    
    }
?>
