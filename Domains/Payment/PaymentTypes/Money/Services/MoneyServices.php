<?php
    require_once(__DIR__."../../Model/Money.php");

    class MoneyServices{
        function createMoney(){
            $money = new Money();
            $money->save();
        }
    }

    return new MoneyServices();
?>