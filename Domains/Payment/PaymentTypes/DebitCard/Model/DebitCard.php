<?php
    require_once(__DIR__."../../../PaymentType.php");

    class DebitCard extends PaymentType{
        private $tax;

        public function __construct($tax){
            $this->tax = $tax;
        }

        public function getTax(){return $this->tax;}
    }
?>