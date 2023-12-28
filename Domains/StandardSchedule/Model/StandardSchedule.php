<?php
    require_once(__DIR__."../../../../Database/persist.php");

    class StandardSchedule extends persist{
        private $availability = array();
        protected static $local_filename = "StandardSchedule.txt";

        public function __construct($availability){
            $this->availability = $availability;
        }

        public function addAvailability($availability){
            foreach ($availability as $day => $time) {
                $this->availability[$day] = $time;
            }
        }

        public function getAvailability(){return $this->availability;}

        static public function getFilename(){
            return get_called_class()::$local_filename;
        }
    }
?>