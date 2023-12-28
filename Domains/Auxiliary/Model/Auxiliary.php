<?php

require_once(__DIR__."../../../Employee/Model/Employee.php");

class Auxiliary extends Employee
{

    public function __construct($fullName, $email, $password, $phoneNumber, $salary, $fullAddress, $CPF, Profile $profile)
    {
        parent::__construct($fullName, $email, $password, $phoneNumber, $salary, $fullAddress, $CPF, $profile);
    }

}

?>