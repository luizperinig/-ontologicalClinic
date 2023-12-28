<?php
    require_once(__DIR__."../../../Domains/Patient/Model/Patient.php");
    require_once(__DIR__."../../../Domains/Client/Model/Client.php");
    require_once(__DIR__."../../../Errors/InvalidParamsError.php");

    function checkRG($RG){
        $patient = Patient::getRecordsByField("RG", $RG);
        $client = Client::getRecordsByField("RG", $RG);

        if($patient || $client)
            throw new InvalidParamsError("RG já cadastrado no sistema");
    }
?>