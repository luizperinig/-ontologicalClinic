<?php
    require_once(__DIR__ . '/../Model/FixedDentist.php');
    require_once(__DIR__."../../../../Utils/Functions/CheckCpf.php");
    require_once(__DIR__."../../../../Utils/Functions/CheckEmail.php");

    class FixedDentistServices{
        function createFixedDentist($fullName, $email, $password, $phoneNumber, $CPF, $fullAddress, $salary, $CRO, Profile $profile, StandardSchedule $standardSchedule){
            try{
                checkEmail($email);
                checkCpf($CPF);

                $fixedDentist = new FixedDentist($fullName, $email, $password, $phoneNumber, $CPF, $fullAddress, $salary, $CRO, $profile, $standardSchedule);
                $fixedDentist->save();
            }catch(Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }

        function deleteFixedDentist($CPF){
            try{
                $fixedDentist = $this->getFixedDentist($CPF);

                $fixedDentist->delete();
            }catch (Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }
        
        function getFixedDentist($CPF){
            $fixedDentist = FixedDentist::getRecordsByField("CPF", $CPF);
            if(!$fixedDentist)
                throw new NotFoundError("Dentista não encontrado");

            return $fixedDentist[0];
        }

        function getAll(){
            $fixedDentists = FixedDentist::getRecords();
            if(!$fixedDentists)
                throw new NotFoundError("Nenhum dentista encontrado");

            return $fixedDentists;
        }
    }

    return new FixedDentistServices();
?>