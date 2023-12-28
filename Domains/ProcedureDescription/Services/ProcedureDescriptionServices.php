<?php
    require_once(__DIR__."../../Model/ProcedureDescription.php");

    class ProcedureDescriptionServices{
        function createProcedureDescription(Budget $linkedBudget, Procedure $linkedProcedure, $detailedDescription){
            $procedureDescription = new ProcedureDescription($linkedBudget, $linkedProcedure, $detailedDescription);
            $procedureDescription->save();
        }
    }

    return new ProcedureDescriptionServices();
?>