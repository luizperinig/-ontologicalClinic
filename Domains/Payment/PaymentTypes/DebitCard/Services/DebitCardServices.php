<?php
    require_once(__DIR__."../..//Model/DebitCard.php");

    class DebitCardServices{
        function createDebitCard($tax){
            $creditCard = new DebitCard($tax);
            $creditCard->save();
        }
    }

    return new DebitCardServices();
?>