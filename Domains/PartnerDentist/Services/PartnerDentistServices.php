<?php
    require(__DIR__."../../Model/PartnerDentist.php");
    require_once(__DIR__."../../../../Utils/Functions/checkCpf.php");
    require_once(__DIR__."../../../../Utils/Functions/checkEmail.php");

    class PartnerDentistServices{
        function createPartnerDentist($fullName, $email, $password, $phoneNumber, $CPF, $fullAddress, $salary, Profile $profile, StandardSchedule $standardSchedule){
            try{
                checkEmail($email);
                checkCpf($CPF);

                $partnerDentist = new PartnerDentist($fullName, $email, $password, $phoneNumber, $CPF, $fullAddress, 0.00, $profile, $standardSchedule);
                $partnerDentist->save();
            }catch(Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }

        function deletePartnerDentist($CPF){
            try{
                $partnerDentist = $this->getPartnerDentist($CPF);

                $partnerDentist->delete();
            }catch (Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }
        
        function getPartnerDentist($CPF){
            $partnerDentist = PartnerDentist::getRecordsByField("CPF", $CPF);
            if(!$partnerDentist)
                throw new NotFoundError("Dentista não encontrado");

            return $partnerDentist[0];
        }

        function getAll(){
            $partnerDentists = PartnerDentist::getRecords();
            if(!$partnerDentists)
                throw new NotFoundError("Nenhum dentista encontrado");

            return $partnerDentists;
        }
    }
    
    return new PartnerDentistServices();
?>