<?php
    require_once(__DIR__."../../../Domains/User/Model/User.php");
    require_once(__DIR__."../../Constants/KeyWords.php");

    function checkPermission(User $user, $keyWord){
        $profile = $user->getProfile();
        $profilePermissions = $profile->getPermissions();

        if(in_array($keyWord, $profilePermissions)){
            
        }else
            throw new PermissionError("Você não tem permissão para realizar esta ação");
    }
?>