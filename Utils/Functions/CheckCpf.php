<?php
    require_once(__DIR__."../../../Domains/User/Model/User.php");
    require_once(__DIR__."../../../Domains/Client/Model/Client.php");
    require_once(__DIR__."../../../Errors/InvalidParamsError.php");

    function checkCpf($CPF){
        $user = User::getRecordsByField("CPF", $CPF);
        $client = Client::getRecordsByField("CPF", $CPF);

        if($user || $client)
            throw new InvalidParamsError("Cpf já cadastrado no sistema");
    }
?>