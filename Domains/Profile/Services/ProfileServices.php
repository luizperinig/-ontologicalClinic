<?php
    require_once(__DIR__."../../Model/Profile.php");

    class ProfileServices{
        function createProfile($profileType){
            try{
                $profile = new Profile($profileType);
                $profile->addPermissions("generic");

                $profile->save();
            }catch(Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }

        function deleteProfile($index){
            try{
                $profile = $this->getProfile($index);

                $profile->delete();
            }catch (Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
        }
        
        function getProfile($index){
            $profile = Profile::getRecordsByField("index", $index);
            if(!$profile)
                throw new NotFoundError("Perfil não encontrado");

            return $profile[0];
        }

        function getAll(){
            $profiles = Profile::getRecords();
            if(!$profiles)
                throw new NotFoundError("Nenhum perfil encontrado");

            return $profiles;
        }
    };

    return new ProfileServices();
?>