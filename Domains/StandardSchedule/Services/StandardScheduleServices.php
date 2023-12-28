<?php
    require_once(__DIR__."../../Model/StandardSchedule.php");

    class StandardScheduleServices{
        function createStandardSchedule($availability){
            $standardSchedule = new StandardSchedule($availability);
            $standardSchedule->save();
        }

        function getStandardSchedule($index){
            $standardSchedule = StandardSchedule::getRecordsByField("index", $index);
            if(!$standardSchedule)
                throw new NotFoundError("Agenda padrão não encontrada");

            return $standardSchedule[0];
        }
    }

    return new StandardScheduleServices();
?>