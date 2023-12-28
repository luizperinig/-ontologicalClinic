<?php
    require_once(__DIR__."../../../../Database/persist.php");

    class PaymentType extends persist{
        protected static $local_filename = "PaymentType.txt";

        public function __construct(){}

        static public function getFilename(){
            return get_called_class()::$local_filename;
        }
    }
?>