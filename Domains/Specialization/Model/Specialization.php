<?php
    require_once(__DIR__."../../../../Database/persist.php");

    class Specialization extends persist{
        private $specializationDescription;

        protected static $local_filename = "Specialization.txt";

        public function __construct($specializationDescription){
            $this->specializationDescription = $specializationDescription;
        }

        static public function getFilename(){
            return get_called_class()::$local_filename;
        }

        public function getDescription(){return $this->specializationDescription;}

        public function setDescription($specializationDescription){$this->specializationDescription = $specializationDescription;}
    }
?>