<?php
    require_once(__DIR__."../../Model/CreditCard.php");

    class CreditCardServices{
        function createCreditCard($tax, $parcels){
            $creditCard = new CreditCard($tax, $parcels);
            $creditCard->save();
        }
    }

    return new CreditCardServices();
?>