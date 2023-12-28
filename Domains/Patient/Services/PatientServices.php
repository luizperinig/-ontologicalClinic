<?php
    require_once(__DIR__."../../Model/Patient.php");
    require_once(__DIR__."../../../../Errors/NotFoundError.php");
    require_once(__DIR__."../../../../Utils/Functions/checkRG.php");

    class PatientServices{
        function createPatient($fullName, $email, $phoneNumber, $RG, $birthDate, Client $client){
            try{
                checkRG($RG);

                $patient = new Patient($fullName, $email, $phoneNumber, $RG, $birthDate, $client);
                $patient->save();
            }catch(Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }

        function deletePatient($RG){
            try{
                $patient = $this->getPatient($RG);

                $patient->delete();
            }catch (Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }
        
        function getPatient($RG){
            $patient = Patient::getRecordsByField("RG", $RG);
            if(!$patient)
                throw new NotFoundError("Paciente não encontrado");

            return $patient[0];
        }

        function getAll(){
            $patients = Patient::getRecords();
            if(!$patients)
                throw new NotFoundError("Nenhum paciente encontrado");

            return $patients;
        }
    }

    return new PatientServices();
?>