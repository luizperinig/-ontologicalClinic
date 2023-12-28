<?php
    require_once("../Project-POO-UFMG/Domains/PartnerSpecialization/Model/PartnerSpecialization.php");

    class PartnerSpecializationServices{
        function createPartnerSpecialization(PartnerDentist $linkedDentist, Specialization $linkedSpecialization, $comission){
            $partnerSpecialization = new PartnerSpecialization($linkedDentist, $linkedSpecialization, $comission);
            $partnerSpecialization->save();
        }

        function get(PartnerDentist $partnerDentist){
            $partnerSpecialization = PartnerSpecialization::getRecordsByField("linkedDentist", $partnerDentist);
            if(!$partnerSpecialization)
                throw new NotFoundError("Especialização do dentista parceiro não encontrada");

            return $partnerSpecialization[0];
        }
    }

    return new PartnerSpecializationServices();
?>