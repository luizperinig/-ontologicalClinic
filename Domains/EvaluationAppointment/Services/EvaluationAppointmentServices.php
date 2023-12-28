<?php
    require_once(__DIR__."../../../Appointment/Model/Appointment.php");

    class EvaluationAppointmentServices{
        function createEvaluationAppointment(Patient $patient, Dentist $appointmentDentist, $appointmentDate, $appointmentTime){
            try{
                $appointment = new Appointment($patient, $appointmentDentist, $appointmentDate, $appointmentTime, 30);
                $appointment->save();
            }catch(Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }

        function deleteEvaluationAppointment($index){
            try{
                $appointment = $this->getEvaluationAppointment($index);

                $appointment->delete();
            }catch (Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }
        
        function getEvaluationAppointment($index){
            $Appointment = Appointment::getRecordsByField("index", $index);
            if(!$Appointment)
                throw new NotFoundError("Consulta de avaliação não encontrada");

            return $Appointment[0];
        }

        function getAll(){
            $appointments = Appointment::getRecords();
            if(!$appointments)
                throw new NotFoundError("Nenhuma consulta de avaliação encontrada");

            return $appointments;
        }
    }

return new EvaluationAppointmentServices();