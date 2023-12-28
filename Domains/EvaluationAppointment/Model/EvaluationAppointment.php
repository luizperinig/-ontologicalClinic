<?php
    require_once(__DIR__."../../../../Database/persist.php");
    require_once(__DIR__."../../../Dentist/Model/Dentist.php");
    require_once(__DIR__."../../../Patient/Model/Patient.php");
    require_once(__DIR__."../../../Appointment/Model/Appointment.php");

    Class EvaluationAppointment extends Appointment{
        public function __construct(Patient $patient, Dentist $appointmentDentist, $appointmentDate, $appointmentTime, $expectedDuration){
            parent::__construct($patient, $appointmentDentist, $appointmentDate, $appointmentTime, $expectedDuration);
        }

    }