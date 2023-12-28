<?php
    require_once(__DIR__."../../Model/PIX.php");

    class PIXServices{
        function createPix(){
            $pix = new PIX();
            $pix->save();
        }

        function getPix($index){
            $pix = PIX::getRecordsByField("index", $index);
            if(!$pix)
                throw new NotFoundError("Forma de pagamento não encontrada");

            return $pix[0];
        }
    }

    return new PIXServices();
?>