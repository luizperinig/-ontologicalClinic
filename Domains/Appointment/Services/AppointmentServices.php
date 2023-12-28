<?php
    require_once(__DIR__."../../Model/Appointment.php");
    require_once(__DIR__."../../../../Errors/NotFoundError.php");

    class AppointmentServices{
        function createAppointment(Patient $patient, Dentist $appointmentDentist, $appointmentDate, $appointmentTime, $expectedDuration){
            try{
                $appointment = new Appointment($patient, $appointmentDentist, $appointmentDate, $appointmentTime, $expectedDuration);
                $appointment->save();
            }catch(Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }

        function deleteAppointment($index){
            try{
                $appointment = $this->getAppointment($index);

                $appointment->delete();
            }catch (Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }
        
        function getAppointment($index){
            $Appointment = Appointment::getRecordsByField("index", $index);
            if(!$Appointment)
                throw new NotFoundError("Consulta não encontrada");

            return $Appointment[0];
        }

        function getAll(){
            $appointments = Appointment::getRecords();
            if(!$appointments)
                throw new NotFoundError("Nenhuma consulta encontrada");

            return $appointments;
        }
    }

    return new AppointmentServices();
?>