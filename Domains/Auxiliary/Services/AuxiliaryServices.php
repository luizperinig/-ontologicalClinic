<?php   
    require_once(__DIR__."../../Model/Auxiliary.php");
    require_once(__DIR__."../../../../Errors/NotFoundError.php");
    require_once(__DIR__."../../../../Utils/Functions/CheckCpf.php");
    require_once(__DIR__."../../../../Utils/Functions/CheckEmail.php");

    class AuxiliaryServices{
        function createAuxiliary($fullName, $email, $password, $phoneNumber, $salary, $fullAddress, $CPF, Profile $profile){
            try{
                checkEmail($email);
                checkCpf($CPF);

                $auxiliary = new Auxiliary($fullName, $email, $password, $phoneNumber, $salary, $fullAddress, $CPF, $profile);
                $auxiliary->save();
            }catch(Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }

        function deleteAuxiliary($CPF){
            try{
                $auxiliary = $this->getAuxiliary($CPF);

                $auxiliary->delete();
            }catch (Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }
        
        function getAuxiliary($CPF){
            $auxiliary = Auxiliary::getRecordsByField("CPF", $CPF);
            if(!$auxiliary)
                throw new NotFoundError("Auxiliar não encontrado");

            return $auxiliary[0];
        }

        function getAll(){
            $auxiliaries = Auxiliary::getRecords();
            if(!$auxiliaries)
                throw new NotFoundError("Nenhum auxiliar encontrado");

            return $auxiliaries;
        }
    }

    return new AuxiliaryServices();
?>