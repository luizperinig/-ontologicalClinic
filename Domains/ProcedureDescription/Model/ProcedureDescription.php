<?php
    require_once(__DIR__."../../../Procedure/Model/Procedure.php");
    require_once(__DIR__."../../../Budget/Model/Budget.php");
    require_once(__DIR__."../../../../Database/persist.php");

    class ProcedureDescription extends persist{
        private Budget $linkedBudget;
        private Procedure $linkedProcedure;
        protected $detailedDescription;

        protected static $local_filename = "ProcedureDescription.txt";

        public function __construct(Budget $linkedBudget, Procedure $linkedProcedure, $detailedDescription){
            $this->linkedBudget = $linkedBudget;
            $this->linkedProcedure = $linkedProcedure;
            $this->detailedDescription = $detailedDescription;
        }

        public function getBudget(){return $this->linkedBudget;}
        public function getProcedure(){return $this->linkedProcedure;}

        static public function getFilename(){
            return get_called_class()::$local_filename;
        }
    }
?>