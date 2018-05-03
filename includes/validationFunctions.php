<?php
    function checkPass($pass){
        $regex = "^[A-Za-z0-9]{6-18}$";
        return preg_match($regex, $pass);
    }

    function checkEmail($email){
        $regex = "^[A-Za-z0-9]+[@].[A-Za-z0-9]+[.].[A-Za-z0-9]{2,4}$";
        return preg_match($regex, $email);
    }

    function checkPhone($phone){
        $regex = "^\d{3}[-]?\d{3}[-]?/d{4}$";
        return preg_match($regex, $phone);
    }
 ?>
