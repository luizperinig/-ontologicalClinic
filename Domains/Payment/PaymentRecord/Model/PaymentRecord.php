<?php
    require_once(__DIR__."../../../PaymentTypes/PaymentType.php");
    require_once(__DIR__."../../../../../Database/persist.php");

    class PaymentRecord extends persist{
        private $paidValue;
        private PaymentType $paymentType;
        private $paymentDate;

        protected static $local_filename = "PaymentRecord.txt";

        public function __construct($paidValue, PaymentType $paymentType, $paymentDate){
            $this->paidValue = $paidValue;
            $this->paymentType = $paymentType;
            $this->paymentDate = $paymentDate;
        }

        public function getPaidValue(){return $this->paidValue;}
        public function getPaymentType(){return $this->paymentType;}
        public function getPaymentDate(){return $this->paymentDate;}

        static public function getFilename(){
            return get_called_class()::$local_filename;
        }
    }
?>