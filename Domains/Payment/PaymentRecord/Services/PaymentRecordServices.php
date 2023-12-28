<?php
    require_once(__DIR__."../../Model/PaymentRecord.php");

    class PaymentRecordServices{
        function createPaymentRecord($paidValue, PaymentType $paymentType, $paymentDate){
            $paymentRecord = new PaymentRecord($paidValue, $paymentType, $paymentDate);
            $paymentRecord->save();
        }

        function getPaymentRecord($index){
            $paymentRecord = PaymentRecord::getRecordsByField("index", $index);
            if(!$paymentRecord)
                throw new NotFoundError("Registro de pagamento não encontrado");

            return $paymentRecord[0];
        }
    }

    return new PaymentRecordServices();
?>