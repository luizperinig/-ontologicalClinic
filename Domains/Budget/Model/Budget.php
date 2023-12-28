<?php
    require_once(__DIR__."../../../../Errors/PermissionError.php");
    require_once(__DIR__."../../../../Database/persist.php");
    require_once(__DIR__."../../../Patient/Model/Patient.php");
    require_once(__DIR__."../../../Dentist/Model/Dentist.php");
    require_once(__DIR__."../../../Procedure/Model/Procedure.php");

    class Budget extends persist{
        private Patient $patient;
        private Dentist $responsibleDentist;
        private $procedures = array();

        private $budgetDate;
        private $totalValue;
        private $detailedDescription;
        
        //Tratamento
        private $paymentRecords = array();
        private ?PaymentType $paymentType = null; //valor é atualizado após o orçamento ser aprovado
        private $isApproved = false; //se for true o orçamento virou um tratamento

        protected static $local_filename = "Budget.txt";

        public function __construct(Patient $patient, Dentist $responsibleDentist, $procedures, $budgetDate){
            $this->patient = $patient;
            $this->responsibleDentist = $responsibleDentist;
            $this->procedures = array_merge($this->procedures, $procedures);

            $this->budgetDate = $budgetDate;

            foreach($procedures as $procedure){
                $this->totalValue += $procedure->getValue();
            }
        }

        public function approveBudget(PaymentType $paymentType){
            if($this->isApproved == true){
                throw new PermissionError("Orçamento já aprovado!");
            }

            $this->isApproved = true;
            $this->paymentType = $paymentType;

            echo("Orçamento aprovado com sucesso");
        }

        public function recordPayment($paymentRecords){
            $this->paymentRecords[] = array_merge($this->paymentRecords, $paymentRecords);
        }

        static public function getFilename(){
            return get_called_class()::$local_filename;
        }

        public function getPatient(){return $this->patient;}
        public function getResponsibleDentist(){return $this->responsibleDentist;}
        public function getProcedures(){return $this->procedures;}
        public function getBudgetDate(){return $this->budgetDate;}
        public function getTotalValue(){return $this->totalValue;}
        public function getPaymentType(){return $this->paymentType;}
        public function getApproved(){return $this->isApproved;}
        public function getDetailedDescription(){return $this->detailedDescription;}

        public function setPatient($patient){$this->patient = $patient;}
        public function setResponsibleDentist($responsibleDentist){$this->responsibleDentist = $responsibleDentist;}
        public function setProcedures($procedures){$this->procedures = $procedures;}
        public function setBudgetDate($budgetDate){$this->budgetDate = $budgetDate;}
        public function setTotalValue($totalValue){$this->totalValue = $totalValue;}
        public function setPaymentType($paymentType){
            if($this->isApproved == true)
                $this->paymentType = $paymentType;
            else
                throw new PermissionError("Orçamento não foi aprovado pelo paciente");
        }
        public function setDetailedDescription($detailedDescription){$this->detailedDescription = $detailedDescription;}
    }
?>