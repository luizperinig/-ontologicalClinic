<?php
    require_once(__DIR__."../../../../Errors/NotFoundError.php");
    require_once(__DIR__ ."../../Model/Specialization.php");

    class SpecializationServices{
        function createSpecialization($specializationDescription){
            try{
                $specialization = new Specialization($specializationDescription);
                $specialization->save();
            }catch(Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }

        function deleteSpecialization($index){
            try{
                $specialization = $this->getSpecialization($index);

                $specialization->delete();
            }catch(Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }
        
        function getSpecialization($index){
            $specialization = Specialization::getRecordsByField("index", $index);
            if(!$specialization)
                throw new NotFoundError("Especialização não encontrada");

            return $specialization[0];
        }

        function getAll(){
            $specializations = Specialization::getRecords();
            if(!$specializations)
                throw new NotFoundError("Nenhuma especialização encontrada");

            return $specializations;
        }
    }

    return new SpecializationServices();
?>
