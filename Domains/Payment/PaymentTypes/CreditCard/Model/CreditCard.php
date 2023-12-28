<?php
    require_once(__DIR__."../../../PaymentType.php");

    class CreditCard extends PaymentType{
        private $tax;
        private $parcels;

        public function __construct($tax, $parcels){
            $this->tax = $tax;
            $this->parcels = $parcels;
        }

        public function getTax(){return $this->tax;}
        public function getParcels(){return $this->parcels;}
    }
?>