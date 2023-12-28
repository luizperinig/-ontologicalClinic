<?php
    //Incluindo os Services das classes
    $AppointmentServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Appointment/Services/AppointmentServices.php");
    $AuxiliaryServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Auxiliary/Services/AuxiliaryServices.php");
    $BudgetServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Budget/Services/BudgetServices.php");
    $ClientServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Client/Services/ClientServices.php");
    $EvaluationAppointmentServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/EvaluationAppointment/Services/EvaluationAppointmentServices.php");
    $FixedDentistServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/FixedDentist/Services/FixedDentistServices.php");
    $PartnerDentistServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/PartnerDentist/Services/PartnerDentistServices.php");
    $PartnerSpecializationServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/PartnerSpecialization/Services/PartnerSpecializationServices.php");
    $PatientServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Patient/Services/PatientServices.php");
    $PaymentRecordsServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Payment/PaymentRecord/Services/PaymentRecordServices.php");
    $CreditCardServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Payment/PaymentTypes/CreditCard/Services/CreditCardServices.php");
    $DebitCardServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Payment/PaymentTypes/DebitCard/Services/DebitCardServices.php");
    $MoneyServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Payment/PaymentTypes/Money/Services/MoneyServices.php");
    $PIXServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Payment/PaymentTypes/PIX/Services/PIXServices.php");
    $ProcedureServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Procedure/Services/ProcedureServices.php");
    $ProcedureDescriptionServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/ProcedureDescription/Services/ProcedureDescriptionServices.php");
    $ProfileServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Profile/Services/ProfileServices.php");
    $SecretaryServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Secretary/Services/SecretaryServices.php");
    $SpecializationServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Specialization/Services/SpecializationServices.php");
    $StandardScheduleServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/StandardSchedule/Services/StandardScheduleServices.php");

    require_once(__DIR__."../../Project-POO-UFMG/Domains/Login/Model/Login.php");
    $login = new Login();

    //Funções
        require_once(__DIR__."../../Project-POO-UFMG/Utils/Functions/CheckPermission.php");

    //Roda o teste por input do teclado
        echo PHP_EOL."Digite o nome do teste, ou 'todos' para rodar todos, ou 'parar' para encerrar, ou 'login' para logar como Adm': ".PHP_EOL;
        $nomeDoTeste = trim(fgets(STDIN));
    
        executarTeste($nomeDoTeste);

        while (true) {
            echo PHP_EOL."Digite o próximo comando: ";
            $nomeDoTeste = trim(fgets(STDIN));
    
            executarTeste($nomeDoTeste);
        }

        function executarTeste($nomeDoTeste){
            switch($nomeDoTeste){
                case 'login':
                    logIn();
                    break;
                case 'logout':
                    logOut();
                    break;
                case 'teste1':
                    teste1();
                    break;
                case 'teste2':
                    teste2();
                    break;
                case 'teste3':
                    teste3();
                    break;
                case 'teste4':
                    teste4();
                    break;
                case 'teste5':
                    teste5();
                    break;
                case 'teste6':
                    teste6();
                    break;
                case 'teste7':
                    teste7();
                    break;
                case 'teste8':
                    teste8();
                    break;
                case 'teste9':
                    teste9();
                    break;
                case 'teste10':
                    teste10();
                    break;
                case 'teste11':
                    teste11();
                    break;
                case 'teste12':
                    teste12();
                    break;
                case 'teste13':
                    teste13();
                    break;
                case 'teste14':
                    teste14();
                    break;
                case 'todos':
                    teste1();
                    teste2();
                    teste3();
                    teste4();
                    teste5();
                    teste6();
                    teste7();
                    teste8();
                    teste9();
                    teste10();
                    teste11();
                    teste12();
                    teste13();
                    teste14();
                    break;
                case 'parar':
                    echo "Programa encerrado.\n";
                    exit;
                default:
                    echo "Teste não encontrado.\n";
            }
        }
    
    //Testes  
    //Tenta cadastrar um procedimento sem estar logado
    function teste1(){
        try{
            echo(PHP_EOL.PHP_EOL.PHP_EOL."Iniciando Teste 1...".PHP_EOL);

            global $login;
            $login->getLogged();

            global $ProcedureServices;
            $ProcedureServices->createProcedure("Limpeza", "", 200);
        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);

        }
    }

    //Tenta cadastrar um procedimento com um usuário que não tem permissão
    function teste2(){
        try{
            echo(PHP_EOL.PHP_EOL.PHP_EOL."Iniciando Teste 2...".PHP_EOL);

    
            $profileType = "Perfil1";
            global $ProfileServices;
            $ProfileServices->createProfile($profileType);

            $profile = $ProfileServices->getProfile(1);
            $profile->addPermissions('registerSpecialization');
            $profile->addPermissions('registerPaymentType');
            $profile->addPermissions('registerDentist');
            $profile->addPermissions('registerPatient');
            $profile->addPermissions('registerClient');
            $profile->addPermissions('registerAppointment');
            $profile->addPermissions('registerBudget');
            $profile->addPermissions('approveBudget');
            $profile->addPermissions('calculateMonthlyFinances');
            $profile->addPermissions('registerStandardSchedule');
            $profile->addPermissions('payTreatment');
            $profile->save();

            global $AuxiliaryServices;
            $AuxiliaryServices->createAuxiliary("Teste1", "email1@gmail.com", "senha1", "(11) 9111-1111", 150, "endereço1", "065.672.430-74", $profile);
            

            global $login;
            $login->login("email1@gmail.com", "senha1");
            $user = $login->getLogged();

            print_r($user);
            echo PHP_EOL;

            checkPermission($user, "registerProcedure");

            global $ProcedureServices;
            $ProcedureServices->createProcedure();
        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);
        }
        
        $login->logout();
    }

    //Loga com um usuário que tem todas as permissões para cadastrar procedimentos
    function teste3(){
        try{
            echo(PHP_EOL.PHP_EOL.PHP_EOL."Iniciando Teste 3...".PHP_EOL);

            
            $profileType = "Administrador";
            global $ProfileServices;
            $ProfileServices->createProfile($profileType);

            $profile = $ProfileServices->getProfile(2);
            $profile->addPermissions('registerProcedure');
            $profile->addPermissions('registerSpecialization');
            $profile->addPermissions('registerPaymentType');
            $profile->addPermissions('registerDentist');
            $profile->addPermissions('registerPatient');
            $profile->addPermissions('registerClient');
            $profile->addPermissions('registerAppointment');
            $profile->addPermissions('registerBudget');
            $profile->addPermissions('approveBudget');
            $profile->addPermissions('calculateMonthlyFinances');
            $profile->addPermissions('registerStandardSchedule');
            $profile->addPermissions('payTreatment');
            $profile->save();
            
            global $AuxiliaryServices;
            $AuxiliaryServices->createAuxiliary("Adm", "emailADM@gmail.com", "senhaADM", "(ADM) TEL-ADM", 150, "endereçoADM", "913.498.150-04", $profile);
            
            
            global $login;
            $login->login("emailADM@gmail.com", "senhaADM");
            $user = $login->getLogged();

            print_r($user);
            echo PHP_EOL;
        
            checkPermission($user, "registerSpecialization");
            global $SpecializationServices;
            $SpecializationServices->createSpecialization("Clínica Geral");
            $specialization1 = $SpecializationServices->getSpecialization(1);
            $SpecializationServices->createSpecialization("Endodontia");
            $specialization2 = $SpecializationServices->getSpecialization(2);
            $SpecializationServices->createSpecialization("Cirurgia");
            $specialization3 = $SpecializationServices->getSpecialization(3);
            $SpecializationServices->createSpecialization("Estética");
            $specialization4 = $SpecializationServices->getSpecialization(4);

            checkPermission($user, "registerProcedure");
            global $ProcedureServices;
            $ProcedureServices->createProcedure("Limpeza", "", 200.00, $specialization1);
            $ProcedureServices->createProcedure("Restauração", "", 185.00, $specialization1);
            $ProcedureServices->createProcedure("Extração Comun", "Não inclui dente siso.", 280.00, $specialization1);
            $ProcedureServices->createProcedure("Canal", "", 800.00, $specialization2);
            $ProcedureServices->createProcedure("Extração de Siso", "Valor por dente.", 400.00, $specialization3);
            $ProcedureServices->createProcedure("Clareamento a Laser", "", 1700.00, $specialization4);
            $ProcedureServices->createProcedure("Clareamento de Moldeira", "Clareamento Caseiro", 900.00, $specialization4);

            echo("Procedimentos registrados com sucesso".PHP_EOL);
        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);
        }
    }    

    //Cria formas de pagamento permitidas pela clínica
    function teste4(){
        try{
            echo(PHP_EOL.PHP_EOL.PHP_EOL."Iniciando Teste 4...".PHP_EOL);

            global $login;
            $user = $login->getLogged();

            global $MoneyServices;
            global $PIXServices;
            global $DebitCardServices;
            global $CreditCardServices;

            checkPermission($user, "registerPaymentType");
            $MoneyServices->createMoney();
            $PIXServices->createPIX();
            $DebitCardServices->createDebitCard(0.03);
            $CreditCardServices->createCreditCard(0.04, "1 a 3x");
            $CreditCardServices->createCreditCard(0.07, "4 a 6x");

            echo("Formas de pagamento registradas com sucesso".PHP_EOL);
        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);
        }
    }

    //Cadastra um dentista fixo e um dentista parceiro
    function teste5(){
        try{
            echo(PHP_EOL.PHP_EOL.PHP_EOL."Iniciando Teste 5...".PHP_EOL);

            global $SpecializationServices;
            $specialization1 = $SpecializationServices->getSpecialization(1); //Clínica Geral
            $specialization2 = $SpecializationServices->getSpecialization(2); //Edotontia
            $specialization3 = $SpecializationServices->getSpecialization(3); //Cirurgia
            $specialization4 = $SpecializationServices->getSpecialization(4); //Estética
        
            global $login;
            $user = $login->getLogged();

            checkPermission($user, "registerDentist");
            checkPermission($user, "registerStandardSchedule");

            $profileType = "DentistaFixo";
            global $ProfileServices;
            $ProfileServices->createProfile($profileType);
            $profileFixed = $ProfileServices->getProfile(3);

            $standardScheduleArray1 = array(
                "Segunda" => "8:00-17:00",
                "Terça" => "8:00-17:00",
                "Quarta" => "8:00-17:00",
                "Quinta" => "8:00-17:00",
                "Sexta" => "8:00-17:00"
            );
            global $StandardScheduleServices;
            $StandardScheduleServices->createStandardSchedule($standardScheduleArray1);
            $standardSchedule1 = $StandardScheduleServices->getStandardSchedule(1);

            global $FixedDentistServices;
            $FixedDentistServices->createFixedDentist("DentistaFixo", "dentistafixo@gmail.com", "senhaFixo", "telefoneFixo", "146.258.600-75", "endereçoFixo", 5000.00, "CRO", $profileFixed , $standardSchedule1);
            $fixedDentist = $FixedDentistServices->getFixedDentist("146.258.600-75");
            $fixedDentist->addSpecialization($specialization1);
            $fixedDentist->addSpecialization($specialization2);
            $fixedDentist->addSpecialization($specialization3);
            $fixedDentist->save();

            print_r($fixedDentist);
            echo PHP_EOL;

            $profileType = "DentistaParceiro";
            $ProfileServices->createProfile($profileType);
            $profilePartner = $ProfileServices->getProfile(4);

            $standardScheduleArray2 = array(
                "Segunda" => "8:00-12:00",
                "Terça" => "14:00-17:30",
                "Quarta" => "14:00-17:30",
                "Quinta" => "14:00-17:30",
                "Sexta" => "8:00-12:00"
            );
            $StandardScheduleServices->createStandardSchedule($standardScheduleArray2);
            $standardSchedule2 = $StandardScheduleServices->getStandardSchedule(2);

            global $PartnerDentistServices;
            $PartnerDentistServices->createPartnerDentist("DentistaParceiro", "dentistaparceiro@gmail.com", "senhaParceiro", "telefoneParceiro", "059.421.410-61", "endereçoParceiro", 0.00, $profilePartner , $standardSchedule2);
            $partnerDentist = $PartnerDentistServices->getPartnerDentist("059.421.410-61");
            
            global $PartnerSpecializationServices;
            $PartnerSpecializationServices->createPartnerSpecialization($partnerDentist, $specialization1, 0.4);
            $PartnerSpecializationServices->createPartnerSpecialization($partnerDentist, $specialization4, 0.4);

            print_r($partnerDentist);
        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);
        }
    }

    //Abre a agenda dos dentistas para o mês
    function teste6(){
        try{
            echo(PHP_EOL.PHP_EOL.PHP_EOL."Iniciando Teste 6...".PHP_EOL);
        
            global $login;
            $user = $login->getLogged();
        
            checkPermission($user, 'registerStandardSchedule');
        
            global $FixedDentistServices;
            $fixedDentist = $FixedDentistServices->getFixedDentist("146.258.600-75");
            $fixedDentist->openStandardSchedule();
            $fixedDentist->save();

            print_r($fixedDentist->getSchedule());
            echo PHP_EOL;
        
            global $PartnerDentistServices;
            $partnerDentist = $PartnerDentistServices->getPartnerDentist("059.421.410-61");
            $partnerDentist->openStandardSchedule();
            $partnerDentist->save();

            print_r($partnerDentist->getSchedule());
        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);
        }
    }

    //Cadastra um paciente e um cliente responsável financeiro
    function teste7(){
        try{
            echo(PHP_EOL.PHP_EOL.PHP_EOL."Iniciando Teste 7...".PHP_EOL);
        
            global $login;
            $user = $login->getLogged();
        
            checkPermission($user, "registerPatient");
            checkPermission($user, "registerClient");
        
            global $ClientServices;
            $ClientServices->createClient("Cliente", "cliente@gmail.com", "telCliente", "47.005.194-2", "078.687.400-78");
            $client = $ClientServices->getClient("078.687.400-78");
        
            global $PatientServices;
            $PatientServices->createPatient("Paciente", "pacienteemail@gmail.com", "telPaciente", "36.479.007-6", "20-10-2002", $client);
            $patient = $PatientServices->getPatient("36.479.007-6");
            print_r($patient);
        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);
        }
    }

    //Agenda uma consulta de avaliação com o dentista parceiro para o dia 6/11 às 14h caso possível. Caso contrário a consulta é marcada com o dentista fixo
    function teste8(){
        try{
            echo(PHP_EOL.PHP_EOL.PHP_EOL."Iniciando Teste 8...".PHP_EOL);

            global $login;
            $user = $login->getLogged();

            checkPermission($user, "registerAppointment");

            global $PatientServices;
            $patient = $PatientServices->getPatient("36.479.007-6");

            global $PartnerDentistServices;
            $partnerDentist = $PartnerDentistServices->getPartnerDentist("059.421.410-61");

            global $EvaluationAppointmentServices;
            $EvaluationAppointmentServices->createEvaluationAppointment($patient, $partnerDentist, "Segunda", "14:00"); //Tendo como base que o dia 6/11 foi uma segunda-feira
            echo PHP_EOL;

            global $FixedDentistServices;
            $fixedDentist = $FixedDentistServices->getFixedDentist("146.258.600-75");
            $EvaluationAppointmentServices->createEvaluationAppointment($patient, $fixedDentist, "Segunda", "14:00");

        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);
        }
    }

    //Cadastra um orçamento para o paciente
    function teste9(){
        try{
            echo(PHP_EOL.PHP_EOL.PHP_EOL."Iniciando Teste 9...".PHP_EOL);

            global $login;
            $user = $login->getLogged();

            checkPermission($user, "registerBudget");

            global $PatientServices;
            $patient = $PatientServices->getPatient("36.479.007-6");

            global $FixedDentistServices;
            $fixedDentist = $FixedDentistServices->getFixedDentist("146.258.600-75");

            global $ProcedureServices;
            $procedure1 = $ProcedureServices->getProcedure(1); //Limpeza
            $procedure2 = $ProcedureServices->getProcedure(2); //Restauração
            $procedure4 = $ProcedureServices->getProcedure(6); //Clareamento a Laser

            $procedure2->insert();                             //Duplica o procedimento de restauração
            $procedure3 = $ProcedureServices->getProcedure(8); 
            $procedures = array($procedure1, $procedure2, $procedure3, $procedure4);

            global $BudgetServices;
            $BudgetServices->createBudget($patient, $fixedDentist, $procedures, "20-10-2023");
            $budget = $BudgetServices->getBudget(1);
            print_r($budget);

        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);
        }
    }

    //Aprova o orçamento para virar um tratamento
    function teste10(){
        try{
            echo(PHP_EOL.PHP_EOL.PHP_EOL."Iniciando Teste 10...".PHP_EOL);

            global $login;
            $user = $login->getLogged();

            checkPermission($user, "approveBudget");

            global $PIXServices;
            $pix = $PIXServices->getPix(2);

            global $BudgetServices;
            $budget = $BudgetServices->getBudget(1);
            $budget->approveBudget($pix);
            $budget->save();

        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);
        }
    }

    //Agenda uma consulta para cada procedimento do orçamento
    function teste11(){
        try{
            echo(PHP_EOL.PHP_EOL.PHP_EOL."Iniciando Teste 11...".PHP_EOL);

            global $login;
            $user = $login->getLogged();

            checkPermission($user, "registerAppointment");

            global $BudgetServices;
            $budget = $BudgetServices->getBudget(1);
            $procedures = $budget->getProcedures();

            global $FixedDentistServices;
            $fixedDentist = $FixedDentistServices->getFixedDentist("146.258.600-75");

            $patient = $budget->getPatient();
            global $AppointmentServices;

            
            $AppointmentServices->createAppointment($patient, $fixedDentist, "Terça", "14:00", "0:30");
            $appointment1 = $AppointmentServices->getAppointment(2);
            $AppointmentServices->createAppointment($patient, $fixedDentist, "Terça", "9:00", "1:30");
            $appointment2 = $AppointmentServices->getAppointment(3);
            $AppointmentServices->createAppointment($patient, $fixedDentist, "Quarta", "10:00", "1:00");
            $appointment3 = $AppointmentServices->getAppointment(4);
            $AppointmentServices->createAppointment($patient, $fixedDentist, "Sexta", "15:00", "2:00");
            $appointment4 = $AppointmentServices->getAppointment(5);
            

            $procedures[0]->addAppointment($appointment1); //Procedimento de Limpeza
            $procedures[1]->addAppointment($appointment2); //Procedimento de Restauração
            $procedures[2]->addAppointment($appointment3); //Procedimento de Restauração
            $procedures[3]->addAppointment($appointment4); //Procedimento de Clareamento a Laser
            
        
            foreach($procedures as $procedure)
                $procedure->save();
            $budget->save();

            print_r($procedures);
        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);
        }
    }

    //Realiza o pagamento do tratamento
    function teste12(){
        try{
            echo(PHP_EOL.PHP_EOL.PHP_EOL."Iniciando Teste 12...".PHP_EOL);

            global $login;
            $user = $login->getLogged();

            checkPermission($user, "payTreatment");

            global $BudgetServices;
            $budget = $BudgetServices->getBudget(1);
            $totalValue = $budget->getTotalValue();

            global $PIXServices;
            $pix = $PIXServices->getPix(2);

            global $PaymentRecordsServices;
            $PaymentRecordsServices->createPaymentRecord($totalValue/2, $pix, "23-11-2023");
            $paymentPix = $PaymentRecordsServices->getPaymentRecord(1);

            $creditCard = $PIXServices->getPix(4); //Como pix e cartão de crédito são PaymentType, o persist não vê diferença entre eles na hora de procurar pelo index

            $PaymentRecordsServices->createPaymentRecord($totalValue/2, $creditCard, "27-11-2023");
            $paymentCard = $PaymentRecordsServices->getPaymentRecord(2);
            
            $payment = array($paymentPix, $paymentCard);
            $budget->recordPayment($payment);

            print_r($budget);
            
        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);
        }
    }

    //Simula a passagem de tempo e a conclusão dos procedimentos
    function teste13(){
        try{
            echo(PHP_EOL.PHP_EOL.PHP_EOL."Iniciando Teste 13...".PHP_EOL);

            //Simula a passagem de tempo (realização das consultas) e a completação dos procedimentos
            //Também define se um procedimento foi realizado com um dentista parceiro, para o cálculo das comissões
            $procedures = Procedure::getRecords();
            foreach($procedures as $procedure){
                $procedure->completeProcedure();
                
                $appointments = $procedure->getAppointments();
                foreach($appointments as $appointment){
                    if(get_class($appointment->getAppointmentDentist()) == "PartnerDentist"){
                        $procedure->setPartnered();
                    }
                }

                $procedure->save();
            }
        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);
        }
    }

    //Calcula a receita mensal da clínica
    function teste14(){
        try{
            echo(PHP_EOL.PHP_EOL.PHP_EOL."Iniciando Teste 14...".PHP_EOL);

            global $login;
            $user = $login->getLogged();

            checkPermission($user, "calculateMonthlyFinances");

            //Calcula os valores pagos pelos clientes
            $paymentRecords = PaymentRecord::getRecords();
            $montlhyRevenue = 0;
            foreach($paymentRecords as $paymentRecord){
                if(get_class($paymentRecord->getPaymentType()) == "CreditCard" || get_class($paymentRecord->getPaymentType()) == "DebitCard"){
                    $paymentType = $paymentRecord->getPaymentType();
                    $montlhyRevenue += $paymentRecord->getPaidValue() - $paymentRecord->getPaidValue()*$paymentType->getTax();  //Retira do valor rcebido a taxa dos cartões
                }else
                    $montlhyRevenue += $paymentRecord->getPaidValue();
            }

            //Calcula as despesas
            //Dentistas fixos
            $fixedDentists = FixedDentist::getRecords();
            foreach($fixedDentists as $fixedDentist){
                $montlhyRevenue -= $fixedDentist->getSalary();
            }
            
            echo ("Receita final do mês: " .$montlhyRevenue .PHP_EOL);
        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);
        }
    }

    //Permite fazer login com o usuário com todas as permissões caso necessário
    function logIn(){
        try{
            global $login;
            $login->login("emailADM@gmail.com", "senhaADM");
        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);
        }
    }

    //Permite fazer logout caso necessário
    function logOut(){
        try{
            global $login;
            $login->logout();
        }catch(Exception $e){
            echo($e->getMessage().PHP_EOL);
        }
    }
?>