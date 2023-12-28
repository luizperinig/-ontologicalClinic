<?php
    require_once(__DIR__."../../../Domains/User/Model/User.php");
    require_once(__DIR__."../../../Errors/InvalidParamsError.php");

    function checkEmail($email){
        $user = User::getRecordsByField("email", $email);

        if($user)
            throw new InvalidParamsError("Email já cadastrado no sistema");
    }
?>